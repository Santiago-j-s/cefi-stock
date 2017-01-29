<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Nuevo Producto', ['nuevo'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Ingreso de Productos', ['ingreso'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php Pjax::begin([
        'id' => 'grid',
        'enablePushState' => false,
    ]) ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => '#',
                    'value' => 'ID',
                ],
                'Descripcion',
                'PrecioVenta:currency',
                'Cantidad',
                //'FechaUltModificacion',
                'CodigoBarra',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                ],
            ],
        ]); ?>
    <?php Pjax::end() ?>
</div>
