<?php

namespace App\Components;

use App\Models\Users\Auth;

/**
 * Class Auth
 *
 * @package App\Components
 */
class Guard
{
    /**
     * @return Auth
     */
    public static function init()
    {
        if (isset($_SESSION['id'], $_SESSION['password'])) {
            return Auth::init($_SESSION['id'], $_SESSION['password']) ?: new Auth();
        }

        if (isset($_COOKIE['id'], $_COOKIE['password'])) {
            $user = Auth::init($_COOKIE['id'], $_COOKIE['password']);

            if (!empty($user)) {
                $_SESSION['id'] = $user->id;
                $_SESSION['password'] = $user->password;
                $_SESSION['login'] = $user->login;

                return $user;
            }
        }

        return new Auth();
    }
}
