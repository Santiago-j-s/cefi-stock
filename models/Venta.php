<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property integer $ID
 * @property string $Monto
 * @property string $Factura
 * @property string $Fecha
 * @property integer $turno_ID
 *
 * @property LineaVenta[] $lineaVentas
 * @property Turno $turno
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'turno_ID'], 'required'],
            [['ID', 'turno_ID'], 'integer'],
            [['Monto'], 'number'],
            [['Fecha'], 'safe'],
            [['Factura'], 'string', 'max' => 45],
            [['turno_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Monto' => 'Monto',
            'Factura' => 'Factura',
            'Fecha' => 'Fecha',
            'turno_ID' => 'Turno  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaVentas()
    {
        return $this->hasMany(LineaVenta::className(), ['VentaID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['ID' => 'turno_ID']);
    }
}
