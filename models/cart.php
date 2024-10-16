<?php
namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function rules()
    {
        return [
            [['vendor_id', 'user_id'], 'required'], 
            [['vendor_id', 'user_id'], 'integer'], 
            // Add other rules as necessary
        ];
    }

    public static function tableName()
    {
        return 'cart';
    }

    public function getVendor()
    {
        return $this->hasOne(Vendor::class, ['id' => 'vendor_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public static function getUserCart($userId)
    {
        return self::find()
            ->where(['user_id' => $userId])
            ->with('vendor')  // Eager load vendor data
            ->all();
    }
    public static function countUserCartItems($userId)
    {
        return self::find()->where(['user_id' => $userId])->count();
    }
}

