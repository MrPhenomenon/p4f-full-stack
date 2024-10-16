<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'],
            ['rememberMe', 'boolean'],
        ];
    }

    

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
 
        }
    }

    public function login($attribute)
    {
        if ($this->validate()) {
            $user = $this->getUser();
    
    
            // Now check if the account is activated
            if (!$user->validateStatus()) {
                $this->addError('password', 'Your account is not activated.');
                return false;
            }
    
            // Attempt to log in the user
            return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
    
        return false;
    }
    
    
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findOne(['email' => $this->email]);  // Find user by email
        }

        return $this->_user;
    }
}
