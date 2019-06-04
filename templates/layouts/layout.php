<?php
/**
 * @var \Crudch\View\View $this
 */
$dbh = db();
$auth = auth();

$auth->detectMobile();
$auth->setTimeStamp();

?>
<!doctype html>
<html lang="ru">
<?php require __DIR__ . '/head.php'; ?>
<body>
<?php if ($auth->isStealth()) {
    require __DIR__ . '/incognito.php';
} ?>
<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/app.js"></script>
<?php echo $this->renderBlock('script') ?>
</body>
</html>