<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exam;
use App\QuestionPaper;
use App\Answer;

class ExamController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $select = DB::table('exams')
                   ->where('status', '=', 1)
                   ->get();
        return view('admin.admission.exam.all', compact('select'));
    }
    
    public function exam_insert(Request $request) {
        $validate = $request->validate([
            'exam_id' => 'required',
            'exam_name' => 'required',
            'exam_duration' => 'required',
            'exam_total_marks' => 'required',
        ], [
            'exam_total_marks.required' => 'Total marks is required'
        ]);
        $insert = Exam::insert([
            'exam_id' => $request->exam_id,
            'exam_name' => $request->exam_name,
            'exam_duration' => $request->exam_duration,
            'exam_total_marks' => $request->exam_total_marks,
        ]);
        if($insert) {
            return redirect('admission/exams')->with('success-add', 'succesful add');
        }
    }
    
    public function all_quest($id) {
        $select = DB::table('question_papers')
                   ->where('exam_id', '=', $id)
                   ->orderBy('quest_id', 'DESC')
                   ->get();
        return view('admin.admission.exam.QuestionPaper', compact(['select', 'id']));
    }
    
    public function quest_insert(Request $request, $id) {
        $validate = $request->validate([
            'question_type' => 'required',
            'question' => 'required|unique:question_papers,question',
        ]);
        $insert = QuestionPaper::insert([
            'exam_id' => $id,
            'question_type' => $request->question_type,
            'question' => $request->question,
            'quest_status' => $request->quest_status != '' ? $request->quest_status : 1,
            'quest_option1' => $request->quest_option1,
            'quest_option2' => $request->quest_option2,
            'quest_option3' => $request->quest_option3,
            'quest_option4' => $request->quest_option4,
        ]);
        if($insert) {
            return redirect('admission/exams/QuestionPaper/'.$id)->with('success-add', 'succesful add');
        }
    }
    
    public function quest_update(Request $request, $id) {
        $update = QuestionPaper::where('quest_id', '=', $id)
            ->update([
                'question_type' => $request->question_type,
                'question' => $request->question,
                'quest_status' => $request->quest_status != '' ? $request->quest_status : 1,
                'quest_option1' => $request->quest_option1,
                'quest_option2' => $request->quest_option2,
                'quest_option3' => $request->quest_option3,
                'quest_option4' => $request->quest_option4,
            ]);
        if($update) {
            return redirect('exam/question/edit/'.$id)->with('success-update', 'succesful update');
        }else {
            return redirect('exam/question/edit/'.$id)->with('nu-error', 'nothing to update');
        }
    }
    
    public function edit_exam($id) {
        $select = Exam::findOrFail($id);
        return view('admin.admission.exam.edit', compact('select'));
    }
    public function edit_quest($id) {
        $select = QuestionPaper::findOrFail($id);
        return view('admin.admission.exam.edit_question', compact('select'));
    }

    public function update(Request $request) {
        $id = $request->id;
        $validate = $request->validate([
                        'exam_id' => 'required',
                        'exam_name' => 'required',
                        'exam_duration' => 'required',
                        'exam_total_marks' => 'required',
                    ], [
                        'exam_total_marks.required' => 'Total marks is required'
                    ]);
        
        $update = Exam::where('eid', '=', $id)
                  ->update([
                      'exam_id' => $request->exam_id,
                      'exam_name' => $request->exam_name,
                      'exam_duration' => $request->exam_duration,
                      'exam_total_marks' => $request->exam_total_marks,
                  ]);
        if($update) {
             return redirect('admission/exam/edit/'.$id)->with('success-update', 'successful');
        }else {
             return redirect('admission/exam/edit/'.$id)->with('nu-error', 'nothing to update');
        }
    }
    
    public function soft_delete($id) {
        $soft_delete = Exam::where('eid', '=', $id)
                        ->update([
                            'status' => 0
                        ]);
        if($soft_delete) {
            return redirect('admission/exams')->with('success-delete', 'successful');
        }
    }
    
    public function restore($id) {
        $restore = Exam::where('eid', '=', $id)
                    ->update([
                        'status' => 1,
                    ]);
        if($restore) {
            return redirect('all-trash')->with('success-restore', 'succesful');
        }
    }
    
    public function delete($id) {
        $delete = Exam::where('eid', '=', $id)
                  ->delete();
        if($delete) {
            return redirect('all-trash')->with('success-pdelete', 'succesful');
        }
    }
    
    public function quest_delete($examId, $id) {
        $delete = QuestionPaper::where('quest_id', '=', $id)
                  ->delete();
        if($delete) {
            return redirect('admission/exams/QuestionPaper/'.$examId)->with('success-pdelete', 'succesful');
        }
    }
}
