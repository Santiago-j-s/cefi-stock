<?php
use kartik\money\MaskMoney;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\bootstrap\ActiveForm */

$precioVentaTemplate = '<div class="input-group"><span class="input-group-addon">$</span>{input}</div>';

/**
 *   TODO: Para que MaskMoney funcione correctamente
 *   hay que aplicar este fix
 *   https://github.com/jayala/yii2-money/commit/c4dde3314f1f24931283de32b45f2df842a1a4ef
 */
?>
<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textArea(['maxlength' => true]) ?>

    <?= $form->field($model, 'PrecioVenta', ['inputTemplate' => $precioVentaTemplate])
        ->widget(MaskMoney::classname()) ?>

    <?= $form->field($model, 'CodigoBarra')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
