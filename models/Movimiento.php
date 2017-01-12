<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimiento".
 *
 * @property integer $ID
 * @property string $Monto
 * @property string $Tipo
 * @property string $Fecha
 * @property integer $CajaID
 * @property integer $SobreID
 * @property integer $turno_ID
 *
 * @property Caja $caja
 * @property Sobre $sobre
 * @property Turno $turno
 */
class Movimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'movimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Monto'], 'number'],
            [['Fecha'], 'safe'],
            [['CajaID', 'SobreID', 'turno_ID'], 'required'],
            [['CajaID', 'SobreID', 'turno_ID'], 'integer'],
            [['Tipo'], 'string', 'max' => 45],
            [['CajaID'], 'exist', 'skipOnError' => true, 'targetClass' => Caja::className(), 'targetAttribute' => ['CajaID' => 'ID']],
            [['SobreID'], 'exist', 'skipOnError' => true, 'targetClass' => Sobre::className(), 'targetAttribute' => ['SobreID' => 'ID']],
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
            'Tipo' => 'Tipo',
            'Fecha' => 'Fecha',
            'CajaID' => 'Caja ID',
            'SobreID' => 'Sobre ID',
            'turno_ID' => 'Turno  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaja()
    {
        return $this->hasOne(Caja::className(), ['ID' => 'CajaID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSobre()
    {
        return $this->hasOne(Sobre::className(), ['ID' => 'SobreID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['ID' => 'turno_ID']);
    }
}
