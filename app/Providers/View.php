<?php
/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class for view
 */

namespace App\Providers;

use Philo\Blade\Blade;

class View extends Provider
{
    public static function view($path, array $data = [])
    {
        $view = require_once __DIR__ . '/../../resources/views';
        $catch = require_once __DIR__ . '/../../bootstrap/cache';

        $blade = new Blade($view, $catch);
        echo $blade->view()->make($path, $data)->render();
    }
}