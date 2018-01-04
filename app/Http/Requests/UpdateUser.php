<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUser extends FormRequest
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
            'email'        => 'required|email|max:80|unique:users,email,'.$this->get('id'),
            'phone'        => 'nullable|min:5|max:30',
            'designation'  => 'nullable|min:2|max:50',
            'salary_scale' => 'nullable|digits_between:3,10',
            'role'         => 'required|digits_between:1,4',
            'gender'       => 'required|max:20',
            'password'     => 'nullable|min:6|max:150',
            'cpassword'    => 'same:password',
        ];
    }
    
    public function messages()
    {
        return [
            'cpassword.same'     => 'Password does not match',
        ];
    }
    
    public function ischange() {
        $user = User::where('id', $this->get('id'))
                      ->first();
        if (
            $user->name != $this->get('name') ||
            $user->email != $this->get('email') ||
            $user->phone != $this->get('phone') ||
            $user->designation != $this->get('designation') ||
            $user->salary_scale != $this->get('salary_scale') ||
            $user->role_id != $this->get('role') ||
            $user->joining_date != $this->get('joining_date') ||
            $user->gender != $this->get('gender')
        ) {
            return TRUE;
        }else {
            return FALSE;
        }
    }
}
