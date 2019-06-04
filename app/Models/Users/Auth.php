<?php

namespace App\Models\Users;

/**
 * Class Myrow
 *
 * @property string $password
 * @property int    $country
 * @property int    $stealth
 *
 * @package App\Models\Users
 */
class Auth extends User
{
    /**
     * @var mixed
     */
    protected $cnt_message;

    /**
     * @var mixed
     */
    protected $cnt_notify;

    /**
     * @var bool
     */
    protected $mobile = false;

    /**
     * @param int    $id
     * @param string $password
     *
     * @return mixed
     */
    public static function init(int $id, string $password)
    {
        $dbh = db();

        $sql = "select `id`, `admin`, `moderator`, `assistant`, `password`, `login`, `gender`, `city`, `country`, 
            `status`, `rate`, `real_status`, `moder_text`, `vip_time`, `stealth` 
            from `users` where `id` = {$id} and `password` = {$dbh->quote($password)} limit 1";

        return $dbh->query($sql)->fetchObject(self::class);
    }

    /**
     * @return bool
     */
    public function isUser()
    {
        return isset($this->id);
    }

    /**
     * @return bool
     */
    public function isGuest()
    {
        return !$this->isUser();
    }

    /**
     * @return bool
     */
    public function isSuperUser()
    {
        return $this->isUser() && (3 === $this->id || 71268 === $this->id);
    }

    /**
     * @return bool
     */
    public function isStealth()
    {
        return $this->isVip() && (bool)$this->stealth;
    }

    /**
     * @return bool
     */
    public function isMobile()
    {
        return $this->mobile;
    }

    /**
     * Обновить время на сайте
     *
     * @var void
     */
    public function setTimeStamp()
    {
        if ($this->isUser()) {
            $cache = cache();
            if (!$this->isStealth()) {
                $uonline = $cache->get('ts' . $this->id);

                if (!$uonline || (int)$uonline < ((int)$_SERVER['REQUEST_TIME'] - 600)) {
                    db()->exec('update users_timestamps 
                      set last_view = NOW(), ip = ' . request()->clientIp2long() . ' 
                    where id = ' . $this->id);

                    $cache->delete('online_users');
                }
            }
            $cache->set('ts' . $this->id, (int)$_SERVER['REQUEST_TIME']);
        }
    }

    /**
     * Определить мобильность
     *
     * @return void
     */
    public function detectMobile()
    {
        if (isset($_SESSION['mobile'])) {
            $this->mobile = (bool)$_SESSION['mobile'];
        } elseif (isset($_COOKIE['mobile'])) {
            $_SESSION['mobile'] = (int)$_COOKIE['mobile'];
            $this->mobile = (bool)$_SESSION['mobile'];
        } else {
            $detect = (int)(new \Detection\MobileDetect())->isMobile();
            $_SESSION['mobile'] = $detect;
            setcookie('mobile', $detect, 0x7FFFFFFF, '/', config('domain'));
            $this->mobile = (bool)$detect;
        }
    }

    /**
     * Получить количество заявок в друзья
     *
     * @return string
     */
    public function cntFriends()
    {
        $sql = "select count(*) from friends where fr_kogo = {$this->id} and fr_podtv_kogo = 0";

        return db()->query($sql)->fetchColumn() ?: '';
    }

    /**
     * Получить количество новых сообщений
     *
     * @return string
     */
    public function cntMessage()
    {
        if (null === $this->cnt_message) {
            $sql = "select count(*) from privat where pr_id_pol = {$this->id} and pr_pol_vis = 0";
            $this->cnt_message = db()->query($sql)->fetchColumn() ?: '';
        }

        return $this->cnt_message;
    }

    /**
     * Получить количество новых уведомлений
     *
     * @return string
     */
    public function cntNotify()
    {
        if (null === $this->cnt_notify) {
            $sql = "select count(*) from notification where id_user = {$this->id} and visibled = 0";
            $this->cnt_notify = db()->query($sql)->fetchColumn() ?: '';
        }

        return $this->cnt_notify;
    }

    /**
     * Получить количество гостей
     *
     * @return string
     */
    public function cntGuest()
    {
        $sql = "select count(*) from whoisloock where wholoock_kogo = {$this->id} and looking = 0";

        return db()->query($sql)->fetchColumn() ?: '';
    }

    /**
     * @return mixed
     */
    public function privateMessage()
    {
        $dbh = db();
        $sql = 'select count(*) from privat where pr_id_pol = ' . $this->id . ' and pr_pol_vis = 0';

        if (!$count = $dbh->query($sql)->fetchColumn()) {
            return null;
        }

        $sql = 'select p.pr_id_otp, u.login, pr_text, pr_time 
          from privat p 
          join users u on u.id = p.pr_id_otp 
          where p.pr_id_pol = ' . $this->id . ' 
          and p.pr_pol_vis = 0 
        order by p.pr_id desc limit 1';

        return [
            'count'   => $count,
            'message' => $dbh->query($sql)->fetch(),
        ];
    }

    /**
     * @return string|null
     */
    public function sgender()
    {
        if ($this->isGuest()) {
            return null;
        }

        $sgender = db()->query('select sgender from users where id = ' . $this->id . ' limit 1')->fetchColumn();

        $sgender = array_filter(explode(',', $sgender), static function ($v) {
            return (int)$v;
        });

        if (empty($sgender)) {
            $sgender = [1, 2, 3, 4];
        }

        return implode(',', $sgender);
    }
}
