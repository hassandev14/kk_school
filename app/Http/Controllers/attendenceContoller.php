<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\My_classes;

class attendenceContoller extends Controller
{
    public function index()
    {
     $data = Attendence::with('classess')->get();
     $classes = My_classes::all();
     return view('attendence',array('data'=> $data,'classes'=>$classes));
    }
   
}
