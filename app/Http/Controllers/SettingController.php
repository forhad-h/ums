<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Role;
class SettingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function personal_settings() {
        $select = DB::table('roles')
                      ->orderBy('id', 'DESC')
                      ->get();
        return view('admin.settings.personal', compact('select'));
    }
    
    public function insert_role(Request $request) {
        $validate = $request->validate([
            'id' => 'unique:roles,id|digits_between:1,4',
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
            return redirect('settings/personal')
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
          return redirect('settings/personal')->with('success-delete', 'successful');
      }
    }
}
