<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turno".
 *
 * @property integer $ID
 * @property string $Hora Inicial
 * @property string $Hora Final
 * @property string $Fecha
 * @property integer $usuario_ID
 *
 * @property Movimiento[] $movimientos
 * @property Pago[] $pagos
 * @property PrecioProducto[] $precioProductos
 * @property RegistroProducto[] $registroProductos
 * @property Usuario $usuario
 * @property TurnoCaja[] $turnoCajas
 * @property TurnoVendedor[] $turnoVendedors
 * @property Venta[] $ventas
 */
class Turno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Hora Inicial', 'Hora Final', 'Fecha'], 'safe'],
            [['usuario_ID'], 'required'],
            [['usuario_ID'], 'integer'],
            [['usuario_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usuario_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Hora Inicial' => 'Hora  Inicial',
            'Hora Final' => 'Hora  Final',
            'Fecha' => 'Fecha',
            'usuario_ID' => 'Usuario  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientos()
    {
        return $this->hasMany(Movimiento::className(), ['turno_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pago::className(), ['turno_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecioProductos()
    {
        return $this->hasMany(PrecioProducto::className(), ['turno_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistroProductos()
    {
        return $this->hasMany(RegistroProducto::className(), ['turno_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['ID' => 'usuario_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnoCajas()
    {
        return $this->hasMany(TurnoCaja::className(), ['turno_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnoVendedors()
    {
        return $this->hasMany(TurnoVendedor::className(), ['turno_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['turno_ID' => 'ID']);
    }
}
