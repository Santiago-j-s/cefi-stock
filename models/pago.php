<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pago".
 *
 * @property integer $ID
 * @property string $Fecha
 * @property string $Monto
 * @property integer $turno_ID
 *
 * @property Turno $turno
 * @property PagoFactura[] $pagoFacturas
 */
class pago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
            [['Monto'], 'number'],
            [['turno_ID'], 'required'],
            [['turno_ID'], 'integer'],
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
            'Fecha' => 'Fecha',
            'Monto' => 'Monto',
            'turno_ID' => 'Turno  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['ID' => 'turno_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagoFacturas()
    {
        return $this->hasMany(PagoFactura::className(), ['PagoID' => 'ID']);
    }
}
