<?php
/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class for session
 */

namespace App\Providers;

class Session extends Provider
{
    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * create the session
     *
     * @param $name
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    public static function add($name, $value)
    {
        if($name != '' and !empty($name) and $value != '' and !empty($value))
            return $_SESSION[$name] = $value;

        throw new \Exception('Name and Value is required');
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * get value from session
     *
     * @param $name
     * @return mixed
     */
    public static function get($name)
    {
        return $_SESSION[$name];
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * check is session exists
     *
     * @param $name
     * @return bool
     * @throws \Exception
     */
    public static function has($name)
    {
        if($name != '' and !empty($name))
            return (isset($_SESSION[$name])) ? true : false;

        throw new \Exception('name is required');
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * remove the session
     *
     * @param $name
     * @throws \Exception
     */
    public static function remove($name)
    {
        if(self::has($name))
            unset($_SESSION[$name]);
    }
}