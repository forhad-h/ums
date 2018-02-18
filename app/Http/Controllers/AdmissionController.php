<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Admission;

class AdmissionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        $select = DB::table('admissions')
                   ->where('status', '=', 1)
                   ->get();
        return view('admin.admission.all', compact('select'));
    }
    
    public function edit($id) {
        $select = Admission::findOrFail($id);
        return view('admin.admission.edit', compact('select'));
    }
    
    public function update(Request $request) {
        $id = $request->id;
        $validate = $request->validate([
            'session_year' => 'required',
            'session_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
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
    
    public function restore($id) {
        $restore = Admission::where('admission_id', '=', $id)
                    ->update([
                        'status' => 1,
                    ]);
        if($restore) {
            return redirect('all-trash')->with('success-restore', 'succesful');
        }
    }
    
    public function delete($id) {
        $delete = Admission::where('admission_id', '=', $id)
                  ->delete();
        if($delete) {
            return redirect('all-trash')->with('success-pdelete', 'succesful');
        }
    }
}
