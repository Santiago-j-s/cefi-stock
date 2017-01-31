<?php

use app\models\Producto;

use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\DataProvider */
/* @var $model app\models\Producto */

$this->title = 'Ingresar Productos';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$js = <<<JS
    select = $('#producto-id');
    form = $('#form-ingreso');
    console.log(select);
    console.log(form);

    window.addEventListener('load', function() {
        select.select2('open');
    });

    $(document).on('submit', 'form[data-pjax]', function(e) {
        $.pjax.submit(e, { push: false });
        form[0].reset();
        select.select2('open');
    }); 
JS;
$this->registerJs($js);

?>
<div class='row'>
    <div class='col-md-12'>
        <div class='panel panel-default'>
            <div class="panel-heading">
                <h1 class="panel-title">Ingresar Datos de Producto</h1>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'action' => 'add-producto',
                    'id' => 'form-ingreso',
                    'layout' => 'inline',
                    'options' => [
                        'data-pjax' => '#grid',
                    ],
                ]); ?>

                    <?= $form->field($model, 'ID')->widget(Select2::classname(), [
                        'id' => 'select-descripcion',
                        'data' => $descripcionesProducto,
                        'options' => [
                            'placeholder' => 'Seleccione un producto',
                        ],
                        'pluginOptions' => ['allowClear' => true,],
                    ]) ?>

                    <?= $form->field($model, 'Cantidad')->input('number', ['min' => 1]) ?>

                    <?= Html::button('Añadir Producto', $options = [
                        'type' => 'submit',
                        'class' => 'btn btn-default',
                    ]) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php Pjax::begin([
            'id' => 'grid',
            'enablePushState' => false,
        ]) ?>
        <?= $this->render('grid', ['dataProvider' => $dataProvider]) ?>
        <?php Pjax::end() ?>
    </div>
</div>