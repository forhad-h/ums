<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $select = DB::table('students')
                ->leftJoin('subjects', 'users.subject_id', '=', 'subjects.id')
                ->select('students.*', 'subjects.subject_name')
                ->where('students.status', '=', 1)
                ->get();
        
        $sselect = DB::table('subjects')
                ->where('status', '=', 1)
                ->get();
        
        return view('admin.user.all', compact(['select', 'sselect']));
    }
}
