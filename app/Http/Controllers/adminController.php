<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AdminSignupRequest;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Quotation;

class adminController extends Controller
{
    function index(Request $request)
    {
      //  ss( $request->session()->get('admin_name'));
       
        if ($request->session()->has('admin_name')) {
            return Redirect('teachers');
        }
        else{
            return view('login');
        }
    }
    function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect('login');
    }
    function signup()
    {
        return view('signup');
    }
    function login(AdminLoginRequest $request)
    {
        if ($request->session()->has('admin_name')) {
            return Redirect('teachers');
        }
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
            $admin = Admin::where($user_data)->first();
            s(Session::all());
            Session::push('my_session',['admin_name'=> $admin->admin_name , 'admin_email'=> $admin->email]);
           // Session::push('admin_email', $admin->email);
          //  $request->session()->put('admin_name', $admin->admin_name);
          //  $request->session()->put('admin_email', $admin->email);
            $data = $request->session()->all();
            ss(Session::all());
            return Redirect('teachers')->withErrors(['msg' => 'Login Succesful']);
        }else{
            return Redirect('login')->withErrors(['msg' => 'Email OR Password is invalid!']);
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
}
