<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "turno".
 *
 * @property integer $ID
 * @property string $HoraInicial
 * @property string $HoraFinal
 * @property integer $UsuarioID
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
            [['HoraInicial', 'HoraFinal'], 'safe'],
            [['UsuarioID'], 'required'],
            [['UsuarioID'], 'integer'],
            [
                ['UsuarioID'],
                'exist', 
                'skipOnError' => true,
                'targetClass' => Usuario::className(),
                'targetAttribute' => ['UsuarioID' => 'ID']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'HoraInicial' => 'Hora Inicial',
            'HoraFinal' => 'Hora Final',
            'UsuarioID' => 'Usuario ID',
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
        return $this->hasOne(Usuario::className(), ['ID' => 'UsuarioID']);
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

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(!parent::beforeSave($insert)) {
            return false;
        }

        $this->HoraInicial = new Expression('NOW()');
        return true;
    }
}
