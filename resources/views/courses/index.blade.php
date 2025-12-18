@extends('layouts.dashboard')

@section('header', 'Courses')

@section('dashboard-content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-[#ff8000]">
            <i class="fa-solid fa-book"></i>
            Courses ({{ $courses->count() }})
        </h2>
        <a href="{{ route('courses.create') }}"
            class="w-40 text-white bg-[#ff8000] text-center rounded-lg px-5 py-2.5 cursor-pointer">
            Create Course
        </a>
    </div>
    <div class="bg-white">
        <table id="courses-table" class="w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3">ID</th>
                    <th class="p-3">Reference</th>
                    <th class="p-3">Title</th>
                    <th class="p-3">Credits</th>
                    <th class="p-3">Instructor</th>
                    <th class="p-3">Created</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($courses as $course)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $course->id }}</td>
                        <td class="p-3">{{ $course->course_ref }}</td>
                        <td class="p-3">{{ $course->title }}</td>
                        <td class="p-3">{{ $course->credits }}</td>
                        <td class="p-3">{{ $course->instructor }}</td>
                        <td class="p-3">{{ $course->created_at->format('Y-m-d') }}</td>
                        <td class="p-3 space-x-2">
                            <a href="{{ route('courses.show', $course) }}" class="text-blue-600 hover:underline">
                                Show
                            </a>
                            <a href="{{ route('courses.edit', $course) }}" class="text-blue-600 hover:underline">Edit</a>
                            <a href="#" class="text-red-600 hover:underline delete-course"
                                data-id="{{ $course->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#courses-table').DataTable({
                pageLength: 19,
                lengthChange: true,
                ordering: false,
                responsive: true,
                language: {
                    search: "Search:",
                    paginate: {
                        previous: "Prev",
                        next: "Next"
                    }
                }
            });

            $('.delete-course').on('click', function () {
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