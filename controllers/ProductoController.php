<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\ProductoSearch;
use yii\base\DynamicModel;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionNuevo()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionIngreso()
    {
        $model = new Producto(['scenario' => Producto::SCENARIO_INGRESO]);

        $sesion = Yii::$app->session;
        $productos = $sesion->get('productos', []);
        
        $descripcionProductos = Producto::getDescripciones();
        $mapDescripcionProductos = array_combine($descripcionProductos, $descripcionProductos);
        
        $dataProvider = Producto::getIngresoDataProvider($productos);
        
        return $this->render('ingreso', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'descripcionesProducto' => $mapDescripcionProductos,
        ]);
    }

    public function actionAddProducto()
    {
        $producto = new Producto(['scenario' => Producto::SCENARIO_INGRESO]);

        $sesion = Yii::$app->session;
        //$sesion->set('productos', null);
        $productos = $sesion->get('productos', []);

        $request = Yii::$app->request;
        if($request->isPost) {
            if($producto->load($request->post()) && $producto->validate()) {
                // TODO: Organizar mejor el código

                $descripcion = $producto->Descripcion;
                if(!array_key_exists($descripcion, $productos)) {
                    $productos[$descripcion] = $producto;
                } else {
                    $productos[$descripcion]->Cantidad += $producto->Cantidad;
                }

                $sesion->set('productos', $productos);
            }

            $dataProvider = Producto::getIngresoDataProvider($productos);
        }

        if($request->isPjax) {
            return $this->renderPartial('grid', [
                'dataProvider' => $dataProvider,
            ]);
        }

        return $this->redirect('ingreso');
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
