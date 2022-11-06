<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Class_fee;
use DB;

class class_feeController extends Controller
{
    public function index(Request $request)
    {
    // $class_name = Route::current()->parameters();
       $id = $request->route('id');
         $sql="SELECT MAX(class_name) FROM my_classes WHERE id = $id";
         $class_name = DB::select($sql);

         $sql="SELECT cf.fee
         FROM my_classes mc LEFT JOIN class_fee cf ON cf.class_id=mc.id
         WHERE cf.id =(SELECT MAX(cff.id) FROM class_fee cff WHERE class_id=$id)";
         $old_class_fee = DB::select($sql);
         return view('add_class_fee',array('class_name'=>$class_name[0],'id'=>$id,'old_class_fee'=>$old_class_fee[0]));
    }

    public function insert(Request $request)
    {
          Class_fee::create([
         'class_id'=>$request->id,
         'fee'=>$request->fee,
         'apply_date'=>$request->apply_date
        ]);
        return redirect('class');
    }
    public function fee_history(Request $request)
    {
        $class_id = $request->route('id');
        $sql="SELECT * FROM class_fee cf WHERE class_id = $class_id";
        $class_history = DB::select($sql);
       // dd($class_history);
        return view('class_history',['class_history'=>$class_history]);
    }
    public function class_fee(Request $request)
    {
        $class_history = Class_fee::all();
        return view('class_history' ,['class_history'=>$class_history]);
    }
}
