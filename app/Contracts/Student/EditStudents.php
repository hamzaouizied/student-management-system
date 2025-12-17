<?php

namespace App\Contracts\Student;

use App\Http\Requests\Student\StudentRequest;
use App\Models\Student;

interface EditStudents
{
    public function edit(StudentRequest $studentRequest, Student $student);
}