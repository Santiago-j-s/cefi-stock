<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno_vendedor".
 *
 * @property integer $ID
 * @property integer $vendedor_ID
 * @property integer $turno_ID
 * @property string $HoraInicio
 * @property string $HoraFin
 *
 * @property Turno $turno
 * @property Vendedor $vendedor
 */
class TurnoVendedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno_vendedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendedor_ID', 'turno_ID'], 'required'],
            [['vendedor_ID', 'turno_ID'], 'integer'],
            [['HoraInicio', 'HoraFin'], 'safe'],
            [['turno_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_ID' => 'ID']],
            [['vendedor_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Vendedor::className(), 'targetAttribute' => ['vendedor_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'vendedor_ID' => 'Vendedor  ID',
            'turno_ID' => 'Turno  ID',
            'HoraInicio' => 'Hora Inicio',
            'HoraFin' => 'Hora Fin',
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
    public function getVendedor()
    {
        return $this->hasOne(Vendedor::className(), ['ID' => 'vendedor_ID']);
    }
}
