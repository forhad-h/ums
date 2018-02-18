<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Admission;
use Image;
use App\Qualification;
use App\Candidate;
use App\QuestionPaper;
use App\Http\Requests\AFormRequest;

class PublicController extends Controller
{
    public function admission_form() {
        $select_subject = DB::table('subjects')
                              ->where('status', 1)
                              ->get();
        return view('admin.admission.form', compact('select_subject'));
    }
    
    private function insert_field($request) {
        $adm_info = Admission::orderBy('admission_id', 'DESC')->first();
        return  [
                    'name' => $request->name,
                    'session_year' => $adm_info->session_year,
                    'session_name' => $adm_info->session_name,
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
    
    public function QuestinPaper($id) {
        $select = DB::table('question_papers')
                   ->where('exam_id', '=', $id)
                   ->get();
        return view('admin.admission.QuestionPaper', compact(['select', 'id']));
    }
    
    public function ans_insert(Request $request, $id) {
        $total_quest = QuestionPaper::where('exam_id', '=', $id)->get();
        
        foreach($total_quest as $data) {
            if($data->quest_status == 2) {
                $validate = $request->validate([
                    'qOption'.$data->quest_id => 'required'
                ], [
                    'qOption'.$data->quest_id.'.required' => 'You must answer this question',
                ]);
            }
            $insert = Answer::insert([
                'ans_optional' => $request->input('qOption'.$data->quest_id),
            ]);
        }
        
        if($insert) {
            return redirect('admission/exams/questionPaper/'.$id)->with('success-add', 'succesful add');
        }
    }
}
