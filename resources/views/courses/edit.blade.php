@extends('layouts.dashboard')

@section('dashboard-content')
    <div>
        <div class="bg-white p-8">
            <h3 class="text-2xl font-semibold mb-6">Edit Course</h3>

            <div id="form-errors" class="hidden mb-4 bg-red-100 text-red-700 p-3 rounded"></div>

            <form id="course-form">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1">Course Reference <span class="text-red-500">*</span></label>
                        <input type="text" name="course_ref" value="{{ $course->course_ref }}"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ $course->title }}"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Credits <span class="text-red-500">*</span></label>
                        <input type="number" name="credits" value="{{ $course->credits }}"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block mb-1">Instructor <span class="text-red-500">*</span></label>
                        <input type="text" name="instructor" value="{{ $course->instructor }}"
                            class="w-full border px-3 py-2 rounded">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block mb-1">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full border px-3 py-2 rounded">{{ $course->description }}</textarea>
                </div>

                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('courses.index') }}" class="px-5 py-2 rounded bg-gray-300 hover:bg-gray-400">
                        Cancel
                    </a>
                    <button type="submit" class="px-5 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {

            $('#course-form').on('submit', function (e) {
                e.preventDefault();

                $('#form-errors').addClass('hidden').html('');

                $.ajax({
                    url: "{{ route('courses.update', $course->id) }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function () {
                        Swal.fire({
                            title: "Updated!",
                            text: "Course updated successfully!",
                            icon: "success"
                        }).then(() => {
                            window.location.href = "{{ route('courses.index') }}";
                        });
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorHtml = '<ul>';

                            $.each(errors, function (key, value) {
                                errorHtml += `<li>${value[0]}</li>`;
                            });

                            errorHtml += '</ul>';
                            $('#form-errors').removeClass('hidden').html(errorHtml);
                        } else {
                            Swal.fire("Error!", "Something went wrong.", "error");
                        }
                    }
                });
            });

        });
    </script>
@endpush