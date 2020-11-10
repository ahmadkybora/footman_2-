<?php

/**
 * this method for load all statement in env file and load autoloader
 */
define('BASE_PATH', realpath(__DIR__.'/../'));

require_once __DIR__.'/../vendor/autoload.php';

$dotEnv = new \Dotenv\Dotenv(BASE_PATH);
$dotEnv->load();
