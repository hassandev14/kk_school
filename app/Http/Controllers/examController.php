<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\My_classes;
use DB;

use Illuminate\Http\Request;

class examController extends Controller
{
    public function index(Request $request)
    {
      $data = Exam::with('my_classes')->get();
     return view('exam',array('data'=> $data));
    }
    public function add_exam_marks(Request $request)
    {
      return view('add_exam_marks');
    }
   public function add_exam(Request $request)
    {
    $id = $request->id;
    $sql="SELECT mc.id,mc.class_name
    FROM my_classes mc  WHERE mc.id=$id GROUP BY mc.id";
    $data = DB::select($sql);
   // dd($data);
     return view('add_exam',['data'=>$data[0]]);
    }
    public function edit_exam(Request $request)
    {
      $id = $request->id;
      $data = Employe::where('id',$id)->first();
      return view('update_employe', ['data' => $data]);
    }
   public function insert(Request $request)
    {
       // dd($request->all());
          Exam::create([
         'class_id'=>$request->class_id,
         'start_date'=>$request->start_date,
         'end_date'=>$request->end_date,
         'timing'=>$request->timing,
        ]);
        return redirect('exams');
    }
    public function update(EmployeRequest $request)
    {
       $id = $request->id;
       Exam::where('id',$id)->update([
        'class_id'=>$request->class_id,
        'start_date'=>$request->start_date,
        'end_date'=>$request->end_date,
        'timing'=>$request->timing,
       ]);
       return redirect('employe');
    }
    public function delete(Request $request)
    {
     $id = $request->id;
     $exam = Exam::find($id);
     $exam->delete();
     return redirect('employe');
    }
}
