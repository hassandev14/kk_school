<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class teacherController extends Controller
{
  public function index()
   {
    $data = Teacher::all();
    return view('teacher',array('data'=> $data));
   }
}