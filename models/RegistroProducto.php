<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "registro_producto".
 *
 * @property integer $InventarioID
 * @property string $Cantidad
 * @property string $Unidad
 * @property string $Fecha
 * @property string $Proveedor
 * @property integer $turno_ID
 *
 * @property Inventario $inventario
 * @property Turno $turno
 */
class RegistroProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registro_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['InventarioID', 'turno_ID'], 'required'],
            [['InventarioID', 'turno_ID'], 'integer'],
            [['Fecha'], 'safe'],
            [['Cantidad', 'Unidad', 'Proveedor'], 'string', 'max' => 45],
            [['InventarioID'], 'exist', 'skipOnError' => true, 'targetClass' => Inventario::className(), 'targetAttribute' => ['InventarioID' => 'ID']],
            [['turno_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Turno::className(), 'targetAttribute' => ['turno_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'InventarioID' => 'Inventario ID',
            'Cantidad' => 'Cantidad',
            'Unidad' => 'Unidad',
            'Fecha' => 'Fecha',
            'Proveedor' => 'Proveedor',
            'turno_ID' => 'Turno  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventario()
    {
        return $this->hasOne(Inventario::className(), ['ID' => 'InventarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno()
    {
        return $this->hasOne(Turno::className(), ['ID' => 'turno_ID']);
    }
}
