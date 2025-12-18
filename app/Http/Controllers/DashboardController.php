<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {

        return view('layouts.dashboard', [
            'studentsCount' => Student::count(),
            'coursesCount' => Course::count(),
            'latestStudents' => Student::latest()->take(6)->get(),
            'latestCourses' => Course::withCount('students')->latest()->take(6)->get(),
        ]);
    }
}
