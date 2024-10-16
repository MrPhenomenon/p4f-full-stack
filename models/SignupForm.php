<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $token;
    public $confirmPassword;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'confirmPassword'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email is already registered.'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'This username is already taken.'],
            ['password', 'string', 'min' => 6],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords do not match.'],
        ];
    }

    public function signup()
{
    if ($this->validate()) {

        // Check if email already exists
        if (User::find()->where(['email' => $this->email])->exists()) {
            $this->addError('email', 'This email address has already been taken.');
            return null;
        }

        $user = new User();

        // Generate a verification token
        $user->token = Yii::$app->security->generateRandomString() . '_' . time();

        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->status = User::STATUS_INACTIVE;

        $query = $user->save(false);  // Save without validation to test
        echo $user->getDb()->createCommand()->getRawSql();
        
        if ($user->save()) {
            // Send email
            Yii::$app->mailer->compose()
                ->setTo($this->email)
                ->setSubject('Email Verification')
                ->setTextBody("Click this link to verify your email: " .
                    Yii::$app->urlManager->createAbsoluteUrl(['site/activate', 'token' => $user->token]))
                ->send();
            return $user;
        } else {
            Yii::error($user->getErrors(), __METHOD__); 
        }
    }
    return null;
}



}
