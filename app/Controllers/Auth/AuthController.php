<?php
/**
 * this class for authorization
 */
namespace App\Controllers\Auth;

use App\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * this method for view login
     */
    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function login()
    {

    }

    /**
     * this method for register view
     */
    public function showRegisterForm()
    {
        echo "salam";
        return view('auth/register');
    }

    public function register($a, $b)
    {
        if($a > $b)
         return $c = $a + $b;
    }

    public function logout()
    {
        //
    }
}
