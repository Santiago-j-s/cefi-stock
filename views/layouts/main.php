<?php

    /* @var $this \yii\web\View */
    /* @var $content string */

    use kartik\nav\NavX;
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\bootstrap\Alert;
    use yii\widgets\Breadcrumbs;
    use app\assets\AppAsset;
    use mdm\admin\components\Helper;

    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $username = !\Yii::$app->user->isGuest ? \Yii::$app->user->identity->NombreUsuario : null;
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Cuenta', 'items' => [
            ['label' => 'Estado', 'url' => '/cuenta/'],
            ['label' => 'Modificar Montos', 'url' => '/cuenta/modificar-monto'],
        ]],
        ['label' => 'Productos', 'url' => ['/producto/index']],
        ['label' => 'Admin', 'url' => ['/admin/']],
        ['label' => 'Iniciar Turno', 'url' => ['/site/iniciar-turno'], 'visible' => \Yii::$app->user->isGuest],
        [
            'label' => 'Logout (' . $username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ],
    ];

    // Filtrar los items de menú según los permisos del usuario
    $menuItems = Helper::filter($menuItems);

    NavBar::begin([
        'brandLabel' => 'CEFI',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar',
        ],
    ]);
    echo NavX::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    
    <div class="container">
        <?php
            $flashes = Yii::$app->session->getAllFlashes();
            foreach ($flashes as $key => $message) {
                echo Alert::widget([
                    'options' => ['class' => 'alert-' . $key],
                    'body' => $message,
                ]);
            }
        ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
