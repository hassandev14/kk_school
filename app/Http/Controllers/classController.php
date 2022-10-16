<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clas;

class classController extends Controller
{
    public function index()
    {
     $data = Clas::all();
     return view('class',array('data'=> $data));
    }
    public function add_class()
   {
    $class = Clas::all();
    return view('add_class' ,['class'=>$class]);
   }
   public function edit_class(Request $request)
   {
     $id = $request->id;
     $data = Clas::where('id',$id)->first();
     return view('update_class', ['data' => $data]);
   }
  public function insert(Request $request)
   {
         Clas::create([
        'class_name'=>$request->class_name,
       ]);
       return redirect('class');
   }
   public function update(Request $request)
   {
          $id = $request->id;
         Clas::where('id',$id)->update([
        'class_name'=>$request->class_name,
      ]);
      return redirect('class');
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $class = Clas::find($id);
    $class->delete();
    return redirect('class');
   }
}
