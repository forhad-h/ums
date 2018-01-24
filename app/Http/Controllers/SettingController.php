<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Role;
use App\Subject;
class SettingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $select_role = DB::table('roles')
                      ->orderBy('id', 'DESC')
                      ->get();
        
        $select_subject = DB::table('subjects')
                          ->orderBy('subject_id', 'DESC')
                          ->get();
        
        return view('admin.settings.all',
                compact(['select_role', 'select_subject']));
    }
    
    public function insert_role(Request $request) {
        $validate = $request->validate([
            'id' => 'unique:roles,id',
            'role_name' => 'required',
        ]);
        $permissions = '';
        if($request->permissions != '') {
            $permissions = implode(", ", $request->permissions);
        }
        $insert = Role::insert([
            'id' => $request->id,
            'role_name' => $request->role_name,
            'permissions' => $permissions,
        ]);
        if($insert) {
            return redirect('settings')
                    ->with('success-add', 'successfully added');
        }
    }
    
    public function hide_role($id) {
        $hide = Role::where('id', '=', $id)
                        ->update([
                            'status' => 0
                        ]);
        return $hide;
    }
    
    public function show_role($id) {
        $show = Role::where('id', '=', $id)
                        ->update([
                            'status' => 1
                        ]);
        return $show;
    }
    
    public function delete_role($id) {
      $delete = Role::where('id', '=', $id)
              ->delete();
      if($delete) {
          return redirect('settings')->with('success-delete', 'successful');
      }
    }
    
    public function insert_subject(Request $request) {
        $validate = $request->validate([
            'subject_code' => 'unique:subjects,subject_code|digits_between:1,20',
            'subject_name' => 'required',
            'course_fee' => 'required',
        ]);
        $insert = Subject::insert([
            'subject_code' => $request->subject_code,
            'subject_name' => $request->subject_name,
            'course_fee' => $request->course_fee,
        ]);
        if($insert) {
            return redirect('settings')
                    ->with('success-add', 'successfully added');
        }
    }
    
    public function hide_subject($id) {
        $hide = Subject::where('id', '=', $id)
                        ->update([
                            'status' => 0
                        ]);
        return $hide;
    }
    
    public function show_subject($id) {
        $show = Subject::where('id', '=', $id)
                        ->update([
                            'status' => 1
                        ]);
        return $show;
    }
    
    public function delete_subject($id) {
      $delete = Subject::where('id', '=', $id)
              ->delete();
      if($delete) {
          return redirect('settings')->with('success-delete', 'successful');
      }
    }
    
    
    public function clear_session() {
        $errors = '';
        return $errors;
    }
}
