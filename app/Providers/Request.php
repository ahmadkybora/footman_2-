<?php
/**
 * this class for request
 */

namespace App\Providers;

class Request extends Provider
{
    /**
     * this method can get all request
     *
     * @param bool $is_array
     * @return mixed
     */
    public static function all($is_array = false)
    {
        $result = [];

        if(count($_GET) > 0)
            $result['GET'] = $_GET;

        if(count($_POST) > 0)
            $result['POST'] = $_POST;

        $result['FILE'] =$_FILES;

        return json_decode(json_encode($result), $is_array);
    }

    /**
     * in method baraye gereftan tak tak request ast
     * hanoz kamel nashode
     * niaz be gereftan data be sorat anjomani darad
     * motasefane be sakhti ta hodoi dorost pish rafte :)
     *
     * @param bool $is_array
     * @return mixed
     */
    public static function input($d = [], $is_array = false)
    {
        $results = [];
        $data = [];

        if (count($_GET) > 0) {
            $results['GET'] = $_GET;
            foreach($results['GET'] as $index => $result) {
                $data[] =$results['GET'][$index];
            }
        }

        if (count($_POST) > 0) {
            $results['POST'] = $_POST;
            foreach ($results['POST'] as $index => $result) {
                $data[] = $results['POST'][$index];
            }
        }

        if (count($_FILES) > 0) {
            $results['FILES'] = $_FILES;
            foreach ($results['FILES'] as $index => $result) {
                $data[] = $results['FILES'][$index];
            }
        }

        return json_decode(json_encode($data[$d]), $is_array);
    }

//    public static function input($is_array = true)
//    {
//        $result = [];
//        switch ($is_array) {
//            case $_GET:
//                if (count($_GET) > 0)
//                    $result['GET'] = $_GET;
//                break;
//
//            case $_POST:
//                if (count($_POST) > 0)
//                    $result['POST'] = $_POST;
//                break;
//
//            case $_FILES:
//                if (count($_FILES) > 0)
//                    $result['FILES'] = $_GET;
//                break;
//        }
//
//        return json_decode(json_encode($result), $is_array);
//    }

    /**
     * get specific request type
     *
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        $data = self::all();
        return $data->$key;
    }

    /**
     * check request availability
     *
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        $object = new static;
        return (array_key_exists($key, $object->all(true))) ? true : false;
    }

    /**
     * get request data
     *
     * @param $key
     * @param $value
     * @return string
     */
    public static function old($key, $value)
    {
        $data = self::all();
        return isset($data->$key->$value) ? $data->$key->$value : '';
    }

    /**
     * this method for refresh request
     */
    public static function refresh()
    {
        $_GET = [];
        $_POST = [];
        $_FILES = [];
    }
}