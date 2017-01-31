<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuenta */

$this->title = 'Actualizar Monto';
$this->params['breadcrumbs'][] = ['label' => 'Estado de Caja', 'url' => ['view']];
$this->params['breadcrumbs'][] = 'Modificar Monto';
?>
<div class="caja-update col-md-4 col-md-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
