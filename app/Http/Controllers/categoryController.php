<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    public function index()
    {
     $data = Category::all();
     return view('category',array('data'=> $data));
    }
    public function add_category()
   {
    return view('add_category');
   }
   public function edit_category(Request $request)
   {
     $id = $request->id;
     $data = Category::where('id',$id)->first();
     return view('update_category', ['data' => $data]);
   }
  public function insert(Request $request)
   {
         Category::create([
        'name'=>$request->name
       ]);
       return redirect('category');
   }
   public function update(Request $request)
   {
          $id = $request->id;
         Category::where('id',$id)->update([
        'name'=>$request->name
      ]);
      return redirect('category');
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $category = Category::find($id);
    $category->delete();
    return redirect('category');
   }
}
