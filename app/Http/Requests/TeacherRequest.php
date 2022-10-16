<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'teacher_name' => 'required',
            'father_name' => 'required',
            'phone' => 'required|integer|max:11',
            'address' => 'required',
            'salary' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'teacher_name.required' => 'Employe Name is required!',
            'father_name.required' => 'Father name is required!',
            'address.required' => 'Address is required!',
            'phone.integer' => 'Phone number must be integer!',
            'salary.integer' => 'salary number must be integer!',
            'salary.integer' => 'salary must be integer!',
        ];
    }
}
