@extends('layouts.dashboard')

@section('header', 'Manage Students')

@section('dashboard-content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-[#ff8000]">
            <i class="fa-duotone fa-solid fa-users"></i>
            Students ({{ $students->count() }})
        </h2>
        <a href="{{ route('students.create') }}"
            class="w-40 text-white bg-[#ff8000] text-center rounded-lg px-5 py-2.5 cursor-pointer">
            Create Student
        </a>
    </div>
    <div class="bg-white">
        <table id="students-table" class="w-full text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3">ID</th>
                    <th class="p-3">Full Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Courses</th>
                    <th class="p-3">Created</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr id="student-{{ $student->id }}" class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $student->id }}</td>
                        <td class="p-3 font-semibold">{{ $student->full_name }}</td>
                        <td class="p-3">{{ $student->email }}</td>
                        <td class="p-3">
                            @foreach ($student->courses as $course)
                                <span class="inline-block bg-gray-200 rounded px-2 py-1 text-xs mr-1">
                                    {{ $course->title }}
                                </span>
                            @endforeach
                        </td>
                        <td class="p-3">{{ $student->created_at->format('Y-m-d') }}</td>
                        <td class="p-3 space-x-2">
                            <a href="{{ route('students.show', $student) }}" class="text-blue-600 hover:underline">
                                Show
                            </a>
                            <a href="{{ route('students.edit', $student) }}"
                                class="text-blue-600 hover:underline edit-student">Edit</a>
                            <a href="#" class="text-red-600 hover:underline delete-student"
                                data-id="{{ $student->id }}">Delete</a>
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

            $('.delete-student').on('click', function (e) {
                e.preventDefault();
                let studentId = $(this).data('id');

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
                            url: `/students/${studentId}`,
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                $('#student-' + studentId).remove();

                                Swal.fire(
                                    'Deleted!',
                                    'Student has been deleted.',
                                    'success'
                                );
                            },
                            error: function (xhr) {
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