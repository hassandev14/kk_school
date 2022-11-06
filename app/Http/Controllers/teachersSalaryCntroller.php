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
         $id = $request->route('id');
         $sql="SELECT MAX(teacher_name) FROM teachers WHERE id = $id";
         $teacher_name = DB::select($sql);

         $sql="SELECT ts.salary
         FROM teachers t LEFT JOIN teachers_salary ts ON ts.teacher_id=t.id
         WHERE ts.id =(SELECT MAX(tss.id) FROM teachers_salary tss WHERE teacher_id=$id)";
         $old_teacher_salary= DB::select($sql);
         //dd($id);
         return view('add_teacher_salary',array('teacher_name'=>$teacher_name,'id'=>$id,'old_teacher_salary'=>$old_teacher_salary));
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
        $sql="SELECT * FROM teachers_salary ts WHERE teacher_id = $teacher_id";
        $salary_history = DB::select($sql);
        return view('teacher_salary_history',['salary_history'=>$salary_history]);
    }
    public function teacher_salary(Request $request)
    {
        $salary_history = Teacher_salary::all();
        return view('teacher_salary_history' ,['salary_history'=>$salary_history]);
    }
}
