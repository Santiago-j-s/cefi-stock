<?php

namespace app\models;

use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $ID
 * @property string $NombreUsuario
 * @property string $Password
 * @property string $AuthKey
 *
 * @property Turno[] $turnos
 */
class Usuario extends ActiveRecord implements IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreUsuario', 'Password'], 'required'],
            [['NombreUsuario'], 'string', 'max' => 45],
            [['Password'], 'string', 'max' => 60],
            [['AuthKey'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NombreUsuario' => 'Nombre Usuario',
            'Password' => 'Password',
            'AuthKey' => 'Authentication Key'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turno::className(), ['UsuarioID' => 'ID']);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($this->isNewRecord)
            {
                $this->AuthKey = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['NombreUsuario' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->ID;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->AuthKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->AuthKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->Password);
    }

    public static function logout()
    {
        $user = Yii::$app->user;
        $turno = Turno::encontrarTurnoUsuario($user->id);
        $turno->marcarHoraFinal();
        $user->logout();
    }
}
