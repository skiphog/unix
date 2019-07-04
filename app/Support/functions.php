<?php

/**
 * @return \App\Models\Users\Auth
 */
function auth()
{
    return app(\App\Components\Guard::class);
}

/**
 * @param string $string
 *
 * @return string
 */
function hyperlink($string)
{
    /** @noinspection UnknownInspectionInspection */
    /** @noinspection HtmlUnknownTarget */
    return preg_replace(
        '!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;/=]+)!iu',
        '<a href="$1" target="_blank" rel="noopener noreferrer">Ссылка</a>',
        $string
    );
}

/**
 * @param $text
 *
 * @return string
 */
function smile($text)
{
    return strtr($text, \App\Arrays\Smiles::$smiles);
}

/**
 * @param string $city1
 * @param string $city2
 *
 * @return int
 */
function cityCompare($city1, $city2)
{
    return (int)(mb_strtolower($city1) === mb_strtolower($city2));
}

/**
 * @param int $number
 *
 * @return string
 */
function formatNumber($number)
{
    return number_format($number, 0, '', ' ');
}

/**
 * Получить иконку юзера на основании gender
 *
 * @param int $gender
 * @param int $width
 * @param int $height
 *
 * @return string
 */
function genderIcon($gender, $width = 20, $height = 20)
{
    return '<img class="user-icon" src="' . \App\Arrays\Genders::$icons[$gender] . '" width="' . $width . '" height="' . $height . '" alt="gender">';
}

/**
 * @param string $text
 *
 * @return string
 */
function imgart($text)
{
    return preg_replace_callback('~{{(.+?)}}~', static function ($matches) {
        return '<img class="ug-imgart" src="/imgart/' . e($matches[1]) . '">';
    }, $text);
}

/**
 * @param $text
 *
 * @return mixed|null|string
 */
function nickart($text)
{
    $login = auth()->login;

    return preg_replace_callback('#\|\|(.+?)\|\|#', static function ($value) use (&$login) {
        $color = $login === $value[1] ? '#F00' : '#747474';

        return '<b style="color:' . $color . '">' . e($value[1]) . '</b>';
    }, $text);
}

/**
 * @param $string
 *
 * @return string
 */
function html($string)
{
    return e($string);
}

/**
 * Доступ к аватарке пользователя
 *
 * @param \App\Models\Users\Auth $auth
 * @param string                 $pic
 * @param int                    $uVis
 *
 * @return string
 */
function avatar(\App\Models\Users\Auth $auth, string $pic, int $uVis)
{
    if (0 === $uVis || ((2 === $uVis || 1 === $uVis) && $auth->isUser()) || (3 === $uVis && $auth->isReal())) {
        return '/avatars/user_thumb/' . $pic;
    }

    if (2 === $uVis) {
        return '/img/avatars/user.jpg';
    }

    return '/img/avatars/real.jpg';
}


