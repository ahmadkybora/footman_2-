<?php
namespace App\Controllers;

use App\Models\User;

class HomeController
{
    public function index()
    {
        $users = User::all();
        return var_dump($users);
        return view('index', compact('users'));
    }
}
