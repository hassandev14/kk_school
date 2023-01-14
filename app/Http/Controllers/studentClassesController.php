<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_classes;
use App\Models\Student;
use App\Models\My_classes;
use DB;


class studentClassesController extends Controller
{
    public $redirect = "student_classes";
    public function index()
    {
     //$data = Student_classes::with('my_classes')->get();
	 $data =Student_classes::with('my_classes')->with('student')->get();
     //dd($data);
     return view('student_classes',array('data'=> $data));
    }
    public function add_student_classes(Request $request)
   {
    $id = $request->id;
    $student = Db::select("SELECT s.id,s.student_name,sc.fee,sc.student_class_id AS current_class_id ,
    (SELECT mcc.id  FROM my_classes mcc WHERE id= sc.student_class_id+1) AS new_class_id,
    (SELECT mcc.class_name  FROM my_classes mcc WHERE id= sc.student_class_id+1) AS new_class_name,
    (SELECT cf.fee  FROM class_fee cf LEFT JOIN my_classes mcc ON cf.class_id=mcc.id WHERE mcc.id= sc.student_class_id+1 ORDER BY mcc.id LIMIT 1) AS new_class_fee,
    (SELECT mcc.class_name  FROM my_classes mcc ORDER BY id LIMIT 1) AS initial_class_name,
    (SELECT mcc.id  FROM my_classes mcc ORDER BY id LIMIT 1) AS initial_class_id,
    (SELECT cf.fee  FROM class_fee cf LEFT JOIN my_classes mcc ON cf.class_id=mcc.id ORDER BY cf.id DESC LIMIT 1) AS initial_class_fee
    FROM students s
    LEFT JOIN student_classes sc ON s.id=sc.student_id
    LEFT JOIN my_classes mc ON mc.id=sc.student_class_id
     WHERE s.id=$id ORDER BY sc.id DESC  LIMIT 1");
     //dd($student);
    return view('add_student_classes',array('student'=>$student[0]));
   }
   public function edit_student_classes(Request $request)
   {
     $id = $request->id;
     $data = Student_classes::where('id',$id)->first();
     $student = Student::all();
     $my_classes = My_classes::all();
     return view('update_expense', ['data' => $data,'student'=>$student,'my_classes'=>$my_classes]);
   }
  public function insert(Request $request)
   {
    //dd($request->all());
    Student_classes::create([
        'student_id'=>$request->student_id,
        'student_class_id'=>$request->new_class,
        'fee'=>$request->fee
       ]);
       return redirect($this->redirect);
   }
   public function update(Request $request)
   {
          $id = $request->id;
          Student_classes::where('id',$id)->update([
            'student_id'=>$request->student_id,
            'student_class_id'=>$request->student_class_id,
            'fee'=>$request->fee
      ]);
      return redirect($this->redirect);
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $expense = Student_classes::find($id);
    $expense->delete();
    return redirect($this->redirect);
   }
   public function student_class_history(Request $request)
    {
      //  dd('inffff');
        $student_id = $request->route('id');
        $whereData=array("student_id"=>$student_id);
        $data = Student_classes::with('student')->where($whereData)->get();
        return view('student_classes',['data'=>$data]);
    }
    public function all_student_class(Request $request)
    {
        $student_history = Student_fee::all();
        return view('student_classes' ,['student_history'=>$student_history]);
    }
}
