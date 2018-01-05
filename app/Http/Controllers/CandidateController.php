<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Candidate;
use App\Qualification;
use Image;

class CandidateController extends Controller
{
    public function __construct() {
        //
    }
    
    public function all() {
        $select = DB::table('candidates')
                ->leftJoin('qualifications', 'candidates.id', '=', 'qualifications.candidate_id')
                ->select('candidates.*', 'qualifications.*')
                ->where('candidates.status', '=', 1)
                ->get();
        
        return view('admission.all', compact('select'));
    }
    
    public function admission_form() {
        $select_subject = DB::table('subjects')
                              ->where('status', 1)
                              ->get();
        return view('admission.form', compact('select_subject'));
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
            
            $image_path = public_path('asset/dist/uploads/').$image_name;
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
    
    public function insert(Request $request) {
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
    
    public function add_marks(Request $request) {
        $update = Qualification::where('candidate_id', '=', $request->id)
                                ->update([
                                    'marks' => $request->marks,
                                ]);
        if($update) {
            return redirect('admission/candidates');
        }
    }
}
