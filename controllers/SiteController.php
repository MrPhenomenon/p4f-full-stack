<?php

namespace app\controllers;

use app\models\Cart;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use yii\db\ActiveRecord;
use app\models\Vendor;
use app\models\Exams;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $vendors = Vendor::find()->limit(8)->all();
        $userId = Yii::$app->user->id;
        $cartItemCount = Cart::countUserCartItems($userId);

        return $this->render('index', [
            'vendors' => $vendors,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function actionVendors()
    {
        $vendors = vendor::find()->all();

        return $this->render('vendors', [
            'vendors' => $vendors,
        ]);

    }

    public function actionExam()
    {
        $vendorId = Yii::$app->request->get('id');

        $exams = Exams::getExamsByVendor($vendorId);

        if (!empty($exams)) {
            return $this->render('exam', [
                'exams' => $exams,
            ]);

        } else {
            return $this->render('error');
        }

    }

    /**
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $loginModel = new LoginForm();
        $signupModel = new SignupForm();

        // Handle login submission
        if ($loginModel->load(Yii::$app->request->post()) && $loginModel->login('username')) {
            return $this->goBack();  // Redirect on successful login
        }

        // Handle signup submission
        if ($signupModel->load(Yii::$app->request->post()) && $signupModel->signup()) {
            Yii::$app->session->setFlash('success', ' Thank you for signing up! Please check your email for a verification link to activate your account.');
            return $this->redirect(['site/login']); // Redirect on successful signup
        }

        return $this->render('login', [
            'loginModel' => $loginModel,
            'signupModel' => $signupModel,
        ]);
    }


    public function actionActivate($token)
    {
        $user = User::find()->where(['token' => $token])->one();

        if ($user) {
            if ($user->activate()) {
                Yii::$app->session->setFlash('success', 'Your account has been activated. You can now log in.');
                return $this->redirect(['site/login']);
            } else {
                Yii::$app->session->setFlash('error', 'Failed to activate your account. Please try again.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Invalid activation link or token.');
        }

        return $this->redirect(['site/index']);
    }
    /**
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    /**
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionError()
    {
        $error = Yii::$app->errorHandler->exception;
        if ($error !== null) {
            return $this->render('error', ['error' => $error]);
        }

        return $this->render('error', ['error' => new \yii\web\HttpException(500, 'Internal Server Error')]);
    }



}

