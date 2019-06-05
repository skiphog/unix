<?php
/**
 * @var PDO                     $db
 * @var \App\Models\Users\Auth $auth
 */

$a_count = remember('a_count', static function () use (&$db) {
    return (int)$db->query('select count(*) from users')
        ->fetchColumn();
}, 43200);
$g_online = remember('visitors', static function () {
    try {
        return random_int(100, 400);
    } catch (Exception $e) {
        return 100;
    }
}, 600);
$ondata = remember('online_users', static function () {
    /* $sql = 'select ut.id,ut.last_view,u.login,u.admin,u.vip_time,
         u.vipsmile,u.moderator,u.pic1,u.gender,u.city,u.birthday
         from users_timestamps ut
         join users u on u.id = ut.id
         where ut.last_view > DATE_SUB(NOW(), interval 600 second)
     order by u.id desc';

     return $db->query($sql)
         ->fetchAll(PDO::FETCH_ASSOC);*/
    return require __DIR__ . '/_usersi.php';
}, 300);
$t_online = $g_online + ($u_online = count($ondata));

$city_users = [];
$users = [];

if ($auth->isUser()) {
    foreach ($ondata as $user) {
        if (1 === cityCompare($auth->city, $user['city'])) {
            $city_users[] = $user;
            continue;
        }
        $users[$user['city']][] = $user;
    }
}

$date = date('m-d');
?>

<section class="information" id="user-stat">
    <h3 class="information-header">Статистика</h3>
    <ul class="information-list">
        <li>Всего анкет: <strong><?php echo formatNumber($a_count); ?></strong></li>
        <li>
            <a href="<?php echo url('/users/online'); ?>">Всего онлайн:</a>
            <strong><?php echo $t_online; ?></strong>
        </li>
        <li>Гостей - <strong><?php echo $g_online; ?></strong></li>
        <li>Пользователей - <strong><?php echo $u_online ?></strong></li>
    </ul>
    <?php if($auth->isUser()) {
        echo render('layouts/partials/users_stat_city', [
            'users' => $city_users,
            'date'  => $date,
        ]);

        uasort($users, static function ($a, $b){
            return -(count($a) <=> count($b));
        });

        echo render('layouts/partials/users_stat_other', [
            'data' => $users,
            'date'  => $date,
        ]);
    }else {
        echo render('layouts/partials/users_stat', [
            'users' => $ondata,
            'date'  => $date,
        ]);
    } ?>
</section>