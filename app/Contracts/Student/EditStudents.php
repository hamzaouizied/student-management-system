<?php

namespace App\Contracts\User;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Student\StudentRequest;

interface EditStudents
{
    public function login(StudentRequest $studentRequest): RedirectResponse;
}