<?php
/**
 * Регистрация кастомных классов
 */
return [
    'global' => [
        \App\Components\Auth::class => static function () {
            return (new \App\Components\Auth())->getAuthUser();
        },
    ],
    'web' => [],
    'api' => []
];