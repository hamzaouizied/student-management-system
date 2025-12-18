<?php

namespace App\Contracts\User;

use Illuminate\Http\RedirectResponse;

interface LogoutUsers
{
    public function logout(): RedirectResponse;
}
