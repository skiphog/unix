<?php
/**
 * @var \Crudch\View\View $this
 */

$db = db();
$auth = auth();

?>

<?php $this->extend('layouts/layout'); ?>

<?php $this->start('style'); ?>
    <style>
        .auth-form {
            display: block;
            position: relative;
            width: 340px;
            margin: 0 auto;
            padding: 10px 20px;
        }
        .auth-form button {
            width: 120px;
            padding: 5px;
        }
        .auth-form-label {
            display: inline-block;
            font-size: 0.9em;
            font-weight: 700;
        }
        .auth-form-input {
            display: block;
            width: 100%;
            padding: 5px;
            border: 1px solid #d4d4d4;
        }

        .auth-form-error {
            color: #c9302c;
            margin-left: 10px;
            font-size: .9em;
            height: 16px;
        }
    </style>
<?php $this->stop(); ?>

<?php $this->start('content'); ?>
    <h1 class="text-center">Вход на сайт</h1>
    <form class="auth-form shadow-box" method="post" action="<?php echo url('/auth/login'); ?>">
        <div>
            <label class="auth-form-label" for="login">Логин</label>
            <input class="auth-form-input" id="login" name="login" type="text" autofocus>
            <div class="auth-form-error">Пожалуйста, введите корректный email адрес</div>
        </div>
        <div class="mb-10">
            <label class="auth-form-label" for="password">Пароль</label>
            <input class="auth-form-input" id="password" name="password" type="password">
            <div class="auth-form-error"></div>
        </div>
        <div class="mb-20 text-center">
            <button class="btn btn-primary" type="button">Войти</button>
        </div>

        <div class="text-center">
            <a href="<?php echo url('/auth/registration'); ?>">Зарегистрироваться</a>
            &bull;
            <a href="<?php echo url('/auth/repass'); ?>">Восстановить пароль</a>
        </div>
    </form>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
    <script>
        var send;

    </script>
<?php $this->stop(); ?>