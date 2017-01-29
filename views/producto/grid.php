<?php

use app\models\Producto;

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProvider */

$confirmarOptions =  ['class' => 'btn btn-primary pull-right', 'style' => 'margin: 10px;'];
$resetOptions = ['class' => 'btn btn-danger pull-right', 'style' => 'margin:10px;'];

if($dataProvider->count < 1) {
    $buttonOptions['disabled'] = true;
}
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'Descripcion',
        'Cantidad', 
    ],
]); ?>
<div class="row">
    <?= Html::beginForm(['confirmar-ingreso'], 'post') ?>
        <div class="form-group">
            <?= Html::submitButton('Confirmar', $confirmarOptions) ?>
        </div>
    <?= Html::endForm() ?>
    <?= Html::beginForm(['reset-ingreso'], 'post') ?>
        <div class="form-group">
            <?= Html::submitButton('Reset', $resetOptions) ?>
        </div>
    <?= Html::endForm() ?>
</div>