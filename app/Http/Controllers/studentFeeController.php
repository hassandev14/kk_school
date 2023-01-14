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
         $student_id = $request->route('id');
         $sql="SELECT s.*,IFNULL((SELECT fee FROM student_fee sff WHERE sff.student_id=s.id ORDER BY sff.id DESC LIMIT 1),0) fee
         FROM students s
         LEFT JOIN student_fee ts ON s.id=ts.student_id
         WHERE s.id=$student_id";
         $data = DB::select($sql);
         return view('add_student_fee',array('data'=>$data[0]));
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
    
   
}
