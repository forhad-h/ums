<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\TSalary;
use App\Employee;
use App\ESalary;

class SalaryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function teachers_index() {
        $select = DB::table('users')
                ->where('users.status', '=', 1)
                ->get();
        
        return view('admin.financial.salary.teacher.all', compact('select'));
    }
    
    public function ts_add($id) {
        $select = User::findOrFail($id);
        return view('admin.financial.salary.teacher.add', compact('select'));
    }
    
    public function ts_insert(Request $request) {
        $validate = $request->validate([
                    'payment_method' => 'required',
                    'pamount_taka' => 'required',
                    'pamount_words' => 'required',
                    'payment_date' => 'required',
                ], [
                    'pamount_taka.reqiored' => 'Payment amount in taka is required.',
                    'pamount_words.reqiored' => 'Payment amount in words is required.',
                ]);
        $insert = TSalary::insertGetId([
             'user_id' => $request->user_id,
             'payment_method' => $request->payment_method,
             'pamount_taka' => $request->pamount_taka,
             'pamount_words' => $request->pamount_words,
             'payment_date' => $request->payment_date,
        ]);
        
        if($insert > 0) {
            return redirect('teacher-salary/receipt/'.$request->user_id);
        }
    }
    
    public function ts_receipt($id) {
        $select = User::findOrFail($id);
        return view('admin.financial.salary.teacher.receipt', compact('select'));
    }
    
    
    
    public function employees_index() {
        $select = DB::table('employees')
                ->where('employees.status', '=', 1)
                ->get();
        
        return view('admin.financial.salary.employee.all', compact('select'));
    }
    
    public function es_add($id) {
        $select = Employee::findOrFail($id);
        return view('admin.financial.salary.employee.add', compact('select'));
    }
    
    public function es_insert(Request $request) {
        $validate = $request->validate([
                    'payment_method' => 'required',
                    'pamount_taka' => 'required',
                    'pamount_words' => 'required',
                    'payment_date' => 'required',
                ], [
                    'pamount_taka.reqiored' => 'Payment amount in taka is required.',
                    'pamount_words.reqiored' => 'Payment amount in words is required.',
                ]);
        $insert = ESalary::insertGetId([
             'employee_id' => $request->employee_id,
             'payment_method' => $request->payment_method,
             'pamount_taka' => $request->pamount_taka,
             'pamount_words' => $request->pamount_words,
             'payment_date' => $request->payment_date,
        ]);
        
        if($insert > 0) {
            return redirect('employee-salary/receipt/'.$request->employee_id);
        }
    }
    
    public function es_receipt($id) {
        $select = Employee::findOrFail($id);
        return view('admin.financial.salary.employee.receipt', compact('select'));
    }
}
