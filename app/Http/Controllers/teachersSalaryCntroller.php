<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Teacher;
use App\Models\Teacher_salary;
use DB;

class teachersSalaryCntroller extends Controller
{
    public function index(Request $request)
    {
         $teacher_id = $request->route('id');
         $sql="SELECT t.*,IFNULL((SELECT salary FROM teachers_salary tss WHERE tss.teacher_id=t.id ORDER BY tss.id DESC LIMIT 1),0) salary
         FROM teachers t
         LEFT JOIN teachers_salary ts ON t.id=ts.teacher_id
         WHERE t.id=$teacher_id";
         $data= DB::select($sql);
         //dd($data);
         return view('add_teacher_salary',array('data'=>$data[0]));
    }
    public function insert(Request $request)
    { 
       // dd($request->all());
         Teacher_salary::create([
         'teacher_id'=>$request->id,
         'salary'=>$request->salary,
         'apply_date'=>$request->apply_date
        ]);
        return redirect('teachers');
    }
    public function salary_history(Request $request)
    {
        $teacher_id = $request->route('id');
        $whereData=array("teacher_id"=>$teacher_id);
        $data = Teacher_salary::with('teachers')->where($whereData)->get();
       //dd($data);
        return view('teacher_salary_history',['salary_history'=>$data]);
    }
    public function teacher_salary(Request $request)
    {
        $salary_history = Teacher_salary::all();
        return view('teacher_salary_history' ,['salary_history'=>$salary_history]);
    }
}
