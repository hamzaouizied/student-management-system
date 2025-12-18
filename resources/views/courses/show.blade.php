@extends('layouts.dashboard')

@section('dashboard-content')
    <div>
        <div class="bg-white p-8">
            <h3 class="text-2xl font-semibold mb-6">Course Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                <p><strong>Course Ref:</strong> {{ $course->course_ref }}</p>
                <p><strong>Title:</strong> {{ $course->title }}</p>
                <p><strong>Credits:</strong> {{ $course->credits }}</p>
                <p><strong>Instructor:</strong> {{ $course->instructor }}</p>
                <p class="md:col-span-2">
                    <strong>Description:</strong><br>
                    {{ $course->description ?? '-' }}
                </p>
                <p><strong>Created At:</strong> {{ $course->created_at->format('Y-m-d') }}</p>
            </div>

            <div class="mt-6 flex space-x-3">
                <a href="{{ route('courses.index') }}" class="px-5 py-2 rounded bg-gray-300 hover:bg-gray-400">
                    Back
                </a>
                <a href="{{ route('courses.edit', $course) }}"
                    class="px-5 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection