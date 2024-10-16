<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Cart;

class CartWidget extends Widget
{
    public function run()
    {
        $cartItemCount = 0;

        if (!Yii::$app->user->isGuest) {
            $userId = Yii::$app->user->id;
            $cartItemCount = Cart::countUserCartItems($userId); 
        }

        return $this->render('cartWidget', [
            'cartItemCount' => $cartItemCount,
        ]);
    }
}
