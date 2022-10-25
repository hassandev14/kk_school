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

     //$data = Student::with('student_classes_last')->get();
	$data = Student::select('students.*','my_classes.id as class_id','my_classes.class_name',Student::raw('MAX(student_classes.student_class_id) AS student_class_id') )
    ->leftJoin('student_classes', 'student_classes.student_id', '=', 'students.id')
	  ->leftJoin('my_classes', 'my_classes.id', '=', 'student_classes.student_class_id')
    ->groupBy('student_classes.student_id')
    ->orderByRaw('students.id desc','student_classes.id desc')
    ->get();
    
	//dd($data);
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
        'admission_date'=>$request->admission_date,
        'gender'=>$request->gender,
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
        'admission_date'=>$request->admission_date,
        'gender'=>$request->gender,
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
   public function get_students(Request $request)
   {
      $class_id = $request->class_id;
      $all_classes = My_classes::where(array("id"=>$class_id))->get();
          //$data = Student::with('student_classes_last')->get();
	$data = Student::select('students.id','students.student_name',Student::raw('MAX(student_classes.student_class_id) AS student_class_id') )
  ->leftJoin('student_classes', 'student_classes.student_id', '=', 'students.id')
  ->havingRaw("MAX(student_classes.student_class_id)=$class_id")
 
  ->orderByRaw('student_classes.student_class_id desc')
  ->limit(1)
  ->get();
  //$data = Student::all();
  
  $content ='<table>';
  $content.='<th><td>Student Name </td></th>';
      //dd($data);
      foreach($data as $dat)
      { 
        $pres = "pres_".$dat->id;
        $abs = "abs_".$dat->id;
      $content.="<tr>";
      $content.="<td><input type='hidden' value='$dat->id' name='student_id[]'><input type='text' value='$dat->student_name' name='student_name[]' readonly></td>";
      $content.="<td><input type='radio' id='$pres' name='$pres' value='1'>Present</td>";
      $content.="<td><input type='radio' id='$abs' name='$pres' value='0' checked>Absent</td>";
      $content.="</tr>";
      }
      $content.='</table>';
      $content.='<div class="form-group row d-flex flex-row-reverse">
      <div class="col-sm-10">
      <input type="submit" value="submit" class="btn btn-primary "> 
      </div>
  </div>';
      return $content;
   }
}
