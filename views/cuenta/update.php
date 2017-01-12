<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = 'Actualizar Monto';
$this->params['breadcrumbs'][] = ['label' => 'Estado de Caja', 'url' => ['view']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
