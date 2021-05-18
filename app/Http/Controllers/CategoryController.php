<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class CategoryController extends Controller
{
  function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }
    
    public function addcategory(){
       $this->AdminAuthCheck();
    	return view('backsite.add_category');
    }

    public function save_category(Request $request){
    	$date= array();
    	$date['category_name'] =$request->category_name;
    	$date['category_type'] =$request->category_type;

    	DB::table('categories')->insert($date);
    	Session::put('massage','Your Category is Inderted !.  ');
    	return Redirect::to('addcategory');

    }
  public function allcategory(){
     $this->AdminAuthCheck();
  	  $allcategory = DB::table('categories')->get();
  	  return view('backsite.allcategory')->with('allcategory' ,$allcategory);

  }
  public function activecategory($category_id){
        DB::table('categories')->where('category_id',$category_id)
              ->update(['category_status'=>1]);
        Session::put('massage','Category is UnActive ! .');
        return Redirect::to('allcategory');      
  }

 public function unactivecategory($category_id){
        DB::table('categories')->where('category_id',$category_id)
              ->update(['category_status'=>0]);
        Session::put('massage','Category is Active ! .');
        return Redirect::to('allcategory');      
  }

public function deletecategory($category_id){
        DB::table('categories')->where('category_id',$category_id)
              ->delete();
        Session::put('massage','Category is Delete ! .');
        return Redirect::to('allcategory');      
  }
public function editcategory($category_id){
   $this->AdminAuthCheck();
       $allcategory = DB::table('categories')->where('category_id',$category_id)
              ->first();
       return view('backsite.editcategory')->with('allcategory',$allcategory);      
  }

public function updatecategory(Request $request , $category_id){
   $this->AdminAuthCheck();
    	$date= array();
    	$date['category_name'] =$request->category_name;
    	$date['category_type'] =$request->category_type;

    	DB::table('categories')->where('category_id',$category_id)->update($date);
    	Session::put('massage','Your Category is Update !.  ');
    	return Redirect::to('allcategory');

    }

    public function BlogCategoryPagemitfarm($category_id){
      $allcategory = DB::table('categories')
                   ->where('category_id',$category_id)
                   ->join('blogs','blogs.blog_category_id','=', 'categories.category_id')
                   ->get();
       return view('blogCategory')->with('allcategory' ,$allcategory); 
    }


























}
