<?php

/**
 *
 */
namespace App\Controllers\Panel\User;

use App\Controllers\Controller;
use App\Models\User;
use App\Providers\CSRFToken;
use App\Providers\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = new UserRepository($user);
        if(Request::has('POST')) {
            $request = Request::get('POST');
            CSRFToken::verifyCSRFToken($request->token);
        }
    }

    public function index()
    {
//        $users = $this->user->all();
        $users = User::all();
        return view('front/users/index', compact('users'));
    }

    public function create()
    {
        return view('front/users/create');
    }

    public function store()
    {
        if(Request::has('POST')) {
            $request = Request::get('POST');
                dd($request->token);
                User::create([
                    'username' => Request::input('0'),
                    'first_name' => Request::input('1'),
                    'last_name' => Request::input('2'),
                ]);
            }
        return redirectTo('/panel/dashboard/users');
    }

    public function show()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}