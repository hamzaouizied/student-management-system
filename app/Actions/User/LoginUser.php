<?php

namespace App\Actions\user;

use App\Contracts\User\LoginUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UserLoginRequest;

class LoginUser implements LoginUsers
{
    public function login(UserLoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()
            ->with('error', 'Invalid credentials. Please try again.')
            ->withInput();
    }
}