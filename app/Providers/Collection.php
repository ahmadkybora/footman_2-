<?php

/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 10:00 PM by ahmad montazeri
 * Modified At:.
 */
namespace App\Providers;

class Collection extends Provider
{
    public static $success = 200;
    public static $create = 201;
    public static $update = 400;
    public static $unauthorized = 401;
    public static $forbidden = 403;
    public static $notFound = 404;
    public static $unavailableService = 503;
}