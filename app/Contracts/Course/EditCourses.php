<?php

namespace App\Contracts\User;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Course\CourseRequest;

interface EditCourses
{
    public function login(CourseRequest $courseRequest): RedirectResponse;
}