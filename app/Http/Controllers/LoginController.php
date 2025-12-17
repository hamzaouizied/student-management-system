<?php

namespace App\Http\Controllers;

use App\Contracts\User\LoginUsers;
use App\Http\Requests\User\UserLoginRequest;

class LoginController extends Controller
{
    protected $loginUser;

    public function __construct(LoginUsers $loginUser)
    {
        $this->loginUser = $loginUser;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        $this->loginUser->login($request);
    }

}
