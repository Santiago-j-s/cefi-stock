<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property integer $ID
 * @property integer $ProductoID
 * @property integer $Cantidad
 * @property string $Unidad
 *
 * @property Producto $producto
 * @property LineaVenta[] $lineaVentas
 * @property RegistroProducto $registroProducto
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductoID'], 'required'],
            [['ProductoID', 'Cantidad'], 'integer'],
            [['Unidad'], 'string', 'max' => 45],
            [['ProductoID'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['ProductoID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ProductoID' => 'Producto ID',
            'Cantidad' => 'Cantidad',
            'Unidad' => 'Unidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['ID' => 'ProductoID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaVentas()
    {
        return $this->hasMany(LineaVenta::className(), ['InventarioID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroProducto()
    {
        return $this->hasOne(RegistroProducto::className(), ['InventarioID' => 'ID']);
    }
}
