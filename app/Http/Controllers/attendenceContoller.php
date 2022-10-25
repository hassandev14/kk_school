<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\My_classes;

class attendenceContoller extends Controller
{
    public function see_attendence()
    {
        $data = Attendence::all();
        $classes = My_classes::all();
        return view('attendence',array('data'=> $data,'classes'=>$classes));
    }
    public function add_attendence()
    {
        $data = Attendence::with('classess')->get();
        $classes = My_classes::all();
        return view('add_attendence',array('data'=> $data,'classes'=>$classes));
    }
    public function attendence_save(Request $request)
    {
      //dd($request->all());
        $student_id =$request->student_id;
        $student_name = $request->student_name;
        $today_attendence = "pres_";
        $num=0;
        $newArr=array();
        foreach($student_id  as $std_id){
            $tmep['id']=$std_id;
            $tmep['student_name']=$student_name[$num];
            echo $request->$today_attendence.$std_id."==1";
            $tmep['today_attendence']=($request->$today_attendence.$std_id=="1")?"Present":"Absent";
            $newArr[]= $tmep;
        }       
        $today_attendence=json_encode($newArr);        
        $inseted = Attendence::create([
            'today_date'=>$request->today_date,
            'class_id'=>$request->class_id,
            'today_attendence'=>$today_attendence  
           ]);
          return redirect('add_attendence');
    }

}
