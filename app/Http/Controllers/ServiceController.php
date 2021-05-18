<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class ServiceController extends Controller
{
   function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }
    public function add_service(){
       $this->AdminAuthCheck();
    	return view('backsite.add_service');
    }

    public function saveservice(Request $request){
           $date=array();
           $date['service_title']=$request->service_title;
           $date['service_detels']=$request->service_detels;
           $date['service_type']=$request->service_type;
           
         

            $image= $request->file('service_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['service_image']= $image_url;

           DB::table('services')->insert($date);
           Session::put('massage','Serviec Inserted Successfully ! . ');
           return Redirect::to('add_service'); 
            }
            
        }
    
}
    public function all_service(){
       $this->AdminAuthCheck();
    $all_service =  DB::table('services')->orderby('service_id','dsce')->get();
      return view('backsite.all_service')->with('all_service',$all_service);
    }
    
    public function activeservice($service_id){
      DB::table('services')->where('service_id',$service_id)->update(['service_status'=>1]);
      Session::put('massage','Your Service is UnActive .');
       return Redirect::to('all_service'); 
    }
    public function unactiveservice($service_id){
          DB::table('services')->where('service_id',$service_id)->update(['service_status'=>0]);
          Session::put('massage','Your Service is Active .');
           return Redirect::to('all_service'); 
        }

    public function deleteservice($service_id){

       $images = DB::table('services')->where('service_id' ,$service_id)->get();

      foreach ($images as $img) {
            $img =  $img->service_image;
             unlink(public_path($img));
          
        }
         
            DB::table('services')
                ->where('service_id',$service_id)
                ->delete();

            Session::put('massage','Your Service is Delete .');
             return Redirect::to('all_service'); 
          }
    public function editservice($service_id){
       $this->AdminAuthCheck();
     $editservice = DB::table('services')
           ->where('service_id',$service_id)
           ->first();
      return view('backsite.edit_service')->with('editservice',$editservice);     
    }
    
    public function updateservice(Request $request , $service_id){

      $date=array();
           $date['service_title']=$request->service_title;
           $date['service_detels']=$request->service_detels;
           $date['service_type']=$request->service_type;
           
          

        

          $image= $request->file('service_image');
        
        if($image){

          $images = DB::table('services')->where('service_id' ,$service_id)->get();

      foreach ($images as $img) {
            $img =  $img->service_image;
             unlink(public_path($img));
          
        }
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['service_image']= $image_url;

           $editservece = DB::table('services')
                      ->where('service_id',$service_id)
                      ->update($date);
            Session::put('massage','Your Service is Update ! .');
            return Redirect::to('all_service');  
            }
            
        }else{
          $editservece = DB::table('services')
                      ->where('service_id',$service_id)
                      ->update($date);
          Session::put('massage','Your Service is Update ! .');
          return Redirect::to('all_service'); 
        }

}








 

  












}