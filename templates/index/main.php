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
<pre>
<?php print_r(range('A', 'z')) ?>
</pre>
<?php $this->stop(); ?>

<?php $this->start('script'); ?>
<?php $this->stop(); ?>