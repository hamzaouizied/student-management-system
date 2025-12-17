<?php

namespace App\Actions\user;

use App\Contracts\Course\StoreCourses;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Course\CourseRequest;

class StoreCourse implements StoreCourses
{
    public function Store(CourseRequest $request)
    {
        $student = Student::create($request->only([
            'first_name',
            'last_name',
            'email',
            'date_of_birth',
            'phone',
            'address'
        ]));

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