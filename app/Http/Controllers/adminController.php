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
            $request->session()->put('admin_image',$user->image_name);
            $request->session()->put('admin_id',$user->id);
			$request->session()->save();
			return Redirect('teachers')->withErrors(['msg' => 'Login Succesful']);
        }

    }

    public function insert(AdminSignupRequest $request)
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
       $destinationPath = 'admins_images';
       $record =  $file->move($destinationPath,$file->getClientOriginalName());
      // dd($record);

        $validated = $request->validated();
        Admin::create([
        'admin_name'=>$request->admin_name,
        'email'=>$request->email,
        "image_name" =>$file_name,
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

        public function profile(Request $request)
        {
           // ss($request->session()->all());
         $admin_id = $request->session()->get('admin_id');
         $data = Admin::find($admin_id);
         return view('profile',array('data'=> $data));
        }
        public function update_admin(Request $request)
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
          $destinationPath = 'admins_images';
          $record =  $file->move($destinationPath,$file->getClientOriginalName());
         }
           $id = $request->id;
           if($request->password)
           {
            $password = md5($request->password);
            Admin::where('id',$id)->update([
                'admin_name'=>$request->admin_name,
                "image_name" =>$file_name,
                'password'=> $password
               ]);
           }else
           {
            Admin::where('id',$id)->update([
                'admin_name'=>$request->admin_name,
                "image_name" =>$file_name
               ]);
           }
           $request->session()->put('admin_name',$request->admin_name);
           $request->session()->put('admin_image',$file_name);
           $request->session()->save();
           return redirect('profile');
        }
}
