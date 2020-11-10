<?php
/**
 * this file for starting app
 */

use App\Providers\App;
use App\Providers\QueryBuilder;
use App\Providers\Connection;
/*
|--------------------------------------------------------------------------
| www www www www www
|--------------------------------------------------------------------------
|

|
*/
///**
// * start session if not already started
// */
if(!isset($_SESSION))
    session_start();

/**
 * load environment variable
 */
require_once __DIR__.'/../config/database.php';

//App::bind('config', require_once __DIR__ . '/../config.php');

//App::bind('database', new QueryBuilder(
//    Connection::make(App::get('config')['database'])
//));


/**
 * this statement for create database table
 */
//require_once __DIR__ . '/../database/migrations/Create-Categories-Table.php';
//require_once __DIR__ . '/../database/migrations/Create-Users-Table.php';

/**
 * this instance for connection
 */
//new App\Providers\Connection();

/**
 * set custom error handler
 */
//set_error_handler([new \App\Exceptions\ErrorHandler(), 'handleErrors']);

/**
 * this instance for load all directory web (routes)
 */
require_once __DIR__.'/../routes/web.php';


/**
 * this instance for router
 */
new \App\Providers\Route($router);