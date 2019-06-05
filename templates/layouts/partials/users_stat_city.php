<?php
/**
 * @var array  $users
 * @var string $date
 */

$auth = auth();
?>

<ul class="information-list information-list-users">
    <li><?php echo e($auth->city); ?> - <?php echo count($users); ?></li>
    <?php foreach ($users as $user)  : ?>
        <li>
            <a class="hover-tip c-1 s-<?php echo $user['assistant']; ?> m-<?php echo $user['moderator']; ?> a-<?php echo $user['admin']; ?>" href="/user/<?php echo $user['id']; ?>">
                <?php echo genderIcon($user['gender']); ?>
                <?php if ($date === substr($user['birthday'], 5)) : ?>
                    <img src="/img/cake.svg" width="20" height="20" alt="">
                <?php endif; ?>
                <?php if (strtotime($user['vip_time']) - $_SERVER['REQUEST_TIME'] >= 0) : ?>
                    <img src="<?php echo \App\Arrays\VipSmiles::$array[$user['vipsmile']]; ?>" alt="">
                <?php endif; ?>
                <span><?php echo e(limit($user['login'], 12, '')); ?></span>
            </a>
            <?php if($auth->id !== (int)$user['id']) : ?>
                <a href="/privat/<?php echo $user['id']; ?>" data-privat="<?php echo $user['id']; ?>"><img src="/img/privat.gif" width="16" height="16" alt=""></a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
