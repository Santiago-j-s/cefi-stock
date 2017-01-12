<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "sobre".
 *
 * @property integer $ID
 * @property string $Monto
 * @property string $FechaUltMovimiento
 *
 * @property Movimiento[] $movimientos
 */
class Sobre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sobre';
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
            'FechaUltMovimiento' => 'Fecha Ult Movimiento',
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
        return $this->hasMany(Movimiento::className(), ['SobreID' => 'ID']);
    }
}
