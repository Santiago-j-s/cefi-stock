<?php

use kartik\money\MaskMoney;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */
/* @var $form yii\widgets\ActiveForm */

$inputTemplate = '<div class="input-group">' .
'<span class="input-group-addon">$</span>' .
'{input}' .
"</div>";

?>

<div class="cuenta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MontoCaja', ['inputTemplate' => $inputTemplate
        ])->widget(MaskMoney::classname()) ?>
    
    <?= $form->field($model, 'MontoSobre', ['inputTemplate' => $inputTemplate
        ])->widget(MaskMoney::classname()) ?>

    <div class="form-group">
        <?= Html::submitButton(!$model->iniciado() ? 'Crear' : 'Actualizar', ['class' => !$model->iniciado() ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
