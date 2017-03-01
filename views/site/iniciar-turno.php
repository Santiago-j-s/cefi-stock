<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $turno app\models\Turno */
/* @var $login app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar Turno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-md-4 col-md-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
            ]); ?>

            <?= $form->field($login, 'nombreUsuario')->textInput(['autofocus' => true]) ?>
            <?= $form->field($login, 'password')->passwordInput() ?>
            <?= $form->field($login, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <div class="col-md-10" style="color:#999;">
        Login <strong>admin/123456</strong>
    </div>
</div>
