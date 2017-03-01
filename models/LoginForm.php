<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Login Form
 */
class LoginForm extends Model
{
    public $nombreUsuario;
    public $password;
    public $rememberMe = true;

    private $_usuario;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreUsuario', 'password'], 'required'],
            [['rememberMe'], 'boolean'],
            [['password'], 'validatePassword'],
        ];
    }

    /**
     * Valida un password de usuario
     *
     * @param string $attribute el atributo que va a ser validado
     * @param array $params pares nombre-valor adicionales dados en la regla
     */
    public function validatePassword($attribute, $params = null)
    {
        if(!$this->hasErrors()) {
            $usuario = $this->getUsuario();
            if(!$usuario or !$usuario->validatePassword($this->password)) {
                $this->addError($attribute, 'Nombre de usuario o password no válido.');
            }
        }
    }

    /**
     * Loguea un usuario
     * @return boolean true si se pudo loguear, false en caso contrario.
     */
    public function login()
    {
        if(!$this->validate()) {
            return false;
        }
        
        return Yii::$app->user->login($this->getUsuario(), $this->rememberMe ? 3600 * 24 * 30 : 0);
    }

    /**
     * Devuelve el usuario asociado al nombre de usuario dado
     */
    public function getUsuario()
    {
        if($this->_usuario === null) {
            $this->_usuario = Usuario::findByUsername($this->nombreUsuario);
        }

        return $this->_usuario;
    }
}