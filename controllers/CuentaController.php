<?php

namespace app\controllers;

use Yii;
use app\models\Caja;
use app\models\Cuenta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        ]);
    }

    /**
     * Updates an existing Caja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     * @throws NotFoundHttpException 404 error when model not found
     */
    public function actionUpdate()
    {
        $model = new Cuenta();

        if(!$model->iniciado()) {
            throw new NotFoundHttpException('No se encuentra la página');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'El monto de la caja ha sido modificado');

            return $this->redirect(['view']);
        }
        
        return $this->render('update', ['model' => $model]);
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
