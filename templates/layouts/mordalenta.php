<?php
/**
 * @var PDO $db
 */

$sql = 'select l.id, l.id_user, l.text, u.login, u.pic1, u.gender, u.vip_time, u.city
    from lenta l
    join users u on l.id_user = u.id
    where u.status <> 2
order by l.id desc limit 10';

$stmt = $db->query($sql);
$items = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if (strtotime($row['vip_time']) - $_SERVER['REQUEST_TIME'] < 0) {
        $row['background'] = '#fff';
        $items[] = $row;
        continue;
    }
    $sql = 'select v.background
        from `option` o
        left join vip_background v on v.id = o.vip_background
    where o.u_id = ' . (int)$row['id_user'];

    $row['background'] = 'url('. ($db->query($sql)->fetchColumn() ?: '/img/vip.jpg') .')';
    $items[] = $row;
}

?>

<ul class="mordalenta">
    <?php foreach ($items as $item) : ?>
        <li class="mordalenta-item">
            <img class="mordalenta-item-avatar" src="/avatars/user_thumb/<?php echo $item['pic1']; ?>" alt="">
            <div class="mordalenta-item-info"></div>
        </li>
    <?php endforeach; ?>
</ul>
