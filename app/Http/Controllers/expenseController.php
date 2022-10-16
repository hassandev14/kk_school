<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;
use App\Models\Employe;

class expenseController extends Controller
{
    public function index()
    {
     $data = Expense::with('employe')->with('category')->get();
     return view('expense',array('data'=> $data));
    }
    public function add_expense()
   {
    $category = Category::all();
    $employe = Employe::all();
    return view('add_expense',array('employe'=>$employe,'category'=>$category));
   }
   public function edit_expense(Request $request)
   {
     $id = $request->id;
     $data = Expense::where('id',$id)->first();
     $category = Category::all();
     $employe = Employe::all();
     return view('update_expense', ['data' => $data,'employe'=>$employe,'category'=>$category]);
   }
  public function insert(Request $request)
   {
         Expense::create([
        'expense_name'=>$request->expense_name,
        'expense_amount'=>$request->expense_amount,
        'expense_detail'=>$request->expense_detail,
        'employe_id'=>$request->employe_id,
        'category_id'=>$request->category_id,
       ]);
       return redirect('expense');
   }
   public function update(Request $request)
   {
          $id = $request->id;
         Expense::where('id',$id)->update([
        'expense_name'=>$request->expense_name,
        'expense_detail'=>$request->expense_detail,
        'expense_detail'=>$request->expense_detail,
        'employe_id'=>$request->employe_id,
        'category_id'=>$request->category_id,
      ]);
      return redirect('expense');
   }
   public function delete(Request $request)
   {
    $id = $request->id;
    $expense = Expense::find($id);
    $expense->delete();
    return redirect('expense');
   }
}
