<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
use Image;
use App\Http\Requests\UStudentRequest;

class StudentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    private function save_image($request, $id, $field_name, $column_name)
    {
        if($request->hasFile("{$field_name}") && $id > 0) {
            
            $image = $request->file("{$field_name}");
            $image_name = 'student-'.$field_name.$id.'-'.time().
                          '.'.$image->getClientOriginalExtension();
            
            $image_path = public_path('asset/dist/uploads/students/').$image_name;
            $image_obj = Image::make($image);
            $saveImage = $image_obj->resize(null, 120, function($constraint) {
                $constraint->aspectRatio();
            })->save($image_path);
            if($saveImage) {
                    $add_img_url = Student::where('id', '=', $id)
                                       ->update([
                                           "{$column_name}" => $image_name,
                                       ]);
                    return $add_img_url;
            }
        }
    }
    
    public function index() {
        $select = DB::table('students')
                ->leftJoin('subjects', 'students.subject', '=', 'subjects.subject_code')
                ->select('students.*', 'subjects.subject_name', 'subjects.course_fee')
                ->where('students.status', '=', 1)
                ->get();
        
        return view('admin.student.all', compact('select'));
    }
    
    public function view($id) {
        $select = Student::findOrFail($id);
        return view('admin.student.view', compact('select'));
    }
    
    
        private function update_field($request) {
        return  [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'gname' => $request->gname,
                    'gphone' => $request->gphone,
                    'nid' => $request->nid,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'bdate' => $request->bdate,
                    'caddress' => $request->caddress,
                    'paddress' => $request->paddress,
                    'nationality' => $request->nationality,
                    'religion' => $request->religion,
                    'subject' => $request->subject,
                ];
    }
    public function update(UStudentRequest $request)
    {
        $id = $request->id;
        $update = Student::where('id', '=', $id)
                    ->update(
                        $this->update_field($request)
                      );
        
        $save_image = $this->save_image($request, $update, 'image', 'image');
        $save_signature = $this->save_image($request, $update, 'signature', 'simage');
        
        if($update || $save_image || $save_signature) {
             return redirect('student/edit/'.$id)
                         ->with('success-update', 'successful');   
        }else {
            return redirect('student/edit/'.$id)
                    ->with('nu-error', 'nothing to update');
        }
    }
    
    public function edit($id) {
        $select = Student::findOrFail($id);
        $select_subject = DB::table('subjects')
                   ->where('status', '=', 1)
                   ->get();
        return view('admin.student.edit', compact(['select', 'select_subject']));
    }
}
