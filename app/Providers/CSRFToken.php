<?php
/**
 * Algorithm: ahmad montazeri.
 * Development: ahmad montazeri.
 * Created At: 10/31/2020 15:00 PM by ahmad montazeri
 * Modified At:.
 *
 * this class for make CSRFToken
 */

namespace App\Providers;

class CSRFToken extends Provider
{
    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for generate Token
     * 
     * @return mixed
     * @throws \Exception
     */
    public static function generateToken()
    {
        if (!Session::has('token'))
        {
            $random_token = base64_decode(openssl_random_pseudo_bytes(32));
            Session::add('token', $random_token);
        }

        return Session::get('token');
    }

    /**
     * Algorithm: ahmad montazeri.
     * Development: ahmad montazeri.
     * Created At: 10/31/2020 15:00 PM by ahmad montazeri
     * Modified At:.
     *
     * this method for verify CSRFToken
     *
     * @param $requestToken
     * @return bool
     * @throws \Exception
     */
    public static function verifyCSRFToken($requestToken)
    {
        if(Session::has('token') and Session::get('token') === $requestToken)
            return true;
        return false;
    }
}