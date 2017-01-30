<?php

use app\models\Producto;

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProvider */

$confirmarOptions =  ['class' => 'btn btn-primary pull-right'];
$resetOptions = ['class' => 'btn btn-danger pull-right'];

if($dataProvider->count < 1) {
    $confirmarOptions['disabled'] = true;
    $resetOptions['disabled'] = true;
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
    <div class="col-md-12">
        <div class="col-xs-1 pull-right">
                <?= Html::beginForm(['confirmar-ingreso'], 'post') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Confirmar', $confirmarOptions) ?>
                    </div>
                <?= Html::endForm() ?>
        </div>
        <div class="col-xs-1 pull-right">
                <?= Html::beginForm(['reset-ingreso'], 'post') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Reset', $resetOptions) ?>
                    </div>
                <?= Html::endForm() ?>
        </div>
    </div>
</div>