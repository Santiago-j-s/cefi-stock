<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
bs3-ale
    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'PrecioVenta') ?>

    <?= $form->field($model, 'FechaUltModificacion') ?>

    <?= $form->field($model, 'CodigoBarra') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
