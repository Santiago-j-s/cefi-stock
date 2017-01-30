<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */

$this->title = 'Estado de Cuenta';
$this->params['breadcrumbs'][] = $this->title;

function inputTemplate() {
    $template = '<div class="input-group">' .
        '<span class="input-group-addon">$</span>' .
        '{input}' .
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
                    'options' => ['class' => 'col-md-6'],
                ]) ?>
                    <div class="form-group">
                    <?= $form->field($retiro, 'monto', [
                        'inputTemplate' => inputTemplate(),
                        'enableError' => true,
                        ])->textInput(['maxlength' => true]) ?>
                    </div>
                        <?= Button::widget(['label' => 'Retiro', 'options' => ['type' => 'submit', 'class' => 'btn btn-default']]) ?>
                <?php ActiveForm::end() ?>

                <?php $form = ActiveForm::begin([
                    'action' => ['deposito'],
                    'layout' => 'inline',
                    'options' => ['class' => 'col-md-6'],
                ]) ?>
                    <div class="form-group">
                    <?= $form->field($deposito, 'monto', [
                        'inputTemplate' => inputTemplate(), 
                        'enableError' => true,
                    ])->textInput(['maxlength' => true,]) ?>
                    </div>
                        <?= Button::widget(['label' => 'Retiro', 'options' => ['class' => 'btn btn-default']]) ?>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
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
        <div class="col-md-6">
            <div class="panel">
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
