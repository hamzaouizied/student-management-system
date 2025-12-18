<?php

namespace App\Contracts\Course;

use App\Http\Requests\Course\CourseRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Course;

interface EditCourses
{
    public function edit(CourseRequest $request, Course $course): JsonResponse;
}