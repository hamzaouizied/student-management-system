<?php

namespace App\Contracts\Course;

use App\Models\Course;
use Illuminate\Http\JsonResponse;

interface DeleteCourses
{
    public function delete(Course $Course): JsonResponse;
}