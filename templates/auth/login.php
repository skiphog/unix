<?php
/**
 * @var \Crudch\View\View $this
 */

$db = db();
$auth = auth();

?>

<?php $this->extend('layouts/layout'); ?>

<?php $this->start('style'); ?>
<?php $this->stop(); ?>

<?php $this->start('content'); ?>
    <h1 class="text-center">Вход на сайт</h1>

    <form method="post" action="<?php echo url('/authentication'); ?>">

        <div>
            <input name="login" type="text">
        </div>

        <div>
            <input name="password" type="password">
        </div>

        <div>
            <button class="btn btn-default" type="submit">Войти</button>
        </div>
    </form>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
<?php $this->stop(); ?>