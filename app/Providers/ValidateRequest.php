<?php

/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class for request validation
 */
namespace App\Providers;

use Illuminate\Database\Capsule\Manager as DB;

class ValidateRequest extends Provider
{
    private static $error = [];
    private static $error_messages = [
        'string' => 'The :attribute field cannot contain numbers',
        'required' => 'The :attribute field is required',
        'minLength' => 'The :attribute field must be a minimum of :policy characters',
        'maxLength' => 'The :attribute filed must be a maximum of :policy characters',
        'mixed' => 'The :attribute filed can contain letters, numbers, dash and space only',
        'numeric' => 'The :attribute filed cannot contain letters e.g 20.0, 20',
        'email' => 'Email address is invalid',
        'unique' => 'The :attribute is already taken, please try another one',
    ];

    /**
     * set specific error
     *
     * @param $error
     * @param null $key
     */
    private static function setError($error, $key = null)
    {
        if($key)
            self::$error[$key][] = $error;

        self::$error[] = $error;
    }

    public function abide()
    {
        
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 11/01/2020 09:52 PM by ahmad montazeri
     * Modified At:.
     *
     * perform validation for the data provider and set error messages
     *
     * @param array $data
     */
    private static function doValidation(array $data)
    {
        $column = $data['column'];
        foreach($data['rules'] as $index => $rule)
        {
            $valid = call_user_func_array([self::class, $index], [$column, $data['value'], $rule]);
            if(!$valid)
            {
                self::setError(
                    str_replace(
                        [':attribute', ':rule', '_'],
                        [$column, $rule, ' '],
                        self::$error_messages[$index]), $column
                    );
            }
        }
    }
    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:00 PM by ahmad montazeri
     * Modified At:.
     * 
     * return true if there is validation error
     * 
     * @return bool
     */
    public static function hasError()
    {
        return count(self::$error) > 0 ? true : false;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:00 PM by ahmad montazeri
     * Modified At:.
     * 
     * return all validation errors
     *
     * @return array
     */
    public function getErrorMessage()
    {
        return self::$error;
    }

    //
    // this methods for validation request
    //

    public static function exists($column, $value, $rule)
    {
        //
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:11 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for validation unique
     *
     * @param $column
     * @param $value
     * @param $rule
     * @return bool
     */
    public function unique($column, $value, $rule)
    {
        if($value != null and !empty(trim($value)))
            return !DB::table($rule)->where($column, $value)->exists();
        return true;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:11 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for required validation
     * @param $column
     * @param $value
     * @param $rule
     * @return bool
     */
    public static function required($column, $value, $rule)
    {
        return $value != null and !empty(trim($value));
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:11 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for validation minLength
     *
     * @param $column
     * @param $value
     * @param $rule
     * @return bool
     */
    public static function minLength($column, $value, $rule)
    {
        if($value != null and !empty(trim($value)))
            return strlen($value) >= $rule;
        return true;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:14 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for validation maxLength
     * @param $column
     * @param $value
     * @param $rule
     * @return bool
     */
    public static function maxLength($column, $value, $rule)
    {
        if($value != null and !empty(trim($value)))
            return strlen($value) <= $rule;
        return true;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:11 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for validation email
     *
     * @param $column
     * @param $value
     * @param $rule
     * @return bool|mixed
     */
    public static function email($column, $value, $rule)
    {
        if($value != null and !empty(trim($value)))
            return filter_var($value,FILTER_VALIDATE_EMAIL);
        return true;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:10 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for validation all
     *
     * @param $column
     * @param $value
     * @param $rule
     * @return bool
     */
    public static function mixed($column, $value, $rule)
    {
        if($value != null and !empty(trim($value)))
        {
            if(!preg_match("/^[A-Za-z0-9 .,_~-!@#&%^'*(\)]+$/", $value))
                return false;
        }

        return true;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:00 PM by ahmad montazeri
     * Modified At:.
     * 
     * this method for validation string
     * 
     * @param $column
     * @param $value
     * @param $rule
     * @return bool
     */
    public function string($column, $value, $rule)
    {
        if($value != null and !empty(trim($value)))
        {
            if(!preg_match("/^[A-Za-z ]+$/", $value))
                return false;
        }

        return true;
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 09:00 PM by ahmad montazeri
     * Modified At:.
     * 
     * this method for numeric validation
     * 
     * @param $column
     * @param $value
     * @param $rule
     * @return bool
     */
    public static function numeric($column, $value, $rule)
    {
        if($value != null and !empty(trim($value)))
        {
            if(!preg_match("/^[0-9.]+$/", $value))
                return false;
        }

        return true;
    }
}