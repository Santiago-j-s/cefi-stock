<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago_factura".
 *
 * @property integer $ID
 * @property integer $FacturaID
 * @property integer $PagoID
 *
 * @property Factura $factura
 * @property Pago $pago
 */
class PagoFactura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pago_factura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FacturaID', 'PagoID'], 'required'],
            [['FacturaID', 'PagoID'], 'integer'],
            [['FacturaID'], 'exist', 'skipOnError' => true, 'targetClass' => Factura::className(), 'targetAttribute' => ['FacturaID' => 'ID']],
            [['PagoID'], 'exist', 'skipOnError' => true, 'targetClass' => Pago::className(), 'targetAttribute' => ['PagoID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'FacturaID' => 'Factura ID',
            'PagoID' => 'Pago ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFactura()
    {
        return $this->hasOne(Factura::className(), ['ID' => 'FacturaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPago()
    {
        return $this->hasOne(Pago::className(), ['ID' => 'PagoID']);
    }
}
