<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Teacher_salary;

class teacherController extends Controller
{
    protected  $redirect_page='teachers';
  public function index()
   {
    $data = Teacher::all();
    $teacher_saalry = Teacher_salary::all();
  //  dd($teacher_saalry);
    return view('teacher',array('data'=> $data,'teacher_saalry'=>$teacher_saalry));
   }
  public function add_teacher()
   {
    return view('add_teacher');
   }
   public function edit_teacher(Request $request)
   {
     $id = $request->id;
     $data = Teacher::where('id',$id)->first();
     return view('update_teacher', ['data' => $data]);
   }
  public function insert(TeacherRequest $request)
   {
        
      $file = $request->file('image_name');
      //Display File Name
      $file_name = $file->getClientOriginalName();
       //Display File Extension
      $file_extension = $file->getClientOriginalExtension();
        //Display File Real Path
      $file_path = $file->getRealPath();
       //Display File Size
      $file_size = $file->getSize();
       //Display File Mime Type
      $file_mime_type = $file->getMimeType();

       //Move Uploaded File
       $destinationPath = 'teachers_images';
       $record =  $file->move($destinationPath,$file->getClientOriginalName());
       //dd($request->all());
 
         Teacher::create([
        'teacher_name'=>$request->teacher_name,
        'father_name'=>$request->father_name,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'joining_date'=>$request->joining_date,
        'gender'=>$request->gender,
        'is_active'=>$request->is_active,
        "image_name" =>$file_name
       ]);
       return redirect($this->redirect_page);
   }
   public function update(TeacherRequest $request)
   { 
    $file_name = $request->old_image_name;
    $file = $request->file('image_name');
    if($file)
    {
     //Display File Name
     $file_name = $file->getClientOriginalName();
     //Display File Extension
    $file_extension = $file->getClientOriginalExtension();
      //Display File Real Path
    $file_path = $file->getRealPath();
     //Display File Size
    $file_size = $file->getSize();
     //Display File Mime Type
    $file_mime_type = $file->getMimeType();

     //Move Uploaded File
     $destinationPath = 'teachers_images';
     $record =  $file->move($destinationPath,$file->getClientOriginalName());
    }
      $id = $request->id;
      Teacher::where('id',$id)->update([
        'teacher_name'=>$request->teacher_name,
        'father_name'=>$request->father_name,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'salary'=>$request->salary,
        'joining_date'=>$request->joining_date,
        'gender'=>$request->gender,
        'image_name'=>$file_name
      ]);
      return redirect($this->redirect_page);
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $teacher = Teacher::find($id);
    $teacher->delete();
    return redirect($this->redirect_page);
   }
}