<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */

$this->title = 'Estado de Cuenta';
$this->params['breadcrumbs'][] = $this->title;

function inputTemplate($textButton) {
    $template = '<div class="input-group">' .
        '<span class="input-group-addon">$</span>' .
        '{input}' .
        '<div class="input-group-btn"><button type="submit" class="btn btn-primary">' .
        $textButton .
        '</button></div>' .
        '</div>';
    
    return $template;
}

?>
<div class="caja-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php $form = ActiveForm::begin([
            'action' => ['retiro'],
            'layout' => 'inline',
            'options' => ['class' => 'col-md-4'],
        ]) ?>
            <?= $form->field($retiro, 'monto', [
                'inputTemplate' => inputTemplate('Retiro'),
                'enableError' => true,
                ])->textInput(['maxlength' => true]) ?>
        <?php ActiveForm::end() ?>

        <?php $form = ActiveForm::begin([
            'action' => ['deposito'],
            'layout' => 'inline',
            'options' => ['class' => 'col-md-4'],
        ]) ?>
            <?= $form->field($deposito, 'monto', [
                'inputTemplate' => inputTemplate('Depósito'), 
                'enableError' => true,
            ])->textInput(['maxlength' => true,]) ?>
        <?php ActiveForm::end() ?>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Caja</div>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'MontoCaja:currency',
                    'FechaUltMovimientoCaja:datetime',
                ],
                'options' => ['class' => 'table table-default']
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Sobre</div>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'MontoSobre:currency',
                    'FechaUltMovimientoSobre:datetime',
                ],
                'options' => ['class' => 'table table-default']
            ]) ?>
        </div>
    </div>
</div>
