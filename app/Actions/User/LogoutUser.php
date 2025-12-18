<?php

namespace App\Actions\User;

use App\Contracts\User\LogoutUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutUser implements LogoutUsers
{
    public function logout(): RedirectResponse
    {
        Auth::logout();

        // Invalidate and regenerate session to prevent session fixation
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
