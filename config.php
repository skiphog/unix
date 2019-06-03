<?php

return [
    /**
     * Окружение:  local | production
     */
    'env' => 'local',

    /**
     * Имя приложения
     */
    'domain' => 'unix', // unix.ru
	
	/**
     * Полный путь
     */
    'url' => 'http://unix',
	
    /**
     * Использовать HTTPS в куках
     */
    'secure' => false,

    /**
     * Подключение к бд
     */
    'db' => [
        'host'     => '127.0.0.1',
        'dbname'   => 'swingsite',
        'username' => 'root',
        'password' => '',
        'options'  => [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            //PDO::ATTR_EMULATE_PREPARES  => false,
            //PDO::ATTR_STRINGIFY_FETCHES => false
        ]
    ],

    /**
     * Кеш
     */
    'cache_driver' => \Crudch\Cache\Drivers\FileDriver::class,

    /**
     * Основной email
     */
    'mail' => 'info@unix.com'
];
