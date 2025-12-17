<?php

namespace App\Actions\Student;

use App\Contracts\Student\EditStudents;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Student\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Support\Arr;

class EditStudent implements EditStudents
{
    public function edit(StudentRequest $request, Student $student): JsonResponse
    {

        $request = $request->validated();

        $student->update($request);

        if (Arr::has($request, 'courses')) {
            $coursesWithPivot = collect($request['courses'])
                ->mapWithKeys(fn($courseId) => [$courseId => ['enrolled_at' => now()]])
                ->toArray();

            $student->courses()->sync($coursesWithPivot);
        } else {
            $student->courses()->detach();
        }

        return response()->json([
            'message' => 'Student created successfully',
            'data' => new StudentResource($student),
        ], 201);
    }
}