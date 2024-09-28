<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'country_code' => 'required|string',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'notes' => 'nullable|string',
        ];
    }
}
