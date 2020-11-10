<?php

/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this method for redirect to route
 */
namespace App\Providers;

class Redirect extends Provider
{
    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * redirect to specific page
     *
     * @param $page
     */
    public static function to($page)
    {
        header("location: $page");
        exit;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * redirect to same page
     */
    public function back()
    {
        $uri = $_SERVER['REQUEST_URI'];
        header("location: $uri");
    }
}