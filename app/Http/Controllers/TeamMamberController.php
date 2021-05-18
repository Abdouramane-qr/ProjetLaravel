<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
 
use DB;
use App\Http\Requests;
use Session;
Session_start();


class TeamMamberController extends Controller
{
  function AdminAuthCheck(){
  $admin_id = Session::get('admin_id');
  if($admin_id){
    return;
  }else{
    return Redirect::to('backsite')->send();
  }
}

     public function addteammember()
     {
        $this->AdminAuthCheck();
         return view('backsite.addteammember');
     }

    public function savemamber(Request $request)
    {
      $date=array();
      $date['member_name']=$request->member_name;
      $date['member_detels']=$request->member_detels;
      $date['member_type']=$request->member_type;

     $image= $request->file('member_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['member_image']= $image_url;

        DB::table('team_mambers')->insert($date);
      Session::put('massage','Team Mamber Inserted Successfully ! . ');
      return Redirect::to('add-team-member');
            }
            
        }

     
    
       }


   public function AllTeamMamber()
   {
      $this->AdminAuthCheck();
      $all_member =  DB::table('team_mambers')->orderby('member_id','dsce')->get();

      return view('backsite.AllTeamMamber')->with('all_member',$all_member);
   }

   public function  ActiveMember($member_id)
   {
     DB::table('team_mambers')->where('member_id',$member_id)->update(['member_status'=>1]);
     Session::put('massage','Team Member Is UnActive ! .');
     return Redirect::to('all-team-mamber');
   }

   public function  UnActiveMember($member_id)
   {
     DB::table('team_mambers')->where('member_id', $member_id)->update(['member_status'=>0]);
     Session::put('massage','Team Member Is Active ! .');
     return Redirect::to('all-team-mamber');
   }

   public function  deleteMember($member_id)
   {

    $images = DB::table('team_mambers')->where('member_id' ,$member_id)->get();

      foreach ($images as $image) {

       $image =  $image->member_image;
             unlink(public_path($image));
        }
  
     
        DB::table('team_mambers')->where('member_id', $member_id)->delete();  
    
      

     Session::put('massage','Team Member Is DELETE ! .');
     return Redirect::to('all-team-mamber');
   }

   public function  editMember($member_id)
   {
      $this->AdminAuthCheck();
     $edit_Member = DB::table('team_mambers')->where('member_id', $member_id)->first();
     return view('backsite.editMember')->with('edit_Member', $edit_Member);
   }

  public function updatemamber(Request $request , $member_id)
  {
    $date=array();

   $date['member_name']=$request->member_name;
    $date['member_detels']=$request->member_detels;
    $date['member_type']=$request->member_type;
    
     

          $image= $request->file('member_image');
        
        if($image){

          $images = DB::table('team_mambers')->where('member_id' ,$member_id)->get();
      foreach ($images as $img) {
            $img =  $img->member_image;
             unlink(public_path($img));
          
        }
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['member_image']= $image_url;

           DB::table('team_mambers')->where('member_id',$member_id)->update($date);
    Session::put('massage','Team Mamber Update Successfully ! . ');
    return Redirect::to('all-team-mamber');
            }
            
        }else{
         DB::table('team_mambers')->where('member_id',$member_id)->update($date);
    Session::put('massage','Team Mamber Update Successfully ! . ');
    return Redirect::to('all-team-mamber');
        }

 
  }


   public function ShowTeamMambermitfarm($member_id)
   {
    $edit_Member = DB::table('team_mambers')->where('member_id', $member_id)->first();
     return view('Show_Member')->with('show_Member', $edit_Member);
   }







}
