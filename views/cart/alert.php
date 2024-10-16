
<div class="container text-center d-flex justify-content-center align-items-center my-5">

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php elseif ($paymentStatus == 'success'): ?>
    <div class="alert alert-success">
        Payment was successful!
    </div>
<?php endif; ?>

</div>