<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class SliderController extends Controller
{
  function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }
    public function addslider(){
       $this->AdminAuthCheck();
    	return view('backsite.addslider');
    }

    public function saveslider(Request $request){
    	   $date=array();
           $date['slider_title']=$request->slider_title;

            $image= $request->file('slider_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['slider_image']= $image_url;

         DB::table('sliders')->insert($date);
           Session::put('massage','Slider Inserted Successfully ! . ');
           return Redirect::to('addslider');
            }
            
        }
   
   
    }

    
    public function allslider(){
       $this->AdminAuthCheck();
    	$allslider = DB::table('sliders')->orderby('slider_id','desc')->get();
    	return view('backsite.allslider')->with('allslider',$allslider);
    }

    
    public function activeslider($slider_id)
    {
    	DB::table('sliders')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
    	Session::put('massage','Your Slider Is UnActive ! .');
    	return Redirect::to('allslider');
    }

	public function unactiveslider($slider_id)
	    {
	    	DB::table('sliders')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
	    	Session::put('massage','Your Slider Is Active ! .');
	    	return Redirect::to('allslider');
	    }

	public function deleteslider($slider_id)
		    {
           $images = DB::table('sliders')->where('slider_id' ,$slider_id)->get();

            foreach ($images as $img) {

              $img =  $img->slider_image;
             unlink(public_path($img));
              }
		    	DB::table('sliders')->where('slider_id',$slider_id)->delete();
		    	Session::put('massage','Your Slider Is Delete ! .');
		    	return Redirect::to('allslider');
		    }
	public function editslider($slider_id)
	{
     $this->AdminAuthCheck();
		$editslider = DB::table('sliders')->where('slider_id',$slider_id)->first();
		return view('backsite.editslider')->with('editslider',$editslider);
	}	    

     public function updateslider(Request $request ,$slider_id){
    	   $date=array();
           $date['slider_title']=$request->slider_title;
           
           
          
     

          $image= $request->file('slider_image');
        
        if($image){

          $images = DB::table('sliders')->where('slider_id' ,$slider_id)->get();
      foreach ($images as $img) {
            $img =  $img->slider_image;
             unlink(public_path($img));
          
        }
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['slider_image']= $image_url;

           DB::table('sliders')->where('slider_id',$slider_id)->update($date);
           Session::put('massage','Slider Update Successfully ! . ');
           return Redirect::to('allslider');
            }
            
        }else{
         DB::table('sliders')->where('slider_id',$slider_id)->update($date);
           Session::put('massage','Slider Update Successfully ! . ');
           return Redirect::to('allslider');
        }


 
    }



//comment site .................................



  public function connentpage()
  {
     $this->AdminAuthCheck();
    $comment =  DB::table('tbl_comments')->orderby('comment_id','decs')->get();
    return view('backsite.comment')->with('comment',$comment);
  }
  
  public function activecomment($comment_id)
  {
     DB::table('tbl_comments')
       ->where('comment_id',$comment_id)
       ->update(['user_status'=>0]);
       
      Session::put('massage','Your Comment Is Active ! .');
      return Redirect::to('connent-page');
  }
  public function unactivecomment($comment_id)
    {
       DB::table('tbl_comments')
         ->where('comment_id',$comment_id)
         ->update(['user_status'=>1]);

        Session::put('massage','Your Comment Is UnActive ! .');
        return Redirect::to('connent-page');
    }

  public function deletecomment($comment_id)
      {
         DB::table('tbl_comments')
           ->where('comment_id',$comment_id)
           ->delete();

          Session::put('massage','Your Comment Is Delete ! .');
          return Redirect::to('connent-page');
      }

    public function viewcomment($comment_id)
    {
       $this->AdminAuthCheck();
    $comment =  DB::table('tbl_comments')
       ->where('comment_id',$comment_id)
       ->first();
      return view('backsite.viewcomment')->with('viewcomment',$comment);
    }  




// Massage site ................................/


  public function inboxpage()
    {
       $this->AdminAuthCheck();
    $inbox =  DB::table('tbl_contacks')
        ->orderby('id','dsce')
        ->get();
      return view('backsite.inbox')->with('inbox',$inbox);
    }

  public function activeinbox($id)
  {
      DB::table('tbl_contacks')
       ->where('id',$id)
       ->update(['type'=>1]);

     Session::put('massage','Your Massage Is Seen ! .');
    return Redirect::to('inbox-page');  
  }

   public function unactiveinbox($id)
    {
        DB::table('tbl_contacks')
         ->where('id',$id)
         ->update(['type'=>0]);

       Session::put('massage','Your Massage Is UnSeen ! .');
      return Redirect::to('inbox-page');  
    }

  public function deleteinbox($id)
      {
          DB::table('tbl_contacks')
           ->where('id',$id)
           ->delete();

         Session::put('massage','Your Massage Is Delete ! .');
        return Redirect::to('inbox-page');  
      }

   public function viewinbox($id)
   {
     $this->AdminAuthCheck();
    $inbox =  DB::table('tbl_contacks')
           ->where('id',$id)
           ->first();

    return view('backsite.viewinbox')->with('inbox',$inbox);
   }











}
