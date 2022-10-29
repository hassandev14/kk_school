<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\My_classes;

class attendenceContoller extends Controller
{
    public function index()
    {
        $classes = My_classes::all();
        return view('attendence',array('classes'=>$classes));
    }
    public function see_attendence(Request $request)
    {
        $content ="";
        $today_date =$request->today_date;
        $class_id = $request->class_id;
        $where=array("today_date"=>$today_date,"class_id"=>$class_id);
        $attendence = Attendence::where($where)->first();
       if($attendence){
        $today_attendence = $attendence->today_attendence;
        $today_attendence= \json_decode($today_attendence);
        $content.='<table class="table table-striped table-bordered dt-responsive nowrap">';
         $content.='<tr><th>Student Name </th>
         <th>Action</th>
         </tr>';
      //dd($data);
      foreach($today_attendence as $dat)
      { 
        $pres = "pres_".$dat->id;
        $abs = "abs_".$dat->id;
        $pres_checked = ($dat->today_attendence=='Present')?'checked':"";
        $absent_checked = ($dat->today_attendence=='Absent')?'checked':"";
      $content.="<tr>";
      $content.="<td><input type='hidden' value='$dat->id' name='student_id[]'>$dat->student_name<input type='hidden' value='$dat->student_name' name='student_name[]'></td>";
      $content.="<td><input type='radio' id='$pres' name='$pres' value='1' $pres_checked> Present ";
      $content.="<input type='radio' id='$pres' name='$pres' value='0' $absent_checked> Absent</td>";
      $content.="</tr>";
      }
      $content.='</table>';
      $content.='<div class="form-group row d-flex flex-row-reverse">
      <div class="col-sm-10">
      <input type="submit" value="Update Attendence" class="btn btn-primary "> 
      </div>
  </div>';
  $content.="<input type='hidden' name='at_id' value='$attendence->id'>";
      return $content;
    }else{

        $content.="No Attendence found"; 
        return $content;
    } 
    }
    public function add_attendence()
    {
        $data = Attendence::with('classess')->get();
        $classes = My_classes::all();
        return view('add_attendence',array('data'=> $data,'classes'=>$classes));
    }
    public function attendence_save(Request $request)
    {
     // dd($request->all());

        $today_date =$request->today_date;
        $class_id = $request->class_id;
     $where_data = array(
        'today_date' => $today_date,
        'class_id' => $class_id
        );
       
       // dd($admin);
        if(!Attendence::where($where_data)->exists())
        {

        
        $student_id =$request->student_id;
        $student_name = $request->student_name;
        $today_attendence = "pres_";
        $num=0;
        $newArr=array();
        foreach($student_id  as $std_id){
            $pres = "pres_".$std_id;
            $tmep['id']=$std_id;
            $tmep['student_name']=$student_name[$num];
          //  echo $request->$today_attendence.$std_id."==1";
            $tmep['today_attendence']=($request->$pres=="1")?"Present":"Absent";
            $newArr[]= $tmep;
            $num++;
        }       
        $today_attendence=json_encode($newArr);        
        $inseted = Attendence::create([
            'today_date'=>$request->today_date,
            'class_id'=>$request->class_id,
            'today_attendence'=>$today_attendence  
           ]);
          return redirect('add_attendence');
        }else{

            return Redirect('attendence')->withErrors(['msg' => 'Already attendence saved']);


        }
    }

    public function attendence_update(Request $request)
    {
     // dd($request->all());
        $id =$request->at_id;
        $student_id =$request->student_id;
        $student_name = $request->student_name;
        $newArr=array();
        $num=0;
        foreach($student_id  as $std_id){
            $pres = "pres_".$std_id;
            $tmep['id']=$std_id;
            $tmep['student_name']=$student_name[$num];
            $tmep['today_attendence']=($request->$pres=="1")?"Present":"Absent";
            $newArr[]= $tmep;
            $num++;
        }       
       
        $today_attendence=json_encode($newArr);
        //dd($today_attendence);  
        Attendence::where('id',$id)->update([
            'today_attendence'=>$today_attendence 
          ]);
           
        
          return redirect('attendence')->withErrors(['msg' => 'Attendence updated']);;
    }

}
