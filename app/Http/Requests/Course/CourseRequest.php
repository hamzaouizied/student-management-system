<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'course_ref' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'credits' => ['required', 'integer', 'min:1'],
            'instructor' => ['required', 'string', 'max:255'],
        ];
    }
}
