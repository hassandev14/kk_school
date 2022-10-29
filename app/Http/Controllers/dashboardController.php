<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Employe;

class dashboardController extends Controller
{
    public function index()
    {
        $student = Student::all()->count();
        $teacher = Teacher::all()->count();
        $employe = Employe::all()->count();
        return view('dashboard',array('student'=>$student,'teacher'=>$teacher,'employe'=>$employe));
    }
}
