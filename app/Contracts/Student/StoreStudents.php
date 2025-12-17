<?php

namespace App\Contracts\Student;

use App\Http\Requests\Student\StudentRequest;
use Illuminate\Http\JsonResponse;

interface StoreStudents
{
    public function store(StudentRequest $studentRequest): JsonResponse;
}