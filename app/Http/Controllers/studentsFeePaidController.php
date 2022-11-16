<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Student;
use App\Models\My_classes;
use App\Models\Student_fee_paid;
use App\Http\Controllers\studentController;

class studentsFeePaidController extends Controller
{
    public function student_fee_paid()
    {
        $students = Student::all();
        $classes = My_classes::all();
        return view('students_fee_paid',array('students'=>$students,'classes'=>$classes));
    }

 public function see_students_fee_paid(Request $request)
    {
        //dd('dd');
        $content ="";
        $submit_date =$request->submit_date;
        $class_id = $request->class_id;
        $month = Date("M",\strtotime($submit_date));
        $year = Date("Y",\strtotime($submit_date));
        
        $where=array("month"=>$month,"year"=>$year,"class_id"=>$class_id);
        $student_fee = Student_fee_paid::where($where)->first();
       if($student_fee){
        $all_class_fee_data = $student_fee->all_class_fee_data;
        $all_class_fee_data= \json_decode($all_class_fee_data);
        $content.='<table class="table table-striped table-bordered dt-responsive nowrap">';
        $content.='<tr><th>Student Name </th><th>Fee</th><th>Action</th></tr>';
    // dd($all_class_fee_data);
      foreach($all_class_fee_data as $dat)
      { 
        $paid = "paid_".$dat->id;
        $unpaid = "unpaid_".$dat->id;
        $paid_checked = ($dat->is_paid=='paid')?'checked':"";
        $unpaid_checked = ($dat->is_paid=='unpaid')?'checked':"";
      $content.="<tr>";
      $content.="<td><input type='hidden' value='$dat->id' name='student_id[]'>$dat->student_name<input type='hidden' value='$dat->student_name' name='student_name[]'></td>";
      $content.="<td>$dat->fee<input type='hidden' value='$dat->fee' name='fee[]'></td>";
      $content.="<td><input type='radio' id='$paid' name='$paid' value='1' $paid_checked> Paid  ";
      $content.="<input type='radio' id='$unpaid' name='$paid' value='0' $unpaid_checked> Unpaid</td>";
      $content.="</tr>";
      }
      $content.='</table>';
      $content.='<div class="form-group row d-flex flex-row-reverse">
      <div class="col-sm-10">
      <input type="submit" value="Update student fee" class="btn btn-primary "> 
      </div>
  </div>';
  $content.="<input type='hidden' name='sf_id' value='$student_fee->id'>";
      return $content;
    }else{

        $object = new studentController();
        $content.= $object->get_students_for_fee($request); 
        //dd($content);
        return $content;
    } 
    }
   
    public function add_students_fee_paid (Request $request)
    {
       // dd($request->student_id);
        $id =$request->sf_id;
        $submit_date =$request->submit_date;
        $student_id =$request->student_id;
        $student_name = $request->student_name;
        $fee = $request->fee;
        $newArr=array();
        $num=0;
        $month = Date("M",\strtotime($submit_date));
        $year = Date("Y",\strtotime($submit_date));
        foreach($student_id  as $std_id){
            $paid = "paid_".$std_id;
            $tmep['id']=$std_id;
            $tmep['fee']=$fee[$num];
            $tmep['student_name']=$student_name[$num];
            $tmep['is_paid']=($request->$paid=="1")?"paid":"unpaid";
            $newArr[]= $tmep;
            $num++;
        }       
        $all_class_fee_data=json_encode($newArr);   
    if (Student_fee_paid::where('class_id', $request->class_id)->exists()) {
       
                   
        Student_fee_paid::where('id',$id)->update([
            'all_class_fee_data'=>$all_class_fee_data 
          ]);
          return Redirect('student_fee_paid')->withErrors(['msg' => 'Record Updated']);
     }else{
               
         Student_fee_paid::create([
            'submit_date'=>$request->submit_date,
            'class_id'=>$request->class_id,
            'fee'=>$request->fee[0],
            'year'=>$year,
            'month'=>$month,
            'all_class_fee_data'=>$all_class_fee_data  
           ]);
    }
      return Redirect('student_fee_paid')->withErrors(['msg' => 'Student Fee for Class added']);
        }
}
