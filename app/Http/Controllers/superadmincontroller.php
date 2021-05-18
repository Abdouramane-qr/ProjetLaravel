<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class superadmincontroller extends Controller
{
   function logout(){
   	$this->AdminAuthCheck();
   	
    	Session::flush();
    	return Redirect::to('backsite');
    }

    function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }
}
