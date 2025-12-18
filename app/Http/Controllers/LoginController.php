<?php

namespace App\Http\Controllers;

use App\Contracts\User\LoginUsers;
use App\Contracts\User\LogoutUsers;
use App\Http\Requests\User\UserLoginRequest;

class LoginController extends Controller
{
    protected $loginUser;
    protected $logoutUser;

    public function __construct(LoginUsers $loginUser, LogoutUsers $logoutUser)
    {
        $this->loginUser = $loginUser;
        $this->logoutUser = $logoutUser;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(UserLoginRequest $request)
    {
        return $this->loginUser->login($request);
    }

    public function logout()
    {
        return $this->logoutUser->logout();
    }

}
