<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $studentId = $this->route('student')?->id;

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                $studentId
                ? Rule::unique('students', 'email')->ignore($studentId)
                : 'unique:students,email',
            ],
            'date_of_birth' => ['required', 'nullable', 'date'],
            'phone' => ['required', 'nullable', 'string', 'max:20'],
            'address' => ['required', 'nullable', 'string', 'max:500'],
            'courses' => ['required', 'array', 'min:1'],
            'courses.*' => ['exists:courses,id'],
        ];
    }
}
