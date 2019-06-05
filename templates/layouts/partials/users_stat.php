<?php
/**
 * @var array $users
 * @var string $date
 */
?>

<ul class="information-list information-list-users">
    <?php foreach ($users as $user)  : ?>
        <li>
            <a class="hover-tip s-<?php echo $user['assistant']; ?> m-<?php echo $user['moderator']; ?> a-<?php echo $user['admin']; ?>" href="/user/<?php echo $user['id']; ?>">
                <?php echo genderIcon($user['gender'], 16, 16); ?>
                <?php if ($date === substr($user['birthday'], 5)) : ?>
                    <img src="/img/cake.svg" width="20" height="20" alt="">
                <?php endif; ?>
                <?php if (strtotime($user['vip_time']) - $_SERVER['REQUEST_TIME'] >= 0) : ?>
                    <img src="<?php echo \App\Arrays\VipSmiles::$array[$user['vipsmile']]; ?>" alt="">
                <?php endif; ?>
                <span><?php echo e($user['login']); ?></span>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
