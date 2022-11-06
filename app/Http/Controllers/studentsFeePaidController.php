<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\My_classes;
use App\Models\Student_fee;

class studentsFeeController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $classes = My_classes::all();
        return view('students_fee',array('students'=>$students,'classes'=>$classes));
    }
    public function add_students_fee()
    {
        $students = Student::all();
        $classes = My_classes::all();
        return view('add_students_fee',array('students'=>$students,'classes'=>$classes));
    }
    public function see_students_fee(Request $request)
    {
        $content ="";
        $submit_date =$request->submit_date;
        $class_id = $request->class_id;
        $where=array("submit_date"=>$submit_date,"class_id"=>$class_id);
        $student_fee = Student_fee::where($where)->first();
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

        $content.="No Student fee found"; 
        return $content;
    } 
    }
    public function student_fee_update(Request $request)
    {
     // dd($request->all());
        $id =$request->sf_id;
        $student_id =$request->student_id;
        $student_name = $request->student_name;
        $fee = $request->fee;
        $newArr=array();
        $num=0;
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
        Student_fee::where('id',$id)->update([
            'all_class_fee_data'=>$all_class_fee_data 
          ]);
           
        
          return redirect('student_fee')->withErrors(['msg' => 'Student Fee updated']);;
    }
    public function student_fee_save(Request $request)
    {
   //   dd($request->all());

        $submit_date =$request->submit_date;
        $class_id = $request->class_id;
        $fee = $request->fee;
        $student_id =$request->student_id;
        $student_name = $request->student_name;
        $month = date("M",strtotime($submit_date));
        $year = date("Y",strtotime($submit_date));
     $where_data = array(
        'submit_date' => $submit_date,
        'class_id' => $class_id
        );
       
       // dd($admin);
        if(!Student_fee::where($where_data)->exists())
        {
        $paid = "paid_";
        $num=0;
        $newArr=array();
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
        $inseted = Student_fee::create([
            'submit_date'=>$request->submit_date,
            'class_id'=>$request->class_id,
            'fee'=>$request->fee[0],
            'year'=>$year,
            'month'=>$month,
            'all_class_fee_data'=>$all_class_fee_data  
           ]);
          return redirect('student_fee');
        }else{

            return Redirect('add_students_fee')->withErrors(['msg' => 'Already Student fee saved']);


        }
    }
    
}
