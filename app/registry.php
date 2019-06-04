<?php

/**
 * Регистрация кастомных классов
 */
return [
    'global' => [
        \App\Components\Guard::class => static function () {
            return \App\Components\Guard::init();
        },
    ],
    'web'    => [],
    'api'    => [],
];
