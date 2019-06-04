<?php

namespace App\Components;

use App\Models\Users\Myrow;

/**
 * Class Auth
 *
 * @package App\Components
 */
class Auth
{
    /**
     * @return Myrow
     */
    public static function init()
    {
        if (isset($_SESSION['id'], $_SESSION['password'])) {
            return Myrow::getMyrow($_SESSION['id'], $_SESSION['password']) ?: new Myrow();
        }

        if (isset($_COOKIE['id'], $_COOKIE['password'])) {
            $user = Myrow::getMyrow($_COOKIE['id'], $_COOKIE['password']);

            if (!empty($user)) {
                $_SESSION['id'] = $user->id;
                $_SESSION['password'] = $user->password;
                $_SESSION['login'] = $user->login;

                return $user;
            }
        }

        return new Myrow();
    }
}
