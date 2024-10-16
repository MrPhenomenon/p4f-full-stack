<?php

namespace app\controllers;

use app\models\Cart;
use Yii;
use yii\web\Controller;
use Stripe\Stripe;
use Stripe\Charge;
use app\models\Order;
use app\models\OrderDetail;
use Stripe\Exception\ApiErrorException;

class CartController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $userId = Yii::$app->user->id;
        $cartItems = Cart::getUserCart($userId);

        return $this->render('index', [
            'cartItems' => $cartItems,
        ]);
    }

    public function actionRemove()
    {
        if (Yii::$app->request->isPost) {
            $id = Yii::$app->request->post('id');

            if ($id) {
                $cartItem = Cart::findOne($id);

                if ($cartItem) {
                    $cartItem->delete();
                    return $this->asJson(['success' => true]);
                }
            }
        }

        return $this->asJson(['success' => false, 'message' => 'Invalid request.']);
    }

    public function actionAdd()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
        if (Yii::$app->user->isGuest) {
            return ['success' => false, 'message' => 'User must be logged in to add items to the cart.'];
        }
    
        $request = Yii::$app->request->post();
    
        if (isset($request['id'])) {
            $vendorId = $request['id'];
            $userId = Yii::$app->user->id;
    
            $existingCartItem = Cart::find()->where(['vendor_id' => $vendorId, 'user_id' => $userId])->one();
            if ($existingCartItem) {
                return ['success' => false, 'message' => 'Item already in the cart.'];
            } else {
                $cartItem = new Cart();
                $cartItem->vendor_id = $vendorId;
                $cartItem->user_id = $userId;
    
                if ($cartItem->save()) {
                    return ['success' => true];
                } else {
                    return ['success' => false, 'message' => 'Failed to add item to cart.', 'errors' => $cartItem->getErrors()];
                }
            }
        }
        return ['success' => false, 'message' => 'Invalid request.'];
    }
    

    public function actionProcess()
    {

        $paymentStatus = '';

        $userId = Yii::$app->user->id;
        // Fetch cart items for the logged-in user
        $cartItems = Cart::findAll(['user_id' => $userId]);


        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item->vendor->price;
        }

        $amountInCents = $subtotal * 100;

        Stripe::setApiKey(Yii::$app->components['stripe']['apiKey']);
        $token = Yii::$app->request->post('stripeToken');

        try {
            // Create a charge
            $charge = Charge::create([
                'amount' => $amountInCents,
                'currency' => 'usd',
                'source' => $token,
                'description' => 'Payment Description',
            ]);

            // Create the Order
            $order = new Order();
            $order->user_id = $userId;
            $order->amount = $subtotal;
            $order->status = 'completed';
            $order->created_at = date('Y-m-d H:i:s');

            if ($order->save()) {
               
                foreach ($cartItems as $item) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->product_id = $item->vendor_id;
                    $orderDetail->price = $item->vendor->price;
                    $orderDetail->quantity = 1;
                    $orderDetail->save();
                }

                $paymentStatus = 'success';
                Cart::deleteAll(['user_id' => $userId]);
            } else {

                Yii::$app->session->setFlash('error', 'Failed to create order.');

            }

        } catch (ApiErrorException $e) {
            $paymentStatus = 'failure';
            Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->render('alert', ['paymentStatus' => $paymentStatus]);

    }

}

