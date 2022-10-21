<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\My_classes;

class subjectController extends Controller
{
    public function index(Request $request)
    {
    
      if(isset($request->my_classes_id))
      {
        $my_classes_id = $request->my_classes_id;
        $data = Subject::with('my_classes')->where(array('my_classes_id'=>$my_classes_id))->get();
      }else
      {
        $data = Subject::with('my_classes')->get();
      }
     return view('subject',array('data'=> $data));
    }
    public function add_subject()
   {
    $class = My_classes::all();
    return view('add_subject' ,['class'=>$class]);
   }
   public function edit_subject(Request $request)
   {
     $id = $request->id;
     $data = Subject::where('id',$id)->first();
     $class = My_classes::all();
     return view('update_subject', ['data' => $data,'class'=>$class]);
   }
  public function insert(Request $request)
   {
         Subject::create([
        'subject_name'=>$request->subject_name,
        'my_classes_id'=>$request->my_classes_id
       ]);
       return redirect('subject');
   }
   public function update(Request $request)
   {
          $id = $request->id;
         Subject::where('id',$id)->update([
        'subject_name'=>$request->subject_name,
        'my_classes_id'=>$request->my_classes_id
      ]);
      return redirect('subject');
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $subject = Subject::find($id);
    $subject->delete();
    return redirect('subject');
   }

}
