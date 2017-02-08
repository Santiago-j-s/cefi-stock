<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;

$gridOptions = ['class' => 'table table-hover'];
$gridColumns = [
    ['attribute' => '#', 'value' => 'ID'],
    'Descripcion',
    'PrecioVenta:currency',
    'Cantidad',
    //'FechaUltModificacion',
];

array_push($gridColumns, [
    'class' => 'yii\grid\ActionColumn',
    'header' => 'Acciones',
    'template' => '{view} {update}',
]);

$layout = implode("\n", [
    "<div class='panel panel-default'>",
        "{items}",
        "<div class='panel-footer'>{summary}</div>",
    "</div>",
    "{pager}",
]);

$gridView = GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'tableOptions' => $gridOptions,
    'columns' => $gridColumns,
    'layout' => $layout,    
]); 
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
    ]); ?>
        <?= $gridView ?>
    <?php Pjax::end(); ?>
</div>
