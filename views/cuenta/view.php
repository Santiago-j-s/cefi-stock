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
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="row">
        <div class="panel-panel-primary">
            <div class="panel-body">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Caja</h1>
                </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'MontoCaja:currency',
                        'FechaUltMovimientoCaja:datetime',
                    ],
                    'options' => ['class' => 'table']
                ]) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title">Sobre</h1>
                </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'MontoSobre:currency',
                        'FechaUltMovimientoSobre:datetime',
                    ],
                    'options' => ['class' => 'table']
                ]) ?>
            </div>
        </div>
    </div>
</div>
