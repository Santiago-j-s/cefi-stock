<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $caja app\models\Caja */

$this->title = 'Iniciar Caja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-create col-md-4 col-md-offset-4">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>