<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Student;

class UStudentRequest extends FormRequest
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
            'phone'        => 'nullable|string|min:5|max:30',
            'email'        => 'nullable|string|email|max:80|unique:students,email,'.$this->get('id'),
            'gname'        => 'required|string|min:4|max:50',
            'gphone'       => 'required|string|min:4|max:30',
            'nid'          => 'nullable|string|min:5|max:150|unique:students,nid,'.$this->get('id'),
            'caddress'     => 'required|string|min:4',
            'paddress'     => 'required|string|min:4',
            'religion' => 'nullable|string|min:3|max:30',
            'nationality' => 'nullable|string|min:3|max:30',
            'bdate'        => 'required|string|min:4|max:50',
            'gender'       => 'required|string|min:4|max:20',
            'subject' => 'required',
        ];
    }

    public function messages() {
        return [
            'gname.required' => 'Guardian name is required.',
            'gphone.required' => 'Guardian phone number is required.',
            'bdate.required' => 'Birth date is required.',
            'caddress.required' => 'Current address is required.',
            'paddress.required' => 'Permanent address is required.',
        ];
    }
}
