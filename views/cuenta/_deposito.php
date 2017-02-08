<?php
use yii\bootstrap\ActiveForm;
use kartik\money\MaskMoney;

/* @var $deposito DynamicModel */
/* @var $inputTemplate string */

?>
<?php $form = ActiveForm::begin([
    'action' => ['deposito'],
    'layout' => 'inline',
    'options' => ['class' => 'col-md-6'],
]) ?>
    <?= $form->field($deposito, '[deposito]monto', [
        'inputTemplate' => $inputTemplate,
        'enableError' => true,
    ])->widget(MaskMoney::classname()) ?>
<?php ActiveForm::end() ?>