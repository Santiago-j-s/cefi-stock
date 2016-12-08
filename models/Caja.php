<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property integer $ID
 * @property string $Monto
 * @property string $FechaUltMovimiento
 *
 * @property Movimiento[] $movimientos
 * @property TurnoCaja[] $turnoCajas
 */
class Caja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'caja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Monto'], 'number'],
            [['FechaUltMovimiento'], 'safe'],
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
            'FechaUltMovimiento' => 'Fecha Ult Movimiento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientos()
    {
        return $this->hasMany(Movimiento::className(), ['CajaID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnoCajas()
    {
        return $this->hasMany(TurnoCaja::className(), ['caja_ID' => 'ID']);
    }
}
