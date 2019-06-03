<?php
/**
 * Регистрация кастомных классов
 */
return [
    'global' => [
        //
    ],
    'web' => [
        \App\Components\Auth::class => function () {
            return (new \App\Components\Auth())->getAuthUser();
        },
    ],
    'api' => [
        \App\Components\Auth::class => function () {
            return (new \App\Components\AuthApi())->getAuthUser();
        },
    ]
];