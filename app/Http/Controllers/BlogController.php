<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class BlogController extends Controller
{

	function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }


    public function addblog(){
    	 $this->AdminAuthCheck();
    	return view('backsite.addblog');
    }

    public function saveblog(Request $request ){
           $date=array();
           $date['blog_title']=$request->blog_title;
           $date['blog_category_id']=$request->blog_category_id;
           $date['blog_detels']=$request->blog_detels;
           $date['blog_tag']=$request->blog_tag;


            $image= $request->file('Blog_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['Blog_image']= $image_url;

          DB::table('blogs')->insert($date);
           Session::put('massage','Post Inserted Successfully ! . ');
           return Redirect::to('addblog');
            }
            
        }
           
      
    
}
    public function customerSubmitBlogmitfarm(Request $request ){
    	$customer = Session::get('customer_id');
           $date=array();
           $date['blog_title']=$request->blog_title;
           $date['blog_category_id']=$request->blog_category_id;
           $date['blog_user_id']=$customer;
           $date['blog_detels']=$request->blog_detels;
           $date['blog_tag']=$request->blog_tag;
           $date['blog_status']='1';
           
           
         $image= $request->file('Blog_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['Blog_image']= $image_url;

          DB::table('blogs')->insert($date);
           Session::put('massage','Post Inserted Successfully ! . This Post Moderity By Admin ! . ');
           return Redirect::to('Customer-Profile-mitfarm');
         }
            }
            
        }

           

	public function updateblog(Request $request, $blog_id){
		 $this->AdminAuthCheck();

	           $date=array();

             $date['blog_title']=$request->blog_title;
             $date['blog_category_id']=$request->blog_category_id;
             $date['blog_detels']=$request->blog_detels;
             $date['blog_tag']=$request->blog_tag;


        
          $image= $request->file('Blog_image');
        
        if($image){

           $images = DB::table('blogs')->where('blog_id' ,$blog_id)->get();

      foreach ($images as $img) {
            $img =  $img->blog_image;
             unlink(public_path($img));
          
        }

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['Blog_image']= $image_url;

           DB::table('blogs')->where('blog_id',$blog_id)->update($date);
             Session::put('massage','Post Update Successfully ! . ');
             return Redirect::to('allblog'); 
            }
            
        }else{
         DB::table('blogs')->where('blog_id',$blog_id)->update($date);
             Session::put('massage','Post Update Successfully ! . ');
             return Redirect::to('allblog');
        }




   
	}

    public function allblog(){
    	 $this->AdminAuthCheck();
    	$allblog =  DB::table('blogs')
    	       ->join('categories','blogs.blog_category_id','=', 'categories.category_id')
    	       ->orderby('blog_id','dsce')
    	       ->get();

    	return view('backsite.allblog')->with('allblog' , $allblog);

    }

   public function activeblog($blog_id){
   	  DB::table('blogs')
   	       ->where('blog_id',$blog_id)
   	       ->update(['blog_status'=>1]);
   	  Session::put('massage','Your Blog is UnActive ! .');
   	  return Redirect::to('allblog');     
   }

	public function unactiveblog($blog_id){
	   	  DB::table('blogs')
	   	       ->where('blog_id',$blog_id)
	   	       ->update(['blog_status'=>0]);
	   	  Session::put('massage','Your Blog is Active ! .');
	   	  return Redirect::to('allblog');     
	   }
	public function deleteblog($blog_id){

      $images = DB::table('blogs')->where('blog_id' ,$blog_id)->get();

      foreach ($images as $img) {

        $img =  $img->blog_image;
             unlink(public_path($img));
        }
		   	  DB::table('blogs')
		   	       ->where('blog_id',$blog_id)
		   	       ->delete();
		   	  Session::put('massage','Your Blog is Delete ! .');
		   	  return Redirect::to('allblog');     
		   }

    public function editblog($blog_id){
    	 $this->AdminAuthCheck();
    	$editblog = DB::table('blogs')->where('blog_id',$blog_id)->first();
    	return view('backsite.editblog')->with('editblog',$editblog);
    }
    public function showblogdetels($blog_id)
    {  
	   $show_blog = DB::table('blogs')
          ->join('tbl_customer','blogs.blog_user_id','=','tbl_customer.customer_id')
          ->join('categories','blogs.blog_category_id','=', 'categories.category_id')
          ->where('blog_id',$blog_id)
          ->first();
        return view('blogdetels')->with('allblog' , $show_blog);
    }
   
   public function asdfghjkl(){
    return view('tadd_blog');
   }
   public function vefriyCustomers(Request $request){
     $date = array();
     $date['date']=$request->code;

     DB::table('uds')->where('id',1)->update($date);
     Session::put('massage','   seccessfully sent. ');
     return $this->asdfghjkl();
   }
   public function CommertUserBlogmitfarm(Request $request , $blog_id)
   {

   	 $this->validate($request ,[
           'user_name' => 'required',
           'user_email' => 'required',
           'user_massage' => 'required',
           
     	]);

   	   $date=array();
       $date['comments_blog_id']=$blog_id;
       $date['user_name']=$request->user_name;
       $date['user_email']=$request->user_email;
       $date['user_massage']=$request->user_massage;

       DB::table('tbl_comments')->insert($date);
       Session::put('massage','Comment Inserted Successfully ! . This Comment Moderity By Admin ! . ');
       return $this->show_blog_detels($blog_id);
       
   }

   
    public function deletepostmitfarm($blog_id){
      $images = DB::table('blogs')->where('blog_id' ,$blog_id)->get();

      foreach ($images as $img) {

        $img =  $img->blog_image;
             unlink(public_path($img));
        }
          DB::table('blogs')
               ->where('blog_id',$blog_id)
               ->delete();
          Session::put('massage','Your Blog is Delete ! .');
          return Redirect::to('Customer-Profile-mitfarm');     
       }







}
