<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Contracts\Student\StoreStudents;
use App\Http\Requests\Student\StudentRequest;

class StudentController extends Controller
{
    protected StoreStudents $storeStudent;

    public function __construct(StoreStudents $storeStudent)
    {
        $this->storeStudent = $storeStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('courses')->get();
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
        $data = $request->validated();

        $student->update($data);

        if ($request->has('courses')) {
            $coursesWithPivot = collect($request->courses)
                ->mapWithKeys(fn($courseId) => [$courseId => ['enrolled_at' => now()]])
                ->toArray();

            $student->courses()->sync($coursesWithPivot);
        } else {
            $student->courses()->detach();
        }

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->courses()->detach();
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully');
    }
}
