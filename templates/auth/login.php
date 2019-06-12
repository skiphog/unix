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
    <h1>Вход на сайт</h1>

    <form class="information" method="post" action="<?php echo url('/authentication'); ?>">
        <ul class="information-list">
            <li class="information-list-item mb-10">
                <input class="information-list-input" name="login" type="text" placeholder="Логин" required>
            </li>
            <li class="information-list-item mb-10">
                <input class="information-list-input" name="password" type="password" placeholder="Пароль" required>
            </li>
            <li class="information-list-item mb-10">
                <input id="check-1" name="save" type="checkbox" value="1" checked>
                <label for="check-1">Запомнить меня</label>
            </li>
            <li><button class="btn btn-default" type="submit">Войти</button></li>
        </ul>
    </form>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
<?php $this->stop(); ?>