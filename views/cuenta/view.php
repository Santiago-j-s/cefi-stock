<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = 'Estado de Cuenta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Modificar Montos', ['update'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">Caja</div>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'MontoCaja:currency',
                'FechaUltMovimientoCaja:datetime',
            ],
            'options' => ['class' => 'table table-default']
        ]) ?>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Sobre</div>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'MontoSobre:currency',
                'FechaUltMovimientoSobre:datetime',
            ],
            'options' => ['class' => 'table table-default']
        ]) ?>
    </div>
</div>
