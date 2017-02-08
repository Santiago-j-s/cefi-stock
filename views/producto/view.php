<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->Descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$detailview = DetailView::widget([
    'model' => $model,
    'attributes' => [
        'ID',
        'Descripcion',
        'PrecioVenta:currency',
        'FechaUltModificacion:date',
        'CodigoBarra',
    ],
    'options' => ['class' => 'table table-hover'],
]);

?>
<div class="producto-view">
    <?= $this->render('//layouts/_panel-bootstrap', [
        'content' => $detailview,
        'type' => 'primary',
        'title' => Html::encode($this->title),
        'body' => false,
    ])?>
    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
