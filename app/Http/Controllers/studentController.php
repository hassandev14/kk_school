<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Student_classes;
use App\Models\My_classes;
use DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	   $data = Db::select('SELECT s.*,mc.class_name,mc.id AS class_id,(SELECT fee FROM class_fee cf WHERE cf.class_id=mc.id ORDER BY cf.id DESC LIMIT 1) AS fee
     FROM students s
     LEFT JOIN student_classes sc ON sc.student_id=s.id
     LEFT JOIN my_classes mc ON sc.student_class_id=mc.id');
    
    
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
        'image_name'=>$file_name
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
	$data = DB::select("SELECT  st.id,st.student_name, sc.student_class_id   FROM students st  LEFT JOIN student_classes sc ON sc.student_id=st.id   WHERE sc.student_class_id=( SELECT MAX(scc.student_class_id) FROM student_classes scc WHERE student_id=st.id)
  AND sc.student_class_id=$class_id");
  $content ='<table class="table table-striped table-bordered dt-responsive nowrap">';
  $content.='<tr><th>Student Name </th><th>Action</th></tr>';
      //dd($data);
      foreach($data as $dat)
      { 
        $pres = "pres_".$dat->id;
        $abs = "abs_".$dat->id;
      $content.="<tr>";
      $content.="<td><input type='hidden' value='$dat->id' name='student_id[]'>$dat->student_name<input type='hidden' value='$dat->student_name' name='student_name[]'></td>";
      $content.="<td><input type='radio' id='$pres' name='$pres' value='1'> Present  ";
      $content.="<input type='radio' id='$abs' name='$pres' value='0' checked> Absent</td>";
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

   public function get_students_for_fee(Request $request)
   {
      $class_id = $request->class_id;
      $all_classes = My_classes::where(array("id"=>$class_id))->get();
          //$data = Student::with('student_classes_last')->get();
	$data = DB::select("SELECT  st.id,st.student_name, sc.student_class_id ,sc.fee  FROM students st  LEFT JOIN student_classes sc ON sc.student_id=st.id   WHERE sc.student_class_id=( SELECT MAX(scc.student_class_id) FROM student_classes scc WHERE student_id=st.id)
  AND sc.student_class_id=$class_id");
  $content ='<table class="table table-striped table-bordered dt-responsive nowrap">';
  $content.='<tr><th>Student Name </th><th>Fee</th><th>Action</th></tr>';
      //dd($data);
      foreach($data as $dat)
      { 
        $paid = "paid_".$dat->id;
        $unpaid = "unpaid_".$dat->id;
      $content.="<tr>";
      $content.="<td><input type='hidden' value='$dat->id' name='student_id[]'>$dat->student_name<input type='hidden' value='$dat->student_name' name='student_name[]'></td>";
      $content.="<td>$dat->fee<input type='hidden' value='$dat->fee' name='fee[]'></td>";
      $content.="<td><input type='radio' id='$paid' name='$paid' value='1'> Paid  ";
      $content.="<input type='radio' id='$unpaid' name='$paid' value='0' checked> Unpaid</td>";
      $content.="</tr>";
      }
      $content.='</table>';
      $content.='<div class="form-group row ">
      <div class="col-sm-10">
      <input type="submit" value="submit" class="btn btn-primary "> 
      </div>
  </div>';
      return $content;
   }
}
