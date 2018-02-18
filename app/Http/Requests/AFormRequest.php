<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AFormRequest extends FormRequest
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
            'email'        => 'nullable|string|email|unique:candidates,email|max:80',
            'nid'          => 'nullable|string|min:5|max:150|unique:candidates,nid',
            'courset'      => 'required|string|min:2|max:80',
            'cfrom'        => 'required|string|min:5|max:150',
            'cresult'      => 'required|string|min:3|max:20',
            'pyear'        => 'required|string|min:2|max:10',
            'caddress'     => 'required|string|min:4',
            'paddress'     => 'required|string|min:4',
            'gname'        => 'required|string|min:4|max:50',
            'gphone'       => 'required|string|min:4|max:30',
            'bdate'        => 'required|string|min:4|max:50',
            'gender'       => 'required|string|min:4|max:20',
            'subject_first' => 'required',
            'subject_second' => 'required',
            'subject_third' => 'required',
            'religion' => 'nullable|string|min:3|max:30',
            'nationality' => 'nullable|string|min:3|max:30',
            'image' => 'required',
            'signature' => 'required',
        ];
    }
    
    public function messages() {
        return [
            'gname.required' => 'Guardian name is required.',
            'gphone.required' => 'Guardian phone number is required.',
            'bdate.required' => 'Birth date is required.',
            'courset.required' => 'Course type is required.',
            'cfrom.required' => 'School/College/University name is required.',
            'cresult.required' => 'Result is required.',
            'pyear.required' => 'Passing year is required.',
            'caddress.required' => 'Current address is required.',
            'paddress.required' => 'Permanent address is required.',
            'image.required' => 'Please upload your photo',
            'signature.required' => 'Please upload your signature',
        ];
    }
}
