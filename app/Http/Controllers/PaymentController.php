<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
use App\Payment;

class PaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $select_students = DB::table('students')
                ->leftJoin('subjects', 'students.subject', '=', 'subjects.subject_code')
                ->select('students.*', 'subjects.*')
                ->where('students.status', '=', 1)
                ->get();
        
        $select_payments = DB::table('payments')
                           ->orderBy('payment_id', 'DESC')
                           ->get();
        
    return view('admin.financial.students_payment.all', compact(['select_students', 'select_payments']));
    }
    
    public function add($id) {
        $select = Student::findOrFail($id);
        return view('admin.financial.students_payment.add', compact('select'));
    }
    
    public function insert(Request $request) {
        $validate = $request->validate([
                    'payment_type' => 'required',
                    'payment_method' => 'required',
                    'pamount_taka' => 'required',
                    'pamount_words' => 'required',
                    'payment_date' => 'required',
                ], [
                    'pamount_taka.reqiored' => 'Payment amount in taka is required.',
                    'pamount_words.reqiored' => 'Payment amount in words is required.',
                ]);
        $insert = Payment::insertGetId([
             'student_id' => $request->student_id,
             'student_semester' => $request->student_semester,
             'payment_type' => $request->payment_type,
             'payment_method' => $request->payment_method,
             'pamount_taka' => $request->pamount_taka,
             'pamount_words' => $request->pamount_words,
             'payment_date' => $request->payment_date,
        ]);
        
        if($insert > 0) {
            return redirect('student-payment/receipt/'.$request->student_id.'/'.$insert);
        }
    }
    
    public function receipt($sid, $pid) {
        $select_student = Student::findOrFail($sid);
        
        $select_last_payment = Payment::where('student_id', '=', $sid)
                               ->where('payment_id', '=', $pid)
                               ->orderBy('payment_id', 'DESC')
                               ->first();
        
        $select_payment = Payment::where('student_id', '=', $sid)->orderBy('payment_id', 'DESC')
                          ->get();
        
        return view('admin.financial.students_payment.receipt', compact(['select_student', 'select_payment', 'select_last_payment']));
    }
}
