<?php
/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class for connection to database
 */
namespace App\Providers;

use Illuminate\Database\Capsule\Manager as DB;
require_once __DIR__ . '/../../config.php';

/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this method for config to env file for connection database
 * Class Connection
 * @package App\Providers
 */
class Connection extends Provider
{
//    public function __construct()
//    {
//        $db = new DB();
//
//        $db->addConnection([
//            'driver' => getenv('DB_DRIVER'),
//            'host' => getenv('DB_HOST'),
//            'database' => getenv('DB_NAME'),
//            'username' => getenv('DB_USERNAME'),
//            'password' => getenv('DB_PASSWORD'),
//            'charset' => 'utf8',
//            'collation' => 'utf8_unicode_ci',
//            'prefix' => '',
//        ]);
//
//        $db->setAsGlobal();
//        $db->bootEloquent();
//    }

    public static function make($config)
    {
        try {
            return new \PDO(
                $config['connection'] . 'dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}