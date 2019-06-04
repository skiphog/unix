<?php
/**
* @var \Crudch\View\View $this
*/

$db = db();
$myrow = auth();

?>

<?php $this->extend('layouts/layout'); ?>

<?php $this->start('style'); ?>
<?php $this->stop(); ?>

<?php $this->start('content'); ?>
<?php var_dump($myrow) ?>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
<?php $this->stop(); ?>