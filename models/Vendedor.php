<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendedor".
 *
 * @property integer $ID
 * @property string $NombreCompleto
 *
 * @property TurnoVendedor[] $turnoVendedors
 */
class Vendedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'integer'],
            [['NombreCompleto'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NombreCompleto' => 'Nombre Completo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnoVendedors()
    {
        return $this->hasMany(TurnoVendedor::className(), ['vendedor_ID' => 'ID']);
    }
}
