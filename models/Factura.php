<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factura".
 *
 * @property integer $ID
 * @property string $Proveedor
 * @property string $NumeroFactura
 * @property string $Monto
 * @property string $Fecha
 * @property string $FechaAlta
 *
 * @property PagoFactura[] $pagoFacturas
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Monto'], 'number'],
            [['Fecha', 'FechaAlta'], 'safe'],
            [['Proveedor', 'NumeroFactura'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Proveedor' => 'Proveedor',
            'NumeroFactura' => 'Numero Factura',
            'Monto' => 'Monto',
            'Fecha' => 'Fecha',
            'FechaAlta' => 'Fecha Alta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagoFacturas()
    {
        return $this->hasMany(PagoFactura::className(), ['FacturaID' => 'ID']);
    }
}
