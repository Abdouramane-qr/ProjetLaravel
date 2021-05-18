<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
use Mail;
use App\Http\Requests;
use Session;
Session_start();

class GelleryController extends Controller
{
   public function gelleryphoto()
   {
        return view('backsite.addgalary');
   }

   public function savegellery(Request $request)
   {
       $this->validate($request ,[
           'phote_name' => 'required',
           'phote_image' => 'required',
           
     	]);


      $date=array();
       $date['phote_name']=$request->phote_name;
        

       $image= $request->file('phote_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['phote_image']= $image_url;

          DB::table('gelleries')->insert($date);

       Session::put('massage','Gellery Photo is Insert');

       return Redirect::to('gelleryphoto');
            }
            
        }
 
   }

   public function allgelleryphoto(){
   	$photo = DB::table('gelleries')->orderby('gellery_id','desc')->get();
   	return view('backsite.allgelleryphoto')->with('photo',$photo);
   }

  public function activephoto($gellery_id)
  {
  	DB::table('gelleries')
  	   ->where('gellery_id',$gellery_id)
  	   ->update(['phote_status'=>1]);
  	Session::put('massage','Your Photo Is UnActive');
  	return Redirect::to('allgelleryphoto');   
  }
 public function unactivephoto($gellery_id)
  {
  	DB::table('gelleries')
  	   ->where('gellery_id',$gellery_id)
  	   ->update(['phote_status'=>0]);
  	Session::put('massage','Your Photo Is Active');
  	return Redirect::to('allgelleryphoto');   
  }

 public function editphoto($gellery_id)
  {
  	$editphoto = DB::table('gelleries')
  	   ->where('gellery_id',$gellery_id)
  	   ->first();
 
  	return view('backsite.editphoto')->with('editphoto' , $editphoto);   
  }

   public function updategelleryphoto(Request $request , $gellery_id)
   {
   	  $this->validate($request ,[
           'phote_name' => 'required',
           
           
     	]);
   	  

         $date=array();

         $date['phote_name']=$request->phote_name;
  
          $image= $request->file('phote_image');

        
        if($image){

         $images = DB::table('gelleries')->where('gellery_id' ,$gellery_id)->get();
         foreach ($images as $img) {
            $img =  $img->phote_image;
             unlink(public_path($img));
          
        }
          
           $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['phote_image']= $image_url;

           DB::table('gelleries')->where('gellery_id' ,$gellery_id)->update($date);

       Session::put('massage','Gellery Photo is Update');

       return Redirect::to('allgelleryphoto');
            }
            
        }else{
         DB::table('gelleries')->where('gellery_id' ,$gellery_id)->update($date);

       Session::put('massage','Gellery Photo is Update');

       return Redirect::to('allgelleryphoto');
        }

 }

   public function deletephoto($gellery_id)
   {
   	$images = DB::table('gelleries')->where('gellery_id' ,$gellery_id)->get();

   	  foreach ($images as $image) {

          $image =  $image->phote_image;
             unlink(public_path($image));
        }

   	DB::table('gelleries')->where('gellery_id',$gellery_id)->delete();

   	Session::put('massage','Gellery Photo is Delete');

       return Redirect::to('allgelleryphoto');
   }

   public function SeeMorePhotomitfarm(){
     return view('allphoto');
   }








}
