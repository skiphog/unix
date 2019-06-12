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
<?php var_dump($auth) ?>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
<?php $this->stop(); ?>