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
        '<div class="input-group-btn"><button type="submit" class="btn btn-default">' .
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
        <?php $form = ActiveForm::begin([
            'action' => ['retiro'],
            'layout' => 'inline',
            'options' => ['class' => 'col-md-6'],
        ]) ?>
            <?= $form->field($retiro, 'monto', [
                'inputTemplate' => inputTemplate('Retiro'),
                'enableError' => true,
                ])->textInput(['maxlength' => true]) ?>
        <?php ActiveForm::end() ?>

        <?php $form = ActiveForm::begin([
            'action' => ['deposito'],
            'layout' => 'inline',
            'options' => ['class' => 'col-md-6'],
        ]) ?>
            <?= $form->field($deposito, 'monto', [
                'inputTemplate' => inputTemplate('Depósito'), 
                'enableError' => true,
            ])->textInput(['maxlength' => true,]) ?>
        <?php ActiveForm::end() ?>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Caja</h1>
                </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'panel-body'
                    ],
                    'attributes' => [
                        'MontoCaja:currency',
                        'FechaUltMovimientoCaja:datetime',
                    ],
                    'template' => '<dl><dt>{label}</dt><dd>{value}</dd></dl>',
                ]) ?>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Sobre</h1>
                </div>
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => [
                        'tag' => 'div',
                        'class' => 'panel-body',
                    ],
                    'attributes' => [
                        'MontoSobre:currency',
                        'FechaUltMovimientoSobre:datetime',
                    ],
                    'template' => '<dl><dt>{label}</dt><dd>{value}</dd></dl>',
                ]) ?>
            </div>
        </div>
    </div>
</div>
