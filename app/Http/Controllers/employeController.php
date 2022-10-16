<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use Illuminate\Http\Request;
use App\Models\Employe;

class employeController extends Controller
{
    public function index()
    {
     $data = Employe::all();
     return view('employe',array('data'=> $data));
    }
   public function add_employe()
    {
     return view('add_employe');
    }
    public function edit_employe(Request $request)
    {
      $id = $request->id;
      $data = Employe::where('id',$id)->first();
      return view('update_employe', ['data' => $data]);
    }
   public function insert(EmployeRequest $request)
    {
         
       $file = $request->file('image_name');
       //Display File Name
       $file_name = $file->getClientOriginalName();
        //Display File Extension
       $file_extension = $file->getClientOriginalExtension();
         //Display File Real Path
       $file_path = $file->getRealPath();
        //Display File Size
       $file_size = $file->getSize();
        //Display File Mime Type
       $file_mime_type = $file->getMimeType();
 
        //Move Uploaded File
        $destinationPath = 'employes_images';
        $record =  $file->move($destinationPath,$file->getClientOriginalName());
       // dd($record);
  
          Employe::create([
         'employe_name'=>$request->employe_name,
         'father_name'=>$request->father_name,
         'phone'=>$request->phone,
         'address'=>$request->address,
         'salary'=>$request->salary,
         "image_name" =>$file_name
        ]);
        return redirect('employe');
    }
    public function update(EmployeRequest $request)
    {
     $file_name = $request->old_image_name;
     $file = $request->file('image_name');
     if($file)
     {
      //Display File Name
      $file_name = $file->getClientOriginalName();
      //Display File Extension
     $file_extension = $file->getClientOriginalExtension();
       //Display File Real Path
     $file_path = $file->getRealPath();
      //Display File Size
     $file_size = $file->getSize();
      //Display File Mime Type
     $file_mime_type = $file->getMimeType();
 
      //Move Uploaded File
      $destinationPath = 'employes_images';
      $record =  $file->move($destinationPath,$file->getClientOriginalName());
     }
       $id = $request->id;
       Employe::where('id',$id)->update([
         'employe_name'=>$request->employe_name,
         'father_name'=>$request->father_name,
         'phone'=>$request->phone,
         'address'=>$request->address,
         'salary'=>$request->salary,
         'image_name'=>$file_name,
       ]);
       return redirect('employe');
    }
    public function delete(Request $request)
    {
     $id = $request->id;
     $employe = Employe::find($id);
     $employe->delete();
     return redirect('employe');
    }
}
