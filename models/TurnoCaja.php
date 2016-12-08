<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno_caja".
 *
 * @property integer $ID
 * @property integer $caja_ID
 * @property integer $turno_ID
 * @property string $MontoInicial
 * @property string $MontoFinal
 *
 * @property Caja $caja
 * @property Turno $turno
 */
class TurnoCaja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno_caja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'caja_ID', 'turno_ID'], 'required'],
            [['ID', 'caja_ID', 'turno_ID'], 'integer'],
            [['MontoInicial', 'MontoFinal'], 'number'],
            [['caja_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Caja::className(), 'targetAttribute' => ['caja_ID' => 'ID']],
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
            'caja_ID' => 'Caja  ID',
            'turno_ID' => 'Turno  ID',
            'MontoInicial' => 'Monto Inicial',
            'MontoFinal' => 'Monto Final',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaja()
    {
        return $this->hasOne(Caja::className(), ['ID' => 'caja_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['ID' => 'turno_ID']);
    }
}
