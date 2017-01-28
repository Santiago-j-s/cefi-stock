<?php

use app\models\Producto;

use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProvider */

$buttonOptions =  ['class' => 'btn btn-primary pull-right'];

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
<?= Html::beginForm(['confirmar-ingreso'], 'post') ?>
    <div class="form-group">
        <?= Html::submitButton('Confirmar', $buttonOptions) ?>
    </div>
<?= Html::endForm() ?>