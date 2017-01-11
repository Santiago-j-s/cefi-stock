<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = 'Iniciar Caja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
