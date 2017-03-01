<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */
/* @var $deposito DynamicModel */
/* @var $retiro DynamicModel */

$this->title = 'Estado de Cuenta';
$this->params['breadcrumbs'][] = $this->title;

$formatter = Yii::$app->formatter;

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

$detailViewConfig = [
    'model' => $model,
    'options' => ['class' => 'table'],
];

$cajaConfig = array_replace($detailViewConfig, [
   'attributes' => [
        'MontoCaja:currency',
        'FechaUltMovimientoCaja:datetime',
    ], 
]);

$sobreConfig = array_replace($detailViewConfig, [
   'attributes' => [
        'MontoSobre:currency',
        'FechaUltMovimientoSobre:datetime',
    ], 
]);

$cajaView = DetailView::widget($cajaConfig);
$sobreView = DetailView::widget($sobreConfig); 
?>
<div class="caja-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <div class="row">
        <?= $this->render('_retiro', [
            'retiro' => $retiro, 'inputTemplate' => inputTemplate('Retiro')
        ]) ?>
        <?= $this->render('_deposito', [
            'deposito' => $deposito, 'inputTemplate' => inputTemplate('Deposito')
        ]) ?>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $this->render('//layouts/_panel-bootstrap', [
                'title' => 'Caja',
                'content' => $cajaView,
                'body' => false,
            ]) ?>
        </div>
        <div class="col-md-4 col-md-offset-2">
            <?= $this->render('//layouts/_panel-bootstrap', [
                'title' => 'Sobre',
                'content' => $sobreView,
                'body' => false,
            ]) ?>
        </div>
    </div>
    <blockquote>
        <strong>Total Mercadería: </strong>
        <?= $formatter->asCurrency($totalMercaderia) ?>
    </blockquote>
</div>
