<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName(): string
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique'],
            [['status'], 'integer'],
            [['token'], 'string', 'max' => 255],
        ];
    }
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;


    public static function findIdentity($id): ?User
    {
        return static::findOne($id);
    }


    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'username' => 'Username',
            'status' => 'Status',
        ];
    }

    public function validateStatus()
    {
        if ($this->status != self::STATUS_ACTIVE) {
            $this->addError('status', 'Your account is inactive. Please contact support.');
            return false;
        }
        return true;
    }

    public function activate()
    {
        $this->status = self::STATUS_ACTIVE;
        $this->token = null;
        return $this->save();
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {

        return null;
    }


    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        // return $this->authKey; // Optional: remove if you're not using this
    }


    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }


    public function setPassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }
}