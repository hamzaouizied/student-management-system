<?php

namespace App\Contracts\User;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\User\UserLoginRequest;

interface LoginUsers
{
    public function login(UserLoginRequest $userLoginRequest): RedirectResponse;
}