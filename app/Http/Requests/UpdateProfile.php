<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Education;

class UpdateProfile extends FormRequest
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
            'nid'          => 'nullable|min:5|max:50',
            'coursen'      => 'nullable|min:2|max:150',
            'cfrom'        => 'nullable|min:2|max:150',
            'cresult'      => 'nullable|min:2|max:20',
            'pyear'        => 'nullable|min:2|max:10',
            'gender'       => 'required|max:20',
            'password'     => 'nullable|min:6|max:150',
            'cpassword'    => 'same:password',
        ];
    }
    
    public function message()
    {
        return [
            'cpassword.same'     => 'Password does not match',
        ];
    }
    
    public function ischange()
    {
        $user = User::where('id', $this->get('id'))
                      ->first();
        if (
            $user->name != $this->get('name') ||
            $user->email != $this->get('email') ||
            $user->phone != $this->get('phone') ||
            $user->nid != $this->get('nid') ||
            $user->caddress != $this->get('caddress') ||
            $user->paddress != $this->get('paddress') ||
            $user->experience != $this->get('experience') ||
            $user->gender != $this->get('gender') ||
            $user->religion != $this->get('religion') ||
            $user->nationality != $this->get('nationality')
        ) {
            return TRUE;
        }else {
            return FALSE;
        }
    }
    private function checki() {
        if(
        $this->get('courset') != null ||
        $this->get('coursen') != null ||
        $this->get('cfrom') != null ||
        $this->get('cresult') != null ||
        $this->get('pyear') != null) {
                return true;
        }else {
                return false;
        }
    }
    
    private function checku($education) {
        if(
        $education->course_type != $this->get('courset') ||
        $education->course_name != $this->get('coursen') ||
        $education->institute != $this->get('cfrom') ||
        $education->result != $this->get('cresult') ||
        $education->passing_year != $this->get('pyear')) {
            return true;
        }else {
            return false;
        }
    }
    public function change_edu() {
        $education = Education::where('user_id', $this->get('id'))
                      ->first();
        if(!is_object($education)) {
            return $this->checki();
        }else {
            return $this->checku($education);
        }
    }
}
