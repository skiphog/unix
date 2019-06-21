<?php

namespace App\Models\Users;

use Crudch\Database\Model;

/**
 * Class User
 *
 * @property int    $id
 * @property int    $admin
 * @property int    $moderator
 * @property int    $assistant
 * @property string $login
 * @property int    $gender
 * @property string $city
 * @property int    $status
 * @property int    $rate
 * @property int    $real_status
 * @property string $moder_text
 * @property string $vip_time
 *
 * @package App\Models\Users
 */
class User extends Model
{
    /**
     * Статус Активно
     */
    public const ACTIVE = 1;

    /**
     * Статус не активно
     */
    public const INACTIVE = 2;

    /**
     * Статус на модерации
     */
    public const ON_MODERATION = 3;

    /**
     * Забанен
     */
    public const BAN = '_БАН_';

    /**
     * @var bool
     */
    protected $vip;

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return (bool)$this->admin;
    }

    /**
     * @return bool
     */
    public function isModerator()
    {
        return (bool)$this->moderator;
    }

    /**
     * @return bool
     */
    public function isReal()
    {
        return (bool)$this->real_status;
    }

    /**
     * @return bool
     */
    public function isVip()
    {
        if (null === $this->vip) {
            $this->vip = strtotime($this->vip_time) - $_SERVER['REQUEST_TIME'] >= 0;
        }

        return $this->vip;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return self::ACTIVE === $this->status;
    }

    /**
     * @return bool
     */
    public function isInActive()
    {
        return self::INACTIVE === $this->status;
    }

    /**
     * @return bool
     */
    public function isOnModeration()
    {
        return self::ON_MODERATION === $this->status;
    }

    /**
     * @param $name
     * @param $value
     *
     * @return mixed
     */
    protected function specialSet($name, $value)
    {
        return is_numeric($value) ? $this->{$name} = (int)$value : $this->{$name} = $value;
    }

    /**
     * Получить id всех модераторов сайта
     *
     * @return array
     */
    public static function moderatorIds()
    {
        $sql = 'select id from users where moderator <> 0 and id <> 935 order by id';

        return db()->query($sql)->fetchAll(\PDO::FETCH_COLUMN, 0);
    }
}
