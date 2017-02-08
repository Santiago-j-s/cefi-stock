<?php
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use kartik\money\MaskMoney;

/* @var $retiro DynamicModel */
/* @var $inputTemplate string */

?>
<?php $form = ActiveForm::begin([
    'action' => ['retiro'],
    'layout' => 'inline',
    'options' => [
        'class' => 'col-md-6',
    ],
]) ?>
    <?= $form->field($retiro, '[retiro]monto', [
        'inputTemplate' => $inputTemplate,
        'enableError' => true,
    ])->widget(MaskMoney::classname()) ?>
<?php ActiveForm::end() ?>