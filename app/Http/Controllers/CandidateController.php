<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Candidate;
use App\Qualification;
use App\Student;

class CandidateController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function all() {
        $select = DB::table('candidates')
                ->leftJoin('qualifications', 'candidates.id', '=', 'qualifications.candidate_id')
                ->select('candidates.*', 'qualifications.*')
                ->where('candidates.status', '=', 1)
                ->get();
        
        return view('admission.all', compact('select'));
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
    
    public function select($id) {
        $select = Candidate::findOrFail($id);
        
        $select_subject = DB::table('subjects')
                              ->where('status', 1)
                              ->get();
        
        return view('admin.student.select', compact(['select', 'select_subject']));
    }
    
    
    private function add_field($request, $select) {
        return  [
                    'name' => $select->name,
                    'phone' => $select->phone,
                    'gname' => $select->gname,
                    'gphone' => $select->gphone,
                    'nid' => $select->nid,
                    'email' => $select->email,
                    'gender' => $select->gender,
                    'bdate' => $select->bdate,
                    'caddress' => $select->caddress,
                    'paddress' => $select->paddress,
                    'nationality' => $select->nationality,
                    'religion' => $select->religion,
                    'image' => str_replace('candidate', 'student', $select->image),
                    'simage' => str_replace('candidate', 'student', $select->simage),
                    'session' => $request->session,
                    'session_name' => $request->session_name,
                    'subject' => $request->subject,
                    'adate' => $request->adate,
                ];
    }
    private function move_img($select, $image) {
        return rename(
                    public_path('asset/dist/uploads/candidates/').$select->$image,
                    public_path('asset/dist/uploads/students/').
                    str_replace('candidate', 'student', $select->$image)
               );
    }
    public function add(Request $request) {
        $id = $request->id;
        $select_candidate = Candidate::findOrFail($id);
        
       $add = Student::insert(
                       $this->add_field($request, $select_candidate)
               );
       
       $move_image = $this->move_img($select_candidate, 'image');
       $move_signature = $this->move_img($select_candidate, 'simage');
       
       if($add && $move_image && $move_signature) {
           $selected = Candidate::where('id', '=', $id)
                                ->update([
                                    'status' => 2,
                                ]);
           if($selected) {
               return redirect('admission/candidates')->with('success-add', 'successful');
           }
       }
    }
    public function omit() {
        
    }
}
