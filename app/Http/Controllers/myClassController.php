<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\My_classes;

class myClassController extends Controller
{
    public function index(Request $request)
    {
     
     $data = My_classes::with('subject')->get();
     return view('class',array('data'=> $data));
    }
    public function add_class()
   {
    $class = My_classes::all();
    return view('add_class' ,['class'=>$class]);
   }
   public function edit_class(Request $request)
   {
     $id = $request->id;
     $data = My_classes::where('id',$id)->first();
     return view('update_class', ['data' => $data]);
   }
  public function insert(Request $request)
   {
         My_classes::create([
        'class_name'=>$request->class_name,
       ]);
       return redirect('class');
   }
   public function update(Request $request)
   {
          $id = $request->id;
         My_classes::where('id',$id)->update([
        'class_name'=>$request->class_name,
      ]);
      return redirect('class');
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $class = My_classes::find($id);
    $class->delete();
    return redirect('class');
   }
}
