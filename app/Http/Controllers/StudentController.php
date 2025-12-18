<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Contracts\Student\StoreStudents;
use App\Contracts\Student\DeleteStudents;
use App\Contracts\Student\EditStudents;
use App\Http\Requests\Student\StudentRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class StudentController extends Controller implements HasMiddleware
{
    protected StoreStudents $storeStudent;
    protected DeleteStudents $deleteStudent;
    protected EditStudents $editStudent;

    public function __construct(StoreStudents $storeStudent, DeleteStudents $deleteStudent, EditStudents $editStudent)
    {
        $this->storeStudent = $storeStudent;
        $this->deleteStudent = $deleteStudent;
        $this->editStudent = $editStudent;
    }

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view students', only: ['index', 'show']),
            new Middleware('permission:create students', only: ['create', 'store']),
            new Middleware('permission:edit students', only: ['edit', 'update']),
            new Middleware('permission:delete students', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('courses')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        return $this->storeStudent->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        $student->load('courses');

        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        return $this->editStudent->edit($request, $student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        return $this->deleteStudent->delete($student);
    }
}
