<?php
/**
 * @var PDO $db
 */

$total_new_moder = $db->query('select count(*) from users where `status` = 3')->fetchColumn() ?: '';
$total_new_moder1 = $db->query('select count(*) from `events` where `status` = 3')->fetchColumn() ?: '';
?>
<style>
    #moder-count, .moder-anons {
        color: #F00;
        font-weight: 700;
    }

    #moder-count {
        font-size: 16px
    }
</style>

<section class="information">
    <h3 class="information-header">Модераторская</h3>
    <ul class="information-list">
        <li>
            <a href="<?php echo url('/moder_log?action=moderations'); ?>">Модерация</a>
            <span id="moder-count"><?= $total_new_moder; ?></span>
        </li>
        <li><a href="<?php echo url('/moder_log?action=photo'); ?>">Фотографии</a></li>
        <li><a href="<?php echo url('/notebook'); ?>">Блокнот</a></li>
        <li>
            <a href="<?php echo url('/adminparty'); ?>">Анонсы</a>
            <span class="moder-anons"><?= $total_new_moder1; ?></span>
        </li>
        <li><a href="<?php echo url('/banlist'); ?>">Управление</a></li>
        <li><a href="<?php echo url('/modanket'); ?>">Лог-лист</a></li>
        <li><a href="<?php echo url('/masters'); ?>">Мастерская</a></li>
    </ul>
</section>
