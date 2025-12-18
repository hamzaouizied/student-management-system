<?php

namespace App\Actions\Course;

use App\Contracts\Course\EditCourses;
use App\Http\Requests\Course\CourseRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Course;
use App\Http\Resources\CourseResource;

class EditCourse implements EditCourses
{
    public function edit(CourseRequest $request, Course $course): JsonResponse
    {
        $course->update($request->validated());

        return response()->json([
            'message' => 'Course updated successfully',
            'data' => new CourseResource($course),
        ]);
    }
}