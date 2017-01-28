<?php

namespace app\models;

use Yii;
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
            'Cantidad',
            'Descripcion',
        ];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PrecioVenta'], 'number'],
            [['Cantidad'], 'number', 'min' => 0],
            [['FechaUltModificacion'], 'string', 'max' => 45],
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
        $this->_cantidad = $value;
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
     * @inheritDoc
     */
    public function beforeSave($insert)
    {
        if(!parent::beforeSave($insert)) {
            return false;
        }
        
        $this->FechaUltModificacion = new Expression('NOW()');
        
        return true;
    }
}
