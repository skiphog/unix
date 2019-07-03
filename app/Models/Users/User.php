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
class User extends Model implements \ArrayAccess
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

    /**
     * Whether a offset exists
     *
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->{$offset});
    }

    /**
     * Offset to retrieve
     *
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     *
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->{$offset};
    }

    /**
     * Offset to set
     *
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        $this->{$offset} = $value;
    }

    /**
     * Offset to unset
     *
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     *
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        unset($this->{$offset});
    }
}
