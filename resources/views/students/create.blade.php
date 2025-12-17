@extends('layouts.dashboard')

@section('dashboard-content')
    <div>
        <div class="bg-white p-8">
            <h3 class="text-2xl font-semibold mb-6">Create Student</h3>

            <div id="form-errors" class="hidden mb-4 bg-red-100 text-red-700 p-3 rounded"></div>

            <form id="student-form">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1">First Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="first_name" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Last Name<span class="text-red-500">*</span></label>
                        <input type="text" name="last_name" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Email<span class="text-red-500">*</span></label>
                        <input type="email" name="email" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Date of Birth<span class="text-red-500">*</span></label>
                        <input type="date" name="date_of_birth" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Phone<span class="text-red-500">*</span></label>
                        <input type="text" name="phone" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Address<span class="text-red-500">*</span></label>
                        <input type="text" name="address" class="w-full border px-3 py-2 rounded">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block mb-1">Courses<span class="text-red-500">*</span></label>
                    <select name="courses[]" multiple class="js-example-basic-multiple w-full border px-3 py-2 rounded">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('students.index') }}" class="px-5 py-2 rounded bg-gray-300 hover:bg-gray-400">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $('.js-example-basic-multiple').select2({
                width: '100%'
            });

            $('#student-form').on('submit', function (e) {
                e.preventDefault();

                $('#form-errors').addClass('hidden').html('');

                $.ajax({
                    url: "{{ route('students.store') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        Swal.fire({
                            title: "Success!",
                            text: "Student created successfully!",
                            icon: "success"
                        });
                        window.location.href = "{{ route('students.index') }}";
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = '<ul>';

                            $.each(errors, function (key, value) {
                                errorHtml += '<li>' + value[0] + '</li>';
                            });

                            errorHtml += '</ul>';

                            $('#form-errors')
                                .removeClass('hidden')
                                .html(errorHtml);
                        }
                    }
                });
            });
        });
    </script>
@endpush