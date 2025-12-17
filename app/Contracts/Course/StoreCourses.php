<?php

namespace App\Contracts\Course;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Course\CourseRequest;

interface StoreCourses
{
    public function Store(CourseRequest $courseRequest): RedirectResponse;
}