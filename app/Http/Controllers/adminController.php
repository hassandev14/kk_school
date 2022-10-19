<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AdminSignupRequest;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;


use App\Models\Admin;
use App\Quotation;
class adminController extends Controller
{
    function index(Request $request)
    {
		if($request->session()->has('admin_name'))
		{
			return Redirect('teachers');
		}else{
			return view('login');
			
		}
        return view('login');
    }
    function signup()
    {
        return view('signup');
    }
    function login(AdminLoginRequest $request)
    {
		 $validated = $request->validated();
        $email =$request->input('email');
        $password = md5($request->input('password'));

        $user_data = array(
        'email' => $email,
        'password' => $password
        );
       
       // dd($admin);
        if(Admin::where($user_data)->exists())
        {
			$user = Admin::where($user_data)->first();
			$request->session()->put('admin_name',$user->admin_name);
			$request->session()->put('admin_eamail',$user->email);
			$request->session()->save();
			return Redirect('teachers')->withErrors(['msg' => 'Login Succesful']);
        }

    }

    public function insert(AdminSignupRequest $request)
    {
        $validated = $request->validated();
        Admin::create([
        'admin_name'=>$request->admin_name,
        'email'=>$request->email,
        'password'=> md5($request->password)
       ]);
       //dd('in');
 
       return Redirect('login');
        }
		public function logout(Request $request)
    {

          $request->session()->flush();
		  $request->session()->regenerate();
 		  return redirect('/');
   
        }
}
