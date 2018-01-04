<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUser;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdateProfile;
use App\User;
use App\Education;
use DB;
use Image;

class UserController extends Controller
{   
    public function __construct() {
        $this->middleware('auth');
    }
    
    private function comm_field($request)
    {
        return  [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'gender' => $request->gender,
                ];
    }
    
    private function update_field($request) {
        return  [
                    'designation' => $request->designation,
                    'salary_scale' => $request->salary_scale,
                    'role_id' => $request->role,
                    'joining_date' => $request->joining_date,
                ];
    }
    
    private function insert_field($request) {
        return  [
                    'password' => bcrypt($request->password),
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ];
    }
    
    private function up_field($request) {//Update Profile Field
        return  [
                    'nid' => $request->nid,
                    'caddress' => $request->caddress,
                    'paddress' => $request->paddress,
                    'experience' => $request->experience,
                    'religion' => $request->religion,
                    'nationality' => $request->nationality,
                ];
    }
    
    private function eu_field($request) {
        return  [
                    'course_type' => $request->courset,
                    'course_name' => $request->coursen,
                    'institute' => $request->cfrom,
                    'result' => $request->cresult,
                    'passing_year' => $request->pyear,
                ];
    }
    
    private function ei_field($request) {
        return  [
                    'user_id' => $request->id,
                    'created_at' =>
                            \Carbon\Carbon::now()->toDateTimeString(),
                ];
    }
    
    private function save_image($request, $id)
    {
        if($request->hasFile('ppic') && $id > 0) {
            $image = $request->file('ppic');
            $image_name = 'user-'.$id.'-'.time().
                          '.'.$image->getClientOriginalExtension();
            $image_path = public_path('asset/dist/uploads/').$image_name;
            $image_obj = Image::make($image);
            $saveImage = $image_obj->resize(null, 120, function($constraint) {
                $constraint->aspectRatio();
            })->save($image_path);
            if($saveImage) {
                    $add_img_url = User::where('id', '=', $id)
                                       ->update([
                                           'image' => $image_name,
                                       ]);
                    return $add_img_url;
            }
        }
    }
    
    private function change_password($request) {
        if(isset($request->password) && !empty($request->password)) {
            $update_pass = User::where('id', '=', $request->id)
                                 ->update([
                                    'password' => bcrypt($request->password),  
                                 ]);
        }
    }
    
    public function index() {
        $select = DB::table('users')
                ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.role_name')
                ->where('users.status', '=', 1)
                ->get();
        
        $rselect = DB::table('roles')
                ->where('status', '=', 1)
                ->get();
        
        return view('admin.user.all', compact(['select', 'rselect']));
    }
    
    public function insert(AddUser $request) {
        $insert = User::insert(
                    array_merge($this->comm_field($request),
                                $this->update_field($request),
                                $this->insert_field($request))
                  );
        if($insert) {
            return redirect('teachers')->with('success-add', 'successfully added');
        }
    }
    
            
    public function edit($id) {
        $select = User::findOrFail($id);
        $rselect = DB::table('roles')
                   ->where('status', '=', 1)
                   ->get();
        return view('admin.user.edit', compact(['select', 'rselect']));
    }
    
    public function edit_profile() {
        return view('admin.user.edit-profile');
    }
    
    public function update(UpdateUser $request)
    {
        $id = $request->id;
        $update = $update_pass = '';
        if($request->ischange() != FALSE) {
            $update = User::where('id', '=', $id)
                        ->update(
                            array_merge($this->comm_field($request),
                                $this->update_field($request))
                          );
        }
        $this->change_password($request);
        if($update || $update_pass) {
             return redirect('teacher/edit/'.$id)
                         ->with('success-update', 'successful');   
        }else {
            return redirect('teacher/edit/'.$id)
                    ->with('nu-error', 'nothing to update');
        }
    }
    
    public function update_profile(UpdateProfile $request)
    {
        $id = $request->id;
        $update = $ui_edu = $update_pass = '';
        if($request->ischange() || $request->change_edu()) {
            $update = User::where('id', '=', $id)
                            ->update(array_merge($this->comm_field($request),
                                                 $this->up_field($request)) );
            $ui_edu = Education::where('user_id', '=', $id)
                        ->update( $this->eu_field($request) );
            if(!$ui_edu) {
                $ui_edu = Education::insert( 
                                    array_merge($this->ei_field($request),
                                                $this->eu_field($request)) );
            }
        }
        $this->change_password($request);
        $save_image = $this->save_image($request, $id);
        if($update || $update_pass || $ui_edu || $save_image) {
             return redirect('edit-profile')
                     ->with('success-update', 'successfully updated');   
        }else {
            return redirect('edit-profile')
                    ->with('nu-error', 'nothing to update');
        }
    }
    
    public function view($id) {
        $select = User::findOrFail($id);
        return view('admin.user.view', compact('select'));
    }
    
    public function soft_delete($id) {
        $soft_delete = User::where('id', '=', $id)
                        ->update([
                            'status' => 0
                        ]);
        if($soft_delete) {
            return redirect('teachers')->with('success-delete', 'successful');
        }
    }
}
