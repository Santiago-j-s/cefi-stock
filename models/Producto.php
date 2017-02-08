<?php

namespace app\models;

use Yii;
use yii\base\UserException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;

/**
 * This is the model class for table "producto".
 *
 * @property integer $ID
 * @property string $Descripcion
 * @property string $PrecioVenta
 * @property string $FechaUltModificacion
 * @property string $CodigoBarra
 * @property Inventario $inventario
 *
 * @property PrecioProducto[] $precioProductos
 */
class Producto extends \yii\db\ActiveRecord
{
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_INGRESO = 'ingreso';

    private $_cantidad = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
     
        $scenarios[self::SCENARIO_DEFAULT] = [
            'PrecioVenta',
            'Descripcion',
            'FechaUltModificacion',
            'CodigoBarra',
        ];

        $scenarios[self::SCENARIO_INGRESO] = [
            'ID',
            'Cantidad',
        ];

        return $scenarios;
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['FechaUltModificacion'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['FechaUltModificacion'],
                ],
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PrecioVenta'], 'number'],
            [['FechaUltModificacion'], 'safe'],
            [['Cantidad'], 'number', 'min' => 0],
            [['Descripcion'], 'string', 'max' => 100],
            [['CodigoBarra'], 'string', 'max' => 13],
            [['PrecioVenta', 'Descripcion'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Descripcion' => 'Descripción',
            'PrecioVenta' => 'Precio de Venta',
            'FechaUltModificacion' => 'Última Modificacion',
            'CodigoBarra' => 'Código de Barras',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventario()
    {
        return $this->hasOne(Inventario::className(), ['ProductoID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecioProductos()
    {
        return $this->hasMany(PrecioProducto::className(), ['producto_ID' => 'ID']);
    }

    /**
     * @return string
     */
    public function getCantidad()
    {
        if($this->_cantidad === null) {
            $inventario = $this->inventario;
            $this->_cantidad = ($inventario !== null) ? $inventario->Cantidad : 0;
        }

        return $this->_cantidad;
    }

    /**
     * Permite setear la cantidad disponible de un producto
     */
    public function setCantidad($value)
    {
        $this->_cantidad += $value;
    }

    /**
     * Devuelve un array con todas las descripciones de productos
     * @return array
     */
    public static function getDescripciones()
    {
        return ArrayHelper::getColumn(self::find()->all(), 'Descripcion');
    }

    /**
     * Devuelve el modelo con la descripción dada 
     *
     * @return \yii\db\ActiveRecord
     */
    public static function findByDescripcion($descripcion)
    {
        return findOne(['Descripcion', $descripcion]);
    }

    /**
     * @inheritdoc
     */
    public function save($runValidation = true, $attributeNames = null)
    {
        $transaction = Yii::$app->db->beginTransaction();
        
        try {
            if(!parent::save()) {
                $mensaje = "Producto: " . \yii\helpers\VarDumper::dumpAsString($this);
                \Yii::warning($mensaje);
                throw new UserException("No se pudo guardar el producto: " . $this->Descripcion);
            }

            $inventario = $this->inventario;
            if(!isset($inventario)) {
                $inventario = new Inventario();
                $inventario->ProductoID = $this->ID;
            }

            $inventario->Cantidad += $this->_cantidad;
            
            if(!$inventario->save()) {
                $mensaje = \yii\helpers\VarDumper::dumpAsString($inventario);
                \Yii::error($mensaje);
                throw new UserException("No se pudo guardar el inventario de " . $this->Descripcion);    
            }

            $transaction->commit();
            return true;
        } catch (\Exception $e) { // For compatibility with PHP 5.x
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }

        return false;
    }

    /**
     * @return ArrayDataProvider
     */
    public static function getIngresoDataProvider($productos)
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => $productos,
            'sort' => [
                'attributes' => ['Descripcion', 'Cantidad'],
           ]
        ]);

        return $dataProvider;
    }

    /**
     * Guarda en db los cambios en las cantidades de cada producto 
     * en $productos
     *
     * Para cada instancia de esta clase en '$productos':
    */
    public static function registrarIngreso($productos)
    {
        foreach ($productos as $producto) {
            $producto->save();
        }
    }
}
