@extends('layouts.main')

@section('header', 'Course Details')

@section(section: 'main-content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    {{ $course->title }}
                </h2>
                <p class="text-gray-500 mt-1">
                    Created at: {{ $course->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

            <div class="mt-4 md:mt-0 flex space-x-2">
                <a href="{{ route('courses.edit', $course) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Edit
                </a>

                <button id="delete-course" data-id="{{ $course->id }}"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Delete
                </button>

                <a href="{{ route('courses.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Back
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="space-y-2">
                <p class="text-gray-700">
                    <span class="font-semibold">Course Ref:</span>
                    {{ $course->course_ref }}
                </p>
                <p class="text-gray-700">
                    <span class="font-semibold">Credits:</span>
                    {{ $course->credits }}
                </p>
                <p class="text-gray-700">
                    <span class="font-semibold">Instructor:</span>
                    {{ $course->instructor }}
                </p>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Description</h3>
            <p class="text-gray-600">
                {{ $course->description ?? 'No description provided.' }}
            </p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#delete-course').on('click', function () {
                let courseId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/courses/${courseId}`,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function () {
                                Swal.fire(
                                    'Deleted!',
                                    'Course has been deleted.',
                                    'success'
                                ).then(() => {
                                    window.location.href = "{{ route('courses.index') }}";
                                });
                            },
                            error: function () {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush