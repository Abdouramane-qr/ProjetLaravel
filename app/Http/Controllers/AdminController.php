<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class AdminController extends Controller
{
    public function backsite(){
    	return view('admin_login');
    }

    function deshbord(Request $request){
        
	   $this->validate($request,[
         'admin_email' => 'required',
         'admin_password' => 'required',
	   ]);

	   $admin_email = $request->admin_email;
	   $admin_password = md5($request->admin_password);

       $result=DB::table('admins')
             ->where('admin_email' ,$admin_email)
             ->where('admin_password' , $admin_password)
             ->first();

         if($result){
           Session::put('admin_name',$result->admin_name);
           Session::put('admin_id',$result->admin_id);
           return Redirect::to('/home');
         }else{
         	Session::put('massage','Email or Password Invalid');
         	return view('admin_login');
         }
	}

	function logout(){
    	Session::flush();
    	return Redirect::to('backsite');
    }

}
