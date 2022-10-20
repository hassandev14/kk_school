<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
	public $model_name = 'App\Models\Category';
	public $redirect_page = 'category';
	public $module_name = 'category';
    public function index()
    {
     $data = $this->model_name::all();
     return view($this->module_name,array('data'=> $data));
    }
    public function add_category()
   {
    return view('add_'.$this->module_name);
   }
   public function edit_category(Request $request)
   {
     $id = $request->id;
     $data = $this->model_name::where('id',$id)->first();
     return view('update_'.$this->module_name, ['data' => $data]);
   }
  public function insert(Request $request)
   {
         $this->model_name::create([
        'name'=>$request->name
       ]);
       return redirect($this->redirect_page);
   }
   public function update(Request $request)
   {
          $id = $request->id;
         $this->model_name::where('id',$id)->update([
        'name'=>$request->name
      ]);
      return redirect($this->redirect_page);
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $category = $this->model_name::find($id);
    $category->delete();
    return redirect($this->redirect_page);
   }
}
