<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Employee;
use App\Admission;
use App\Exam;
class TrashController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }
    
    public function all_trash() {
        $select_users = User::where('status', '=', 0)
                        ->get();
        $select_students =  Student::where('status', '=', 0)
                             ->get();
        $select_employees = Employee::where('status', '=', 0)
                             ->get();
        $select_admissions = Admission::where('status', '=', 0)
                             ->get();
        $select_exams = Exam::where('status', '=', 0)
                             ->get();
        return view('admin.trash.all', compact([
                                         'select_users',
                                         'select_students',
                                         'select_employees',
                                         'select_admissions',
                                         'select_exams',
                                       ])
                );
    }
}
