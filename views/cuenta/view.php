<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = 'Estado de Caja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Actualizar Monto', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Monto:currency',
            'FechaUltMovimiento',
        ],
    ]) ?>
</div>
