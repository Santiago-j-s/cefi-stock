<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "precio_producto".
 *
 * @property integer $producto_ID
 * @property string $FechaInicio
 * @property string $Precio
 * @property string $FechaFinal
 * @property integer $turno_ID
 *
 * @property Producto $producto
 * @property Turno $turno
 */
class PrecioProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'precio_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_ID', 'FechaInicio', 'turno_ID'], 'required'],
            [['producto_ID', 'turno_ID'], 'integer'],
            [['FechaInicio', 'FechaFinal'], 'safe'],
            [['Precio'], 'number'],
            [['producto_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_ID' => 'ID']],
            [['turno_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'producto_ID' => 'Producto  ID',
            'FechaInicio' => 'Fecha Inicio',
            'Precio' => 'Precio',
            'FechaFinal' => 'Fecha Final',
            'turno_ID' => 'Turno  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['ID' => 'producto_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['ID' => 'turno_ID']);
    }
}
