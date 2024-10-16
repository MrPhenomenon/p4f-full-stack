<?php
namespace app\models;

use yii\db\ActiveRecord;

class OrderDetail extends ActiveRecord
{
    public static function tableName()
    {
        return 'orderitems'; 
    }

    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    public function getVendor()
    {
        return $this->hasOne(Vendor::class, ['id' => 'vendor_id']); 
    }
}
