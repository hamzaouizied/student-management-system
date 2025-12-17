<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;

class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::factory()->count(20)->create();

        $students = Student::factory()->count(50)->create();

        foreach ($students as $student) {
            $student->courses()->attach(
                $courses->random(rand(1, 3))->pluck('id')->toArray(),
                ['enrolled_at' => now()]
            );
        }
    }
}
