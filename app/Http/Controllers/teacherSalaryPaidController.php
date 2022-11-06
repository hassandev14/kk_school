<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher_salary_paid;
use App\Models\Teacher;

class teacherSalaryController extends Controller
{
    protected  $redirect_page='teacher_salary';
    public function index()
     {
      $data = Teacher_salary_paid::all();
      $teacher = Teacher::all();
      return view('teacher_salary',array('data'=> $data,'teacher'=>$teacher));
     }
    public function add_teacher_salary()
     {
        $teacher = Teacher::all();
      return view('add_teacher_salary',['teacher'=>$teacher]);
     }
     public function edit_teacher_salary(Request $request)
     {
       $id = $request->id;
       $data = Teacher_salary_paid::where('id',$id)->first();
       $teacher = Teacher::all();
       return view('update_teacher_salary', ['data' => $data,'teacher'=>$teacher]);
     }
    public function insert(Request $request)
     {
         // dd($request->all());
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
         $destinationPath = 'teacher_salary_images';
         $record =  $file->move($destinationPath,$file->getClientOriginalName());
        // dd($record);
        $pay_date = $request->pay_date;
        $month = date("M",strtotime($pay_date));
        $year = date("Y",strtotime($pay_date));
       // dd($month);
       Teacher_salary_paid::create([
          'teacher_id'=>$request->teacher_id,
          'month'=>$month,
          'year'=>$year,
          'pay_date'=>$request->pay_date,
          'status'=>$request->status,
          'method'=>$request->method,
          "image_name" =>$file_name
         ]);
         return redirect($this->redirect_page);
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
       $destinationPath = 'teacher_salary_images';
       $record =  $file->move($destinationPath,$file->getClientOriginalName());
      }
      $pay_date = $request->pay_date;
      $month = date("M",strtotime($pay_date));
      $year = date("Y",strtotime($pay_date));
        $id = $request->id;
        Teacher_salary_paid::where('id',$id)->update([
            'teacher_id'=>$request->teacher_id,
            'month'=>$month,
            'year'=>$year,
            'pay_date'=>$request->pay_date,
            'status'=>$request->status,
            'method'=>$request->method,
          'image_name'=>$file_name
        ]);
        return redirect($this->redirect_page);
     }
     public function delete(Request $request)
     {
      $id = $request->id;
      $teacher_salary = Teacher_salary_paid::find($id);
      $teacher_salary->delete();
      return redirect($this->redirect_page);
     }
}
