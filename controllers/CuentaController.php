<?php

namespace app\controllers;

use Yii;
use app\models\Caja;
use app\models\Cuenta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\DynamicModel;

/**
 * CajaController implements the CRUD actions for Caja model.
 */
class CuentaController extends Controller
{
    public $defaultAction = 'view';

    /**
     * Displays a single Caja model.
     * @return mixed
     */
    public function actionView()
    {
        $model = new Cuenta();

        if(!$model->iniciado()) {
            return $this->redirect(['iniciar-cuenta']);
        }
        
        return $this->render('view', [
            'model' => $model,
            'retiro' => $this->retiroModel,
            'deposito' => $this->depositoModel,
        ]);
    }

    public function getRetiroModel()
    {
        $model = new Cuenta();
        $retiro = new DynamicModel(['monto']);
        $retiro->addRule(['monto'], 'number', ['min' => '00.00', 'max' => $model->montoCaja]);

        return $retiro;
    }

    public function getDepositoModel()
    {
        $model = new Cuenta();
        $deposito = new DynamicModel(['monto']);
        $deposito->addRule(['monto'], 'number', ['min' => '00.00', 'max' => $model->montoSobre]);

        return $deposito;
    }

    /**
     * Modifica el monto de la Caja o Sobre
     *
     * @return mixed
     * @throws NotFoundHttpException 404 error when model not found
     */
    public function actionModificarMonto()
    {
        $model = new Cuenta();

        if(!$model->iniciado()) {
            throw new NotFoundHttpException('No se encuentra la página');
        }
        
        $monto = Yii::$app->request->post('monto');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'El monto de la caja ha sido modificado');

            return $this->redirect(['view']);
        }
        
        return $this->render('update', ['model' => $model]);
    }
    
    /**
     * Extrae dinero de la caja y lo pone en sobre
     *
     * @return mixed
     * @throws NotFoundHttpException 404 error when model not found
     */
    public function actionRetiro()
    {
        $model = new Cuenta();
        if(!$model->iniciado()) {
            throw new NotFoundHttpException('No se encuentra la página');
        }

        $retiro = $this->retiroModel;

        if ($retiro->load(Yii::$app->request->post()) && $retiro->validate()) {
            if(!$model->retiro($retiro)) {
                \Yii::$app->session->setFlash('danger', 'No se ha podido realizar el retiro');         
            }
            $mensaje = 'Se han retirado $' . $retiro->monto . ' de la caja';
            \Yii::$app->session->setFlash('success', $mensaje);
        }

        return $this->redirect(['view']);
    }

    /**
     * Extrae dinero del sobre y lo pone en caja
     *
     * @return mixed
     * @throws NotFoundHttpException 404 error when model not found
     */
    public function actionDeposito()
    {
        $model = new Cuenta();
        if(!$model->iniciado()) {
            throw new NotFoundHttpException('No se encuentra la página');
        }

        $deposito = $this->depositoModel;

        if ($deposito->load(Yii::$app->request->post()) && $deposito->validate()) {
            if(!$model->deposito($deposito)) {
                \Yii::$app->session->setFlash('danger', 'No se ha podido realizar el depósito');         
            }
            $mensaje = 'Se han retirado $' . $deposito->monto . ' del sobre';
            \Yii::$app->session->setFlash('success', $mensaje);
        }

        return $this->redirect(['view']);
    }

    /**
     * Permite iniciar la caja con un nuevo monto.
     * 
     * @return mixed
     */
    public function actionIniciarCuenta()
    {
        $model = new Cuenta();
        $model->iniciarCuenta();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Se ha iniciado un nuevo monto');
       
            return $this->redirect(['view']);
        }
        
        return $this->render('iniciar', ['model' => $model]);
    }
}
