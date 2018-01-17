<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use Image;

class EmployeeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    private function save_image($request, $id)
    {
        if($request->hasFile('ppic') && $id > 0) {
            $image = $request->file('ppic');
            $image_name = 'employee-'.$id.'-'.time().
                          '.'.$image->getClientOriginalExtension();
            $image_path = public_path('asset/dist/uploads/employees/').$image_name;
            $image_obj = Image::make($image);
            $saveImage = $image_obj->resize(null, 120, function($constraint) {
                $constraint->aspectRatio();
            })->save($image_path);
            if($saveImage) {
                    $add_img_url = Employee::where('id', '=', $id)
                                       ->update([
                                           'image' => $image_name,
                                       ]);
                    return $add_img_url;
            }
        }
    }
    
    public function index() {
        $select = DB::table('employees')
                ->leftJoin('roles', 'employees.role_id', '=', 'roles.id')
                ->select('employees.*', 'roles.role_name')
                ->where('employees.status', '=', 1)
                ->get();
        
        $rselect = DB::table('roles')
                ->where('status', '=', 1)
                ->get();
        
        return view('admin.employee.all', compact(['select', 'rselect']));
    }
    
    
    private function insert_field($request)
    {
        return  [
                    'name' => $request->name,
                    'designation' => $request->designation,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'caddress' => $request->caddress,
                    'paddress' => $request->paddress,
                    'salary_scale' => $request->salary_scale,
                    'role_id' => $request->role,
                    'experience' => $request->experience,
                    'gender' => $request->gender,
                    'nationality' => $request->nationality,
                    'religion' => $request->religion,
                    'nid' => $request->nid,
                    'joining_date' => $request->joining_date,
                    'password' => bcrypt($request->password),
                ];
    }
    
    public function insert(Request $request) {
        $insert = Employee::insertGetId(
                              $this->insert_field($request)
                          );
        $save_image = $this->save_image($request, $insert);
        if($insert > 0 || $save_image) {
            return redirect('employees')->with('success-add', 'successfully added');
        }
    }
    
    public function view($id) {
        $select = Employee::findOrFail($id);
        return view('admin.employee.view', compact('select'));
    }
    
    public function edit($id) {
        $select = Employee::findOrFail($id);
        $rselect = DB::table('roles')
                   ->where('status', '=', 1)
                   ->get();
        return view('admin.employee.edit', compact(['select', 'rselect']));
    }
    
    
    private function update_field($request)
    {
        return  [
                    'name' => $request->name,
                    'designation' => $request->designation,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'caddress' => $request->caddress,
                    'paddress' => $request->paddress,
                    'salary_scale' => $request->salary_scale,
                    'role_id' => $request->role,
                    'experience' => $request->experience,
                    'gender' => $request->gender,
                    'nationality' => $request->nationality,
                    'religion' => $request->religion,
                    'nid' => $request->nid,
                    'joining_date' => $request->joining_date,
                ];
    }
    
    private function change_password($request) {
        if(isset($request->password) && !empty($request->password)) {
            $update_pass = Employee::where('id', '=', $request->id)
                                 ->update([
                                    'password' => bcrypt($request->password),  
                                 ]);
        }
    }
    
    public function update(Request $request)
    {
        $id = $request->id;
        $update = $update_pass = '';
        
        $update = Employee::where('id', '=', $id)
                    ->update(
                            $this->update_field($request)
                      );
            
        $this->change_password($request);
        $save_image = $this->save_image($request, $id);
        if($update || $update_pass || $save_image) {
             return redirect('employee/edit/'.$id)
                         ->with('success-update', 'successful');   
        }else {
            return redirect('employee/edit/'.$id)
                    ->with('nu-error', 'nothing to update');
        }
    }
    
    public function soft_delete($id) {
        $soft_delete = Employee::where('id', '=', $id)
                        ->update([
                            'status' => 0
                        ]);
        if($soft_delete) {
            return redirect('employees')->with('success-delete', 'successful');
        }
    }
}
