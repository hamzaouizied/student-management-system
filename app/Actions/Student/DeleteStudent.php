<?php

namespace App\Actions\Student;

use App\Contracts\Student\DeleteStudents;
use Illuminate\Http\JsonResponse;
use App\Models\Student;

class DeleteStudent implements DeleteStudents
{
    public function delete(Student $student): JsonResponse
    {
        $student->courses()->detach();

        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully',
            'student_id' => $student->id,
        ], 200);
    }
}
