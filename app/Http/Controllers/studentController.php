<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Student_classes;
use App\Models\My_classes;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data =Student::with('get_cl')->get();
    //$data =Student::with('get_cl')->get();
    dd($data);
    //($data[0]->student_classes[0]->student_class_id);
     return view('students',array('data'=> $data));
    }

    public function add_student()
   {
    return view('add_student');
   }
   public function edit_student(Request $request)
   {
     $id = $request->id;
     $data = Student::where('id',$id)->first();
     return view('update_student', ['data' => $data]);
   }
  public function insert(Request $request)
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
       $destinationPath = 'students_images';
       $record =  $file->move($destinationPath,$file->getClientOriginalName());
      // dd($record);
 
         Student::create([
        'roll_no'=>$request->roll_no,
        'student_name'=>$request->student_name,
        'father_name'=>$request->father_name,
        'phone'=>$request->phone,
        'address'=>$request->address,
        "image_name" =>$file_name
       ]);
       return redirect('students');
   }
   public function update(Request $request)
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
     $destinationPath = 'students_images';
     $record =  $file->move($destinationPath,$file->getClientOriginalName());
    }
      $id = $request->id;
      Student::where('id',$id)->update([
        'roll_no'=>$request->roll_no,
        'student_name'=>$request->student_name,
        'father_name'=>$request->father_name,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'image_name'=>$file_name,
      ]);
      return redirect('students');
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $student = Student::find($id);
    $student->delete();
    return redirect('students');
   }
}
