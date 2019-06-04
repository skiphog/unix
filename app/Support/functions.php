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
