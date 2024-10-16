<?php
use yii\helpers\Html;
?>
<div class="site-error">
    <div class="alert alert-danger text-center">
        <?php if (isset($error)): ?>
            <h1><?= Html::encode($error->statusCode) ?>: </h1>
            <p><?= Html::encode($error->getMessage()) ?></p>
        <?php else: ?>
            <h1>500: </h1>
            <p>An internal server error occurred.</p>
        <?php endif; ?>
    </div>
</div>