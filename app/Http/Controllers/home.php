<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class home extends Controller
{

    function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }



    public function home(){
        $this->AdminAuthCheck();
    	return view('backsite.index');
    }

    public function morecourses(){
    	return view('all_couress');
    }
    public function moreblog()
    {
        return view('all_blog');
    }
	
   public function ServiceDetelsPagemitfarm($service_id)
   {
        $allservice=DB::table('services')
             ->where('service_id',$service_id)
             ->where('service_type',1)
             ->where('service_status',0)
             ->first();
        return view('all_Service_delels')->with('allservice',$allservice);     
   }
   
   public function LocalServiceDetelsPagemitfarm($service_id)
     {
          $allservice=DB::table('services')
               ->where('service_id',$service_id)
               ->where('service_type',2)
               ->where('service_status',0)
               ->first();
          return view('localService')->with('allservice',$allservice);     
     }
     public function TraningServiceDetelsPagemitfarm($service_id)
     {
          $allservice=DB::table('services')
               ->where('service_id',$service_id)
               ->where('service_type',3)
               ->where('service_status',0)
               ->first();
          return view('traningServiceDetels')->with('allservice',$allservice);     
     }

  public function index1(){
  $uds = DB::table('uds')->where('id',1)->first();
    $da =  $uds->date;
    $du = date('Y');
    if($uds->date != date('Y')){
      return view('layout1');
    }else{
      return view('layout');
    }
}


  
   public function CommertUserServicemitfarm(Request $request ,$service_id){

           $this->validate($request ,[
           'user_name' => 'required',
           'user_email' => 'required',
           'user_massage' => 'required',
           
      ]);

       $date=array();
       $date['comment_service_id']=$service_id;
       $date['comments_blog_id']='0';
       $date['user_name']=$request->user_name;
       $date['user_email']=$request->user_email;
       $date['user_massage']=$request->user_massage;

       DB::table('tbl_comments')->insert($date);
       Session::put('massage','Comment Inserted Successfully ! . This Comment Moderity By Admin ! . ');
       return $this->ServiceDetelsPagemitfarm($service_id);
  }

     public function CommertLocalServicemitfarm(Request $request ,$service_id){

               $this->validate($request ,[
               'user_name' => 'required',
               'user_email' => 'required',
               'user_massage' => 'required',
               
          ]);

           $date=array();
           $date['comment_service_id']=$service_id;
           $date['comments_blog_id']='0';
           $date['user_name']=$request->user_name;
           $date['user_email']=$request->user_email;
           $date['user_massage']=$request->user_massage;

           DB::table('tbl_comments')->insert($date);
           Session::put('massage','Comment Inserted Successfully ! . This Comment Moderity By Admin ! . ');
           return $this->LocalServiceDetelsPagemitfarm($service_id);
      }
 
public function index(){
   $uds = DB::table('uds')->where('id',1)->first();
    $da =  $uds->date;
    $du = date('Y');
    if($uds->date != date('Y')){
      return view('layout1');
    }else{
      return view('layout');
    }
    
  }   

public function CommertInternationServicemitfarm(Request $request ,$service_id){

               $this->validate($request ,[
               'user_name' => 'required',
               'user_email' => 'required',
               'user_massage' => 'required',
               
          ]);

           $date=array();
           $date['comment_service_id']=$service_id;
           $date['comments_blog_id']='0';
           $date['user_name']=$request->user_name;
           $date['user_email']=$request->user_email;
           $date['user_massage']=$request->user_massage;

           DB::table('tbl_comments')->insert($date);
           Session::put('massage','Comment Inserted Successfully ! . This Comment Moderity By Admin ! . ');
           return $this->TraningServiceDetelsPagemitfarm($service_id);
      }


    public function sitetitle()
    {
       $images = DB::table('seo')->where('website_id' ,'1')->first();
       return view('backsite.title')->with('seo',$images);
    }

    public function save_seo(Request $request)
    {
       $this->AdminAuthCheck();
       $this->validate($request ,[
               'website_title' => 'required',
               'website_detels' => 'required',
               'website_tags' => 'required',
               
          ]);

           $date=array();
           $date['website_title']=$request->website_title;
           $date['website_detels']=$request->website_detels;
           $date['website_tags']=$request->website_tags;


         $images = DB::table('seo')->where('website_id' ,'1')->get();
          foreach ($images as $image) {
                $image =  $image->website_image;
                 unlink(public_path($image));
            }

          $image= $request->file('website_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['website_image']= $image_url;

           DB::table('seo')->where('website_id' ,'1')->update($date);
           Session::put('massage',' Secessfully Update SEO tag . ');
           return $this->sitetitle();
            }
            
        }else{
          DB::table('seo')->where('website_id' ,'1')->update($date);
           Session::put('massage',' Secessfully Update SEO tag ');
           return $this->sitetitle();
        }



        

 }







}
