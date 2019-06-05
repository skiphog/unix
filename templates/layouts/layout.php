<?php
/**
 * @var \Crudch\View\View $this
 */
$db = db();
$auth = auth();

$auth->detectMobile();
$auth->setTimeStamp();

$global = remember('main', static function () {
    $sql = 'select site_title, site_description, site_main, background, theme 
      from site 
    where site_id = 1';

    return db()->query($sql)->fetch(PDO::FETCH_ASSOC);
});

?>
<!doctype html>
<html lang="ru">
<?php require __DIR__ . '/head.php'; ?>
<body>
<?php if ($auth->isStealth()) {require __DIR__ . '/incognito.php';} ?>
<header class="header">
    <div class="header-section header-left" style="background-image: url('/img/backgrounds/left_<?php echo $global['background']; ?>.jpg')"><?php require __DIR__ . '/chat.php'; ?></div>
    <div class="header-section header-center" style="background-image: url('/img/backgrounds/center_<?php echo $global['background']; ?>.jpg')"><div class="header-center-attach"><?php require __DIR__ . '/center.php';require __DIR__ . '/mordalenta.php'; ?></div></div>
    <div class="header-section header-right" style="background-image: url('/img/backgrounds/right_<?php echo $global['background']; ?>.jpg')"></div>
</header>
<main class="main">
    <aside class="main-row main-left">
        <div class="main-left-wrapper">
            <?php
            require __DIR__ . '/menu_user.php';
            if($auth->isAdmin()) {require __DIR__ . '/menu_admin.php';}
            if($auth->isModerator()) {require __DIR__ . '/menu_mod.php';}
            require __DIR__ . '/story.php';
            require __DIR__ . '/stat.php';
            require __DIR__ . '/dop.php';
            ?>
        </div>
    </aside>
    <div id="content" class="main-row main-content"><?php echo $this->renderBlock('content') ?></div>
</main>
<footer class="footer"><?php require __DIR__ . '/footer.php'; ?></footer>
<div id="info-privat" class="border-box"></div><div id="preload-users" class="border-box-tip"><div id="response-preload-users"></div></div>
<script src="/js/jquery-1.12.4.min.js"></script>
<script src="/js/app.js"></script>
<?php echo $this->renderBlock('script') ?>
</body>
</html>