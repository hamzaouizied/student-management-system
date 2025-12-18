<?php

namespace App\Actions\Course;

use App\Contracts\Course\DeleteCourses;
use App\Models\Course;
use Illuminate\Http\JsonResponse;

class DeleteCourse implements DeleteCourses
{
    public function delete(Course $course): JsonResponse
    {
        $course->delete();

        return response()->json([
            'message' => 'Course deleted successfully',
        ]);
    }
}