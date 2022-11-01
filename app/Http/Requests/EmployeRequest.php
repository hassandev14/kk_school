<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
            'employe_name' => 'required',
            'father_name' => 'required',
            'phone' => 'required|integer|max:11',
            'address' => 'required',
            'salary' => 'required|integer',
            'image_name' => 'required|',
        ];
    }
    public function messages()
    {
        return [
            'employe_name.required' => 'Employe Name is required!',
            'father_name.required' => 'Father name is required!',
            'address.required' => 'Address is required!',
            'phone.integer' => 'Phone number must be integer!',
            'salary.integer' => 'salary number must be integer!',
            'salary.integer' => 'salary must be integer!',
        ];
    }
}
