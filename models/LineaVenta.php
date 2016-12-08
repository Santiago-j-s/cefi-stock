<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linea_venta".
 *
 * @property integer $ID
 * @property integer $InventarioID
 * @property integer $VentaID
 * @property integer $Cantidad
 * @property string $Subtotal
 *
 * @property Inventario $inventario
 * @property Venta $venta
 */
class LineaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'linea_venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['InventarioID', 'VentaID'], 'required'],
            [['InventarioID', 'VentaID', 'Cantidad'], 'integer'],
            [['Subtotal'], 'number'],
            [['InventarioID'], 'exist', 'skipOnError' => true, 'targetClass' => Inventario::className(), 'targetAttribute' => ['InventarioID' => 'ID']],
            [['VentaID'], 'exist', 'skipOnError' => true, 'targetClass' => Venta::className(), 'targetAttribute' => ['VentaID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'InventarioID' => 'Inventario ID',
            'VentaID' => 'Venta ID',
            'Cantidad' => 'Cantidad',
            'Subtotal' => 'Subtotal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventario()
    {
        return $this->hasOne(Inventario::className(), ['ID' => 'InventarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(Venta::className(), ['ID' => 'VentaID']);
    }
}
