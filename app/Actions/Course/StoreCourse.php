<?php

namespace App\Actions\Course;

use App\Contracts\Course\StoreCourses;
use App\Http\Requests\Course\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class StoreCourse implements StoreCourses
{
    public function store(CourseRequest $request): JsonResponse
    {
        $course = Course::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Course created successfully',
            'course' => new CourseResource($course),
        ], 201);
    }
}
