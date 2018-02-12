<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Candidate;
use App\Qualification;
use Image;
use App\Http\Requests\AFormRequest;
use App\Admission;

class AdmissionController extends Controller
{
    public function __construct() {
        //
    }
    public function index() {
        $select = DB::table('admissions')
                   ->where('status', '=', 1)
                   ->get();
        return view('admin.admission.all', compact('select'));
    }
    
    public function view($id) {
        $select = Admission::findOrFail($id);
        return view('admin.admission.view', compact('select'));
    }
    
    public function edit($id) {
        $select = Admission::findOrFail($id);
        return view('admin.admission.edit', compact('select'));
    }
    
    public function update(Request $request) {
        $id = $request->id;
        $update = Admission::where('admission_id', '=', $id)
                  ->update([
                      'session_year' => $request->session_year,
                      'session_name' => $request->session_name,
                      'start_date' => $request->start_date,
                      'end_date' => $request->end_date,
                  ]);
        if($update) {
            return redirect('admission/edit/'.$id)->with('success-update', 'successful');
        }else {
             return redirect('admission/edit/'.$id)->with('nu-error', 'nothing to update');
        }
    }
    
    public function soft_delete($id) {
        $soft_delete = Admission::where('admission_id', '=', $id)
                        ->update([
                            'status' => 0
                        ]);
        if($soft_delete) {
            return redirect('admissions')->with('success-delete', 'successful');
        }
    }
    
    public function insert(Request $request) {
        $validate = $request->validate([
            'session_year' => 'required',
            'session_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $insert = Admission::insert([
            'session_year' => $request->session_year,
            'session_name' => $request->session_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        if($insert) {
            return redirect('admissions')->with('success-add', 'succesful add');
        }
    }
    

    
    public function admission_form() {
        $select_subject = DB::table('subjects')
                              ->where('status', 1)
                              ->get();
        return view('admin.admission.form', compact('select_subject'));
    }
    
    private function insert_field($request) {
        return  [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'gname' => $request->gname,
                    'gphone' => $request->gphone,
                    'nid' => $request->nid,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'bdate' => $request->bdate,
                    'subject_first' => $request->subject_first,
                    'subject_second' => $request->subject_second,
                    'subject_third' => $request->subject_third,
                    'caddress' => $request->caddress,
                    'paddress' => $request->paddress,
                    'nationality' => $request->nationality,
                    'religion' => $request->religion,
                ];
    }
    
    private function q_field($request, $id) {
        return  [
                    'candidate_id' => $id,
                    'course_type' => $request->courset,
                    'institute' => $request->cfrom,
                    'result' => $request->cresult,
                    'passing_year' => $request->pyear,
                ];
    }
    
    private function save_image($request, $id, $field_name, $column_name)
    {
        if($request->hasFile("{$field_name}") && $id > 0) {
            
            $image = $request->file("{$field_name}");
            $image_name = 'candidate-'.$field_name.$id.'-'.time().
                          '.'.$image->getClientOriginalExtension();
            
            $image_path = public_path('asset/dist/uploads/candidates/').$image_name;
            $image_obj = Image::make($image);
            $saveImage = $image_obj->resize(null, 120, function($constraint) {
                $constraint->aspectRatio();
            })->save($image_path);
            if($saveImage) {
                    $add_img_url = Candidate::where('id', '=', $id)
                                       ->update([
                                           "{$column_name}" => $image_name,
                                       ]);
                    return $add_img_url;
            }
        }
    }
    
    public function c_insert(AFormRequest $request) {
        $insert = Candidate::insertGetId(
                    $this->insert_field($request)
                  );
        
        $insert_q = Qualification::insert(
                     $this->q_field($request, $insert)
                  );
        $save_image = $this->save_image($request, $insert, 'image', 'image');
        $save_signature = $this->save_image($request, $insert, 'signature', 'simage');
        
        if(($insert > 0) && $insert_q && $save_image && $save_signature) {
            return redirect('admission/form')->with('success-add', 'successfully added');
        }
    }
}
