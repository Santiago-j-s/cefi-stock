<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * El modelo Cuenta contiene la lógica correspondiente a las operaciones monetarias del kiosco
 *
 * Todas las operaciones matemáticas que involucren dinero deben realizarse con el módulo BCMATH
 */
class Cuenta extends Model
{
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_RETIRO = 'retiro';
    const SCENARIO_DEPOSITO = 'deposito';

    //TODO: Depósitos y retiros, mirar cefi_reglas.md
    public $montoDeposito;
    public $montoRetiro;

    private $_caja;
    private $_sobre;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MontoCaja', 'MontoSobre'], 'number', 'on' => self::SCENARIO_DEFAULT],
            [['MontoCaja', 'MontoSobre'], 'required', 'on' => self::SCENARIO_DEFAULT],

            [['montoRetiro'], 'number', 'on' => self::SCENARIO_RETIRO], 
            [['montoRetiro'], 'required', 'on' => self::SCENARIO_RETIRO],
 
            [['montoDeposito'], 'number', 'on' => self::SCENARIO_DEPOSITO],
            [['montoDeposito'], 'required', 'on' => self::SCENARIO_DEPOSITO],  
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MontoCaja' => 'Monto',
            'MontoSobre' => 'Monto',
            'FechaUltMovimientoCaja' => 'Último Movimiento',
            'FechaUltMovimientoSobre' => 'Último Movimiento',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->_caja = Caja::findOne(1);
        $this->_sobre = Sobre::findOne(1);
        parent::init();
    }

    /**
     * getMontoCaja devuelve la cantidad de dinero que se encuentra en Caja
     * 
     * @return string
     */
    public function getMontoCaja()
    {
        \Yii::info("Iniciado: " . \yii\helpers\VarDumper::dumpAsString($this->iniciado()));
        \Yii::info("Caja:\n" . \yii\helpers\VarDumper::dumpAsString($this->_caja));
        return ($this->iniciado()) ? $this->_caja->Monto : '';
    }

    /**
     * setMontoCaja modifica la cantidad de dinero que se encuentra en Caja
     * 
     * No guarda el nuevo valor en la base de datos, eso debe hacerse con el método 'save'
     */
    public function setMontoCaja($value)
    {
        $this->_caja->Monto = $value;
    }

    /**
     * getMontoSobre devuelve la cantidad de dinero que se encuentra en Sobre
     * 
     * @return string
     */
    public function getMontoSobre()
    {
        \Yii::info("Iniciado: "
            . \yii\helpers\VarDumper::dumpAsString($this->iniciado()));
        
        \Yii::info("Sobre:\n"
            . \yii\helpers\VarDumper::dumpAsString($this->_sobre));
        
        return ($this->iniciado()) ? $this->_sobre->Monto : '';
    }
    
    /**
     * setMontoSobre modifica la cantidad de dinero que se encuentra en Sobre
     * 
     * No guarda el nuevo valor en la base de datos, eso debe hacerse con el método 'save'
     */
    public function setMontoSobre($value)
    {
        $this->_sobre->Monto = $value;
    }

    public function getFechaUltMovimientoCaja()
    {
        return $this->_caja->FechaUltMovimiento;
    }

    public function getFechaUltMovimientoSobre()
    {
        return $this->_sobre->FechaUltMovimiento;
    }

    public function iniciarCuenta()
    {
        $this->_caja = new Caja();
        $this->_caja->ID = 1;
        $this->_sobre = new Sobre();
        $this->_sobre->ID = 1;
    }

    public function save()
    {
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();

        try {
            if (!$this->_caja->save()) {
                \Yii::error("Errores al guardar Caja:\n"
                    . \yii\helpers\VarDumper::dumpAsString($this->_caja->errors));

                throw new \Exception('Error al guardar el modelo');
            } 

            if (!$this->_sobre->save()) {
                \Yii::error("Errores al guardar Sobre:\n"
                    . \yii\helpers\VarDumper::dumpAsString($this->_sobre->errors));
                
                throw new \Exception('Error al guardar el modelo');
            }
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
        
        $transaction->commit();
        return true;
    }

    public function iniciado()
    {
        $existeCaja = ($this->_caja !== null);
        $existeSobre = ($this->_sobre !== null);
        return ($existeCaja && $existeSobre); 
    }
}