<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use Image;
use App\User;

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
                ->where('employees.status', '=', 1)
                ->get();
        $all_users = DB::table('users')
                ->where('users.status', '=', 1)
                ->select('users.email')
                ->get();
        $rselect = DB::table('roles')
                ->where('roles.status', 1)
                ->get();
        
        return view('admin.employee.all', compact(['select', 'all_users', 'rselect']));
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
                    'experience' => $request->experience,
                    'gender' => $request->gender,
                    'nationality' => $request->nationality,
                    'religion' => $request->religion,
                    'nid' => $request->nid,
                    'joining_date' => $request->joining_date,
                ];
    }
    
    public function insert(Request $request) {
        $validate = $request->validate([
            'name'         => 'required|string|min:3|max:50',
            'designation'  => 'required|min:2|max:50',
            'email'        => 'required|email|unique:employees,email|max:80',
            'gender'       => 'required|max:20',
            'nid'          => 'required|max:50|unique:employees,nid',
            'ppic'          => 'required',
        ], [
            'ppic.required' => 'Please upload a photo',
        ]);
        $insert = Employee::insertGetId(
                              $this->insert_field($request)
                          );
        $save_image = $this->save_image($request, $insert);
        if($insert > 0 || $save_image) {
            return redirect('employees')->with('success-add', 'successfully added');
        }
    }
    
    private function add_tu_field($request, $select) {
        return  [
                    'name' => $select->name,
                    'email' => $select->email,
                    'gender' => $select->gender,
                    'role_id' => $request->role,
                    'password' => bcrypt($request->password)
                ];
    }
    public function add_tu(Request $request) {
        $id = $request->id;
        $validate = $request->validate([
            'role'         => 'required',
            'password'     => 'required|min:6|max:150',
            'cpassword'    => 'same:password'
        ], [
            'cpassword.same' => 'Password does not match',
        ]);
        $select_employee = Employee::findOrFail($id);
        
       $add = User::insert(
                       $this->add_tu_field($request, $select_employee)
               );
       
       
       if($add) {
               return redirect('employees')->with('success-addtu', 'successful');
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
                    'experience' => $request->experience,
                    'gender' => $request->gender,
                    'nationality' => $request->nationality,
                    'religion' => $request->religion,
                    'nid' => $request->nid,
                    'joining_date' => $request->joining_date,
                ];
    }
    
    public function update(Request $request)
    {
        $id = $request->id;
        $validate = $request->validate([
            'name'         => 'required|string|min:3|max:50',
            'designation'  => 'required|min:2|max:50',
            'email'        => 'required|email|max:80|unique:employees,email,'.$id,
            'gender'       => 'required|max:20',
            'nid'          => 'required|max:50',
        ]);
        $update = '';
        
        $update = Employee::where('id', '=', $id)
                    ->update(
                            $this->update_field($request)
                      );
            
        $save_image = $this->save_image($request, $id);
        if($update || $save_image) {
             return redirect('employee/edit/'.$id)
                         ->with('success-update', 'successful');   
        }
    }
    
        
    private function update_tu_field($request) {
        return  [
                    'role_id' => $request->role
                ];
    }
    private function change_password($request, $email) {
        if(isset($request->password) && !empty($request->password)) {
            $update_pass = User::where('email', '=', $email)
                                 ->update([
                                    'password' => bcrypt($request->password),  
                                 ]);
        }
    }
    
    public function update_tu(Request $request) {
        $id = $request->id;
        $validate = $request->validate([
            'role'         => 'required',
            'password'     => 'required|min:6|max:150',
            'cpassword'    => 'same:password'
        ], [
            'cpassword.same' => 'Password does not match',
        ]);
        
        $select_employee = Employee::findOrFail($id);
        
        $select_user = User::where('email', '=', $select_employee->email)
                       ->first();
        
        $update = User::where('email', $select_user->email)
                 ->update(
                       $this->update_tu_field($request)
                  );
       $update_pass = $this->change_password($request, $select_user->email);
       
       if($update || $update_pass) {
               return redirect('employees')->with('success-update', 'successful');
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
    

    public function eu_delete($email) {
        $delete = User::where('email', '=', $email)
                        ->delete();
        
        if($delete) {
            return redirect('employees')->with('success-delete', 'successful');
        }
    }
    
    public function restore($id) {
        $restore = Employee::where('id', '=', $id)
                    ->update([
                        'status' => 1,
                    ]);
        if($restore) {
            return redirect('all-trash')->with('success-restore', 'succesful');
        }
    }
    
    public function delete($id) {
        $delete = Employee::where('id', '=', $id)
                  ->delete();
        if($delete) {
            return redirect('all-trash')->with('success-pdelete', 'succesful');
        }
    }
    
}
