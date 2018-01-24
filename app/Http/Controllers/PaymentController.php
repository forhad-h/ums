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
        $select = DB::table('students')
                ->leftJoin('subjects', 'students.subject', '=', 'subjects.subject_code')
                ->select('students.*', 'subjects.*')
                ->where('students.status', '=', 1)
                ->get();
        
        return view('admin.financial.payment.all', compact('select'));
    }
    
    public function add($id) {
        $select = Student::findOrFail($id);
        return view('admin.financial.payment.add', compact('select'));
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
             'payment_type' => $request->payment_type,
             'payment_method' => $request->payment_method,
             'pamount_taka' => $request->pamount_taka,
             'pamount_words' => $request->pamount_words,
             'payment_date' => $request->payment_date,
        ]);
        
        if($insert > 0) {
            return redirect('payment/receipt/'.$request->student_id);
        }
    }
    
    public function receipt($id) {
        $select = Student::findOrFail($id);
        return view('admin.financial.payment.receipt', compact('select'));
    }
}
