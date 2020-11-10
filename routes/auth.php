<?php
/**
 * this file for routing
 */
$router = new AltoRouter;

$router->map('GET', '/register', '\App\Controllers\Auth\AuthController@showRegisterForm', 'register');
$router->map('POST', '/register', '\App\Controllers\Auth\AuthController@register', 'registerPost');

$router->map('GET', '/login', '\App\Controllers\Auth\AuthController@showLoginForm', 'login');
$router->map('POST', '/login', '\App\Controllers\Auth\AuthController@login', 'loginPost');
