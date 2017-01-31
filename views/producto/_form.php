<?php
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\bootstrap\ActiveForm */
?>
<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'PrecioVenta', [
        'inputTemplate' => '<div class="input-group"><span class="input-group-addon">$</span>{input}</div>',
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodigoBarra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
