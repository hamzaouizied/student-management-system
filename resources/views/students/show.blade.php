@extends('layouts.main')

@section('header', 'Student Details')

@section('main-content')
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">{{ $student->first_name }} {{ $student->last_name }}</h2>
                <p class="text-gray-500 mt-1">Created at: {{ $student->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div class="mt-4 md:mt-0 flex space-x-2">
                <a href="{{ route('students.edit', $student) }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Edit
                </a>

                <button id="delete-student" data-id="{{ $student->id }}"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Delete
                </button>

                <a href="{{ route('students.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Back
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div class="space-y-2">
                <p class="text-gray-700"><span class="font-semibold">Email:</span> {{ $student->email }}</p>
                <p class="text-gray-700"><span class="font-semibold">Phone:</span> {{ $student->phone ?? 'N/A' }}</p>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Courses</h3>
            @if($student->courses->count() > 0)
                <div class="flex flex-wrap gap-2">
                    @foreach($student->courses as $course)
                        <span class="bg-indigo-100 text-indigo-800 text-sm font-medium px-3 py-1 rounded-full">
                            {{ $course->title }}
                        </span>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No courses assigned.</p>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#delete-student').on('click', function () {
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
                                Swal.fire(
                                    'Deleted!',
                                    'Student has been deleted.',
                                    'success'
                                ).then(() => {
                                    window.location.href = "{{ route('students.index') }}";
                                });
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