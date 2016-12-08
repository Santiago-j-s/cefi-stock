<?php

namespace app\models;

use Yii;

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
            [['Monto', 'FechaUltMovimiento'], 'string', 'max' => 45],
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
        return $this->hasMany(Movimiento::className(), ['SobreID' => 'ID']);
    }
}
