<?php

/**
 * this file for routing
 */
require_once __DIR__ . '/../routes/auth.php';

$router->map('GET', '/', '\App\Controllers\Front\Home\HomeController@index', 'home');

/**
 * this routes for panel dashboard users
 */
$router->map('GET', '/panel/dashboard/users', '\App\Controllers\Panel\User\UserController@index', 'index');
$router->map('GET', '/panel/dashboard/users/create', '\App\Controllers\Panel\User\UserController@create', 'create');
$router->map('POST', '/panel/dashboard/users/store', '\App\Controllers\Panel\User\UserController@store', 'store');
//$router->map('GET', '/panel/dashboard/users/show', '\App\Controllers\Panel\User\UserController@show', 'show');
//$router->map('GET', '/panel/dashboard/users/edit', '\App\Controllers\Panel\User\UserController@edit', 'edit');
//$router->map('POST', '/panel/dashboard/users/update', '\App\Controllers\Panel\User\UserController@update', 'update');
//$router->map('POST', '/panel/dashboard/users/destroy', '\App\Controllers\Panel\User\UserController@destroy', 'destroy');

/**
 * this routes for panel dashboard products
 */
//$router->map('GET', '/panel/dashboard/products', '\App\Controllers\Panel\Product\ProductController@index', 'index');
//$router->map('GET', '/panel/dashboard/products/create', '\App\Controllers\Panel\Product\ProductController@create', 'create');
//$router->map('POST', '/panel/dashboard/products/store', '\App\Controllers\Panel\Product\ProductController@store', 'store');
//$router->map('GET', '/panel/dashboard/products/show', '\App\Controllers\Panel\Product\ProductController@show', 'show');
//$router->map('GET', '/panel/dashboard/products/edit', '\App\Controllers\Panel\Product\ProductController@edit', 'edit');
//$router->map('POST', '/panel/dashboard/products/update', '\App\Controllers\Panel\Product\ProductController@update', 'update');
//$router->map('POST', '/panel/dashboard/products/destroy', '\App\Controllers\Panel\Product\ProductController@destroy', 'destroy');