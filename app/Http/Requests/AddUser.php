<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUser extends FormRequest
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
            'name'         => 'required|string|min:3|max:50',
            'email'        => 'required|email|unique:users,email|max:80',
            'phone'        => 'nullable|min:5|max:30',
            'designation'  => 'nullable|min:2|max:50',
            'salary_scale' => 'nullable|digits_between:3,10',
            'role'         => 'required|digits_between:1,4',
            'gender'       => 'required|max:20',
            'password'     => 'required|min:6|max:150',
            'cpassword'    => 'same:password',
        ];
    }
    
    public function messages() {
        return [
            'cpassword.same'     => 'Password does not match',
        ];
    }
}
