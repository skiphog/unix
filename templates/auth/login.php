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
            width: 400px;
            margin: 0 auto;
        }
    </style>
<?php $this->stop(); ?>

<?php $this->start('content'); ?>
    <h1 class="text-center">Вход на сайт</h1>

    <form class="auth-form" method="post" action="<?php echo url('/authentication'); ?>">

        <div>
            <label for="login">Логин</label>
            <input id="login" name="login" type="text">
        </div>

        <div>
            <label for="password">Пароль</label>
            <input id="password" name="password" type="password">
        </div>

        <div>
            <button class="btn btn-default" type="submit">Войти</button>
        </div>
    </form>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
<?php $this->stop(); ?>