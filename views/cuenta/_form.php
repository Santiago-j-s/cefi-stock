<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuenta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MontoCaja')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'MontoSobre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(!$model->iniciado() ? 'Crear' : 'Actualizar', ['class' => !$model->iniciado() ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
