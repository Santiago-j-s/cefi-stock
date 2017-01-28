<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\bootstrap\ActiveForm */
?>
<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PrecioVenta', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">$</span>{input}</div>',
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodigoBarra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
