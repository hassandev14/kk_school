<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Student_fee;
use DB;

class studentFeeController extends Controller
{
    public function index(Request $request)
    {
    // $class_name = Route::current()->parameters();
       $id = $request->route('id');
         $sql="SELECT MAX(student_name) FROM students WHERE id = $id";
         $student_name = DB::select($sql);

         $sql="SELECT sf.fee
         FROM students s LEFT JOIN student_fee sf ON sf.student_id=s.id
         WHERE sf.id =(SELECT MAX(sff.id) FROM student_fee sff WHERE student_id=$id)";
         $old_student_fee = DB::select($sql);
         //dd($student_name);
         return view('add_student_fee',array('student_name'=>$student_name[0],'id'=>$id,'old_student_fee'=>$old_student_fee[0]));
    }

    public function insert(Request $request)
    {
        Student_fee::create([
         'student_id'=>$request->id,
         'fee'=>$request->fee,
         'apply_date'=>$request->apply_date
        ]);
        return redirect('students');
    }
    public function student_fee_history(Request $request)
    {
        $student_id = $request->route('id');
        $sql="SELECT * FROM student_fee sf WHERE student_id = $student_id";
        $student_history = DB::select($sql);
        return view('student_fee_history',['student_history'=>$student_history]);
    }
    public function all_student_fee(Request $request)
    {
        $student_history = Student_fee::all();
        return view('student_fee_history' ,['student_history'=>$student_history]);
    }
}
