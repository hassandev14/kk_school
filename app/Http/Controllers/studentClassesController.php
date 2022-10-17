<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_classes;
use App\Models\Student;
use App\Models\My_classes;


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
    public function add_student_classes()
   {
    $student = Student::all();
    $my_classes = My_classes::all();
    return view('add_student_classes',array('student'=>$student,'my_classes'=>$my_classes));
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
    Student_classes::create([
        'student_id'=>$request->student_id,
        'student_class_id'=>$request->student_class_id,
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
}
