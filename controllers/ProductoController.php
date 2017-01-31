<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\ProductoSearch;
use yii\base\DynamicModel;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;
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

    /**
     * Permite registrar el ingreso de productos
     *
     * Los productos ingresados junto con sus cantidades
     * se almacenan en la variable de sesión productos
     *
     * @return mixed
     */
    public function actionIngreso()
    {
        $model = new Producto(['scenario' => Producto::SCENARIO_INGRESO]);

        $productos = $this->getProductosSesion();

        $mensaje = \yii\helpers\VarDumper::dumpAsString($productos);
        \Yii::trace($mensaje);
        
        $descripcionProductos = Producto::find()->all();
        $mapDescripcionProductos = ArrayHelper::map($descripcionProductos, 'ID', 'Descripcion');
        $dataProvider = Producto::getIngresoDataProvider($productos);
        
        return $this->render('ingreso', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'descripcionesProducto' => $mapDescripcionProductos,
        ]);
    }

    /**
     * Añade un producto y su cantidad a los productos ingresados
     * 
     * Actualiza la variable de sesión 'productos'
     *
     * @return mixed el GridView con los productos 
     */
    public function actionAddProducto()
    {
        $producto = new Producto(['scenario' => Producto::SCENARIO_INGRESO]);

        $productos = $this->getProductosSesion();

        $mensaje = \yii\helpers\VarDumper::dumpAsString($productos);
        \Yii::error($mensaje);

        $request = Yii::$app->request;
        if($request->isPost) {
            if($producto->load($request->post()) && $producto->validate()) {
                $productos = $this->addProducto($producto);
                $this->setProductosSesion($productos);
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

    private function addProducto($producto)
    {
        $cantidad = $producto->Cantidad;
        $id = $producto->ID;
        
        $productos = $this->getProductosSesion();
        if(array_key_exists($id, $productos)) {
            $cantidad += $productos[$id]->Cantidad;
        }

        $producto = Producto::findOne(['ID' => $id]);
        $producto->Cantidad = $cantidad;

        $productos = array_replace($productos, [$id => $producto]);

        $mensaje = "Producto Añadido:\n" . \yii\helpers\VarDumper::dumpAsString($producto);
        \Yii::trace($mensaje);

        return $productos;
    }

    public function actionResetIngreso()
    {
        $this->setProductosSesion([]);
        $this->redirect('ingreso');
    }

    public function actionConfirmarIngreso()
    {
        $productos = $this->getProductosSesion();

        $mensaje = \yii\helpers\VarDumper::dumpAsString($productos);
        \Yii::error($mensaje);

        try {
            Producto::registrarIngreso($productos);
            $this->setProductosSesion([]);
        } catch(\Exception $e) {
            \Yii::$app->session->setFlash('danger', $e);
        }

        return $this->redirect('index');
    }

    private function getProductosSesion()
    {
        $sesion = Yii::$app->session;
        return $sesion->get('productos', []);
    }

    private function setProductosSesion($productos)
    {
        $sesion = Yii::$app->session;
        $sesion->set('productos', $productos);
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
