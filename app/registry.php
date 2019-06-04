<?php
/**
 * Регистрация кастомных классов
 */
return [
    'global' => [
        \App\Components\Auth::class => static function () {
            return \App\Components\Auth::init();
        },
    ],
    'web'    => [],
    'api'    => [],
];