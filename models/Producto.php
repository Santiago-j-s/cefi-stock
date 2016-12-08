<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $ID
 * @property string $Descripcion
 * @property string $PrecioVenta
 * @property string $FechaUltModificacion
 * @property string $CodigoBarra
 *
 * @property Inventario[] $inventarios
 * @property PrecioProducto[] $precioProductos
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PrecioVenta'], 'number'],
            [['Descripcion', 'FechaUltModificacion'], 'string', 'max' => 45],
            [['CodigoBarra'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Descripcion' => 'Descripcion',
            'PrecioVenta' => 'Precio Venta',
            'FechaUltModificacion' => 'Fecha Ult Modificacion',
            'CodigoBarra' => 'Codigo Barra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['ProductoID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecioProductos()
    {
        return $this->hasMany(PrecioProducto::className(), ['producto_ID' => 'ID']);
    }
}
