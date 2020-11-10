<?php
namespace App\Providers;

class App extends Provider
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        return static::$registry[$key];
    }
}
