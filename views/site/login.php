<?php use yii\bootstrap5\ActiveForm; ?>
<?php use yii\bootstrap5\Html; ?>

<section class="registration-form container">
    <div class="row">

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?= Yii::$app->session->getFlash('success') ?>
            </div>
        <?php endif; ?>


        <!-- Signup Form -->
        <div class="col-lg-6 col-md-12 signup">
            <?php $signupForm = ActiveForm::begin(['id' => 'signup-form']); ?>
            <h3>Sign up</h3>
            <div class="form-icon">
                <span><i class="bi bi-person-plus-fill"></i></span>
            </div>

            <!-- Username -->
            <div class="form-group">
                <?= $signupForm->field($signupModel, 'username')->textInput(['class' => 'form-control item', 'placeholder' => 'Username'])->label(false) ?>
            </div>

            <!-- Email -->
            <div class="form-group">
                <?= $signupForm->field($signupModel, 'email')->textInput(['class' => 'form-control item', 'placeholder' => 'Email'])->label(false) ?>
            </div>

            <!-- Password -->
            <div class="form-group">
                <?= $signupForm->field($signupModel, 'password')->passwordInput(['class' => 'form-control item', 'placeholder' => 'Password'])->label(false) ?>
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <?= $signupForm->field($signupModel, 'confirmPassword')->passwordInput(['class' => 'form-control item', 'placeholder' => 'Confirm Password'])->label(false) ?>
            </div>

            <!-- Submit button -->
            <div class="form-group">
                <?= Html::submitButton('Sign up', ['class' => 'btn btn-block create-account', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

        <!-- Login Form -->
        <div class="col-lg-6 col-md-12 login">

            <?php $loginForm = ActiveForm::begin(['id' => 'login-form']); ?>
            <h3>Sign in</h3>
            <div class="form-icon">
                <span><i class="bi bi-person-fill"></i></span>
            </div>

            <div class="form-group">
                <?= $loginForm->field($loginModel, 'email')->textInput(['class' => 'form-control item', 'placeholder' => 'Email'])->label(false) ?>
            </div>
            <div class="form-group">
                <?= $loginForm->field($loginModel, 'password')->passwordInput(['class' => 'form-control item', 'placeholder' => 'Password'])->label(false) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-block create-account', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>
</section>