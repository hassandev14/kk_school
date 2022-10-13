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
    function index()
    {
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
       echo $password = md5($request->input('password'));

        $user_data = array(
        'email' => $email,
        'password' => $password
        );
        if(Admin::where($user_data)->exists())
        {
            return Redirect('home')->withErrors(['msg' => 'Login Succesful']);
        }else{
            echo "false";
        }

    //    $exist = Admin::firstOrFail()->where('email', $email);
    //    echo "<pre>";
    //    print_r($exist);
    }

    public function insert(AdminSignupRequest $request)
    {
        $validated = $request->validated();
        Admin::create([
        'admin_name'=>$request->admin_name,
        'email'=>$request->email,
        'password'=> md5($request->password)
       ]);
 
   
        }
}
