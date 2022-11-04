<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Class_fee;

class class_feeController extends Controller
{
    public function index(Request $request)
    {
     $class_name = Route::current()->parameters();
     return view('add_class_fee',array('data'=> $data,'class_name'=>$class_name));
    }
}
