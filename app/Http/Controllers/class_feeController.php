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
       $id = $request->id;
        
         $sql="SELECT mc.id,mc.class_name,(SELECT fee FROM class_fee cff  WHERE cff.class_id=mc.id order by cff.id desc LIMIT 1 ) current_fee
         FROM my_classes mc LEFT JOIN class_fee cf ON cf.class_id=mc.id WHERE mc.id=$id GROUP BY mc.id";
         $data = DB::select($sql);
         //dd($data);
         return view('add_class_fee',array('data'=>$data[0]));
    }

    public function insert(Request $request)
    {
        //dd($_REQUEST);
        $old_fee=$request->old_fee;
        $fee = $request->fee;
        if($old_fee != $fee)
        {

          Class_fee::create([
         'class_id'=>$request->class_id,
         'fee'=>$request->fee,
         'apply_date'=>$request->apply_date
        ]);
    }else{
        return Redirect('/add_class_fee')->withErrors(['msg' => 'Same fee given']);
    }
        return redirect('our_class');
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
