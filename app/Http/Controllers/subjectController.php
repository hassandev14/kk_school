<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Clas;

class subjectController extends Controller
{
    public function index()
    {
     $data = Subject::all();
     $class = Clas::all();
     return view('subject',array('data'=> $data,'class'=>$class));
    }
    public function add_subject()
   {
    $class = Clas::all();
    return view('add_subject' ,['class'=>$class]);
   }
   public function edit_subject(Request $request)
   {
     $id = $request->id;
     $data = Subject::where('id',$id)->first();
     $class = Clas::all();
     return view('update_subject', ['data' => $data,'class'=>$class]);
   }
  public function insert(Request $request)
   {
         Subject::create([
        'subject_name'=>$request->subject_name,
        'class_id'=>$request->class_id
       ]);
       return redirect('subject');
   }
   public function update(Request $request)
   {
          $id = $request->id;
         Subject::where('id',$id)->update([
        'subject_name'=>$request->subject_name,
        'class_id'=>$request->class_id
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
