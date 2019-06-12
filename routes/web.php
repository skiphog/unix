<?php

use Crudch\Routing\Router;

/**
 * @var Router $route
 */

// Main page
$route->get('/', 'IndexController@index');

// Login, registration, repass, logout
$route->group('/auth', function (Router $route) {
    $route->get('/login', 'Auth\LoginController@login')->middleware('guest');
});
