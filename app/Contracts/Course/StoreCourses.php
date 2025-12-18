<?php

namespace App\Contracts\Course;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\Course\CourseRequest;

interface StoreCourses
{
    public function store(CourseRequest $courseRequest): JsonResponse;
}