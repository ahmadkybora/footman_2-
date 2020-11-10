<?php
/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class is middleware
 */

namespace App\Providers;

class Middleware extends Provider
{
    public static function middleware($role)
    {
        $message='';
        switch ($role)
        {
            case 'admin' :
                $message = 'you are not authorized to view admin panel';
                break;

            case 'user' :
                $message = 'you are not authorized to view this page';
                break;
        }
    }
}