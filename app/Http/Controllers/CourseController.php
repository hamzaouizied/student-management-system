<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Contracts\Course\StoreCourses;
use App\Contracts\Course\EditCourses;
use App\Contracts\Course\DeleteCourses;
use App\Http\Requests\Course\CourseRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
class CourseController extends Controller implements HasMiddleware
{
    protected StoreCourses $storeCourse;
    protected EditCourses $editCourse;
    protected DeleteCourses $deleteCourse;

    public function __construct(StoreCourses $storeCourse, EditCourses $editCourse, DeleteCourses $deleteCourse)
    {
        $this->storeCourse = $storeCourse;
        $this->editCourse = $editCourse;
        $this->deleteCourse = $deleteCourse;
    }


    public static function middleware(): array
    {
        return [
            new Middleware('permission:view courses', only: ['index', 'show']),
            new Middleware('permission:create courses', only: ['create', 'store']),
            new Middleware('permission:edit courses', only: ['edit', 'update']),
            new Middleware('permission:delete courses', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        return $this->storeCourse->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        return $this->editCourse->edit($request, $course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        return $this->deleteCourse->delete($course);
    }
}
