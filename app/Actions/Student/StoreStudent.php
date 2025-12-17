<?php

namespace App\Actions\Student;

use App\Contracts\Student\StoreStudents;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Student\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;

class StoreStudent implements StoreStudents
{
    public function Store(StudentRequest $request): JsonResponse
    {

        $credentials = $request->validated();

        $student = Student::create($credentials);

        if ($request->has('courses')) {
            $student->courses()->attach($request->input('courses'), [
                'enrolled_at' => now()
            ]);
        }

        $student->load('courses');

        return response()->json([
            'message' => 'Student created successfully',
            'data' => new StudentResource($student),
        ], 201);
    }
}