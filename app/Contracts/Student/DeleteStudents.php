<?php

namespace App\Contracts\Student;

use App\Models\Student;

interface DeleteStudents
{
    public function delete(Student $student);
}