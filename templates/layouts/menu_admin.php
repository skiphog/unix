<?php
/**
 * @var PDO $db
 */

$total_new_moder2 = db()->query('select count(*) from complaints where `status` = 0')->fetchColumn() ?: '';
?>
<style>
    .count-complaints {
        color: #F00;
        font-weight: 700;
    }
    #admin-deep {
        padding: 0;
    }
</style>

<section class="information">
    <h3 class="information-header">Админка</h3>
    <ul class="information-list">
        <li><a href="/adminpanel">Админ-панель</a></li>
        <li><a href="/adminrazdnews">Новости</a></li>
        <li><a href="/adminglobal">Настройки</a></li>
        <li><a href="/complaints?getOpenComplaints">Жалобы</a>
            <span class="count-complaints"><?php echo $total_new_moder2; ?></span>
        </li>
        <li><a href="/dispatch">Рассылка</a></li>
        <li class="list-divider"></li>
        <li><a href="#" data-toggle="admin-deep">Доп Настройки</a>
            <ul id="admin-deep" class="information-list hidden">
                <li class="list-divider"></li>
                <li><a href="/adminglobal?page=banners">Баннеры</a></li>
                <li><a href="/adminglobal?page=present">Подарки</a></li>
                <li><a href="/adminglobal?page=rewards">Виджеты</a></li>
                <li><a href="/adminglobal?page=fonts">Фоны</a></li>
                <li><a href="/adminglobal?page=private">Приват</a></li>
                <li><a href="/adminglobal?page=disk">Диск</a></li>
                <li><a href="/adminglobal?page=adv">Реклама</a></li>
                <li><a href="/adminglobal?page=errors">Ошибки</a></li>
            </ul>
        </li>
    </ul>
</section>
