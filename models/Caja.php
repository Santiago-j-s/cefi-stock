<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
            [['ID', 'FechaUltMovimiento'], 'safe'],
            [['Monto'], 'number'],
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
            'FechaUltMovimiento' => 'Último Movimiento',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['FechaUltMovimiento'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['FechaUltMovimiento'],
                ],
                'value' => new Expression('NOW()'),
            ]
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
