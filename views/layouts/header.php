<?php
use yii\helpers\Html;
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PASS4FUTURE</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- plugins CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


  <!-- Main CSS File -->
  <?= Html::cssFile('@web/css/main.css') ?>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?= \yii\helpers\Url::to(['site/index']) ?>" class="logo d-flex align-items-center me-auto">

        <h1 class="sitename">PASS4FUTURE</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= \yii\helpers\Url::to(['site/index']) ?>"
              class="<?= Yii::$app->controller->action->id === 'index' ? 'active' : '' ?>">Home<br></a></li>

          <li><a href="<?= \yii\helpers\Url::to(['site/vendors']) ?>"
              class="<?= Yii::$app->controller->action->id === 'Vendors' ? 'active' : '' ?>">Vendors</a></li>

          <li><a href="<?= \yii\helpers\Url::to(['site/contact']) ?>"
              class="<?= Yii::$app->controller->action->id === 'contact' ? 'active' : '' ?>">Contact</a></li>


          <?php if (Yii::$app->user->isGuest): ?>

            <li><a href="<?= \yii\helpers\Url::to(['site/login']) ?>"
                class="<?= Yii::$app->controller->action->id === 'login' ? 'active' : '' ?>">Login / Signup</a></li>
          <?php else: ?>
            <li>
              <?= Html::beginForm(['site/logout'], 'post', ['class' => 'logout-form']) ?>
              <a class="logout-button">

                <?= Html::submitButton("Welcome, " . Yii::$app->user->identity->username . " (Logout)", ['class' => 'logout ']) ?>
                <?= Html::endForm() ?>

              </a>
            </li>
          <?php endif; ?>
          <?= \app\widgets\CartWidget::widget() ?>

          
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>