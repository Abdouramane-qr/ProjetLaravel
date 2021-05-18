<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Mail;
use App\Mail\sendmail;
use App\Http\Requests;
use Session;
Session_start();

class ChackOutController extends Controller
{

	function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }

   public function LoginPagemitfarm()
   {
   	  return view('chackout');
   }

   public function NewCustomerRegstionmitfarm()
   {
   	  return view('regstion');
   }
  
 public function VerifyAccountMitfarm(){
  return view('verifycode');
 }

   public function CustomerRegstionmitfarm(Request $request)
   {
        $this->validate($request ,[
           'customer_photo' => 'required',
           'customer_name' => 'required',
           'customer_email' => 'required',
           
           'customer_phone' => 'required',
           'customer_city' => 'required',
     	]);

      $date=array();
       
       $date['customer_name']=$request->customer_name;
       $date['customer_email']=$request->customer_email;
       $date['customer_password']=md5('00P00P');
       $date['customer_phone']=$request->customer_phone;
       $date['customer_city']=$request->customer_city;
       $date['code']=rand();
       
    $email =  DB::table('tbl_customer')
           ->where('customer_email',$request->customer_email)
           ->limit(1)
           ->first();  

        $image= $request->file('customer_photo');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['customer_photo']= $image_url;

      if($email != false){

          Session::put('massage','This Email Is Allredy Use .');
         return Redirect::to('New-Customer-Registration-mitfarm');

      }elseif(!filter_var($request->customer_email,FILTER_VALIDATE_EMAIL)){ 

        Session::put('massage','Email address is not validate  .');
        
         return Redirect::to('New-Customer-Registration-mitfarm');
      }else{
      $customer_id= DB::table('tbl_customer')->insertGetId($date);

      Mail::send('email.contack' ,$date,function($massage) use ($date)
      {
        $massage->to($date['customer_email']);
        $massage->Subject($date['customer_name']);
        $massage->from('gaziparvez452@gmail.com','PG Templates');

      });
      
      return Redirect::to('Verify-Account-Mitfarm');
      } }}
     
     
   }

   public function vefriyCustomermitfarm(Request $request)
   {
     $this->validate($request ,[
          'customer_password' => 'required',
       ]);
      $date=array();
      $date['customer_password']=md5($request->customer_password);
      $date['code']=$request->code;

      $code =  DB::table('tbl_customer')
           ->where('code',$request->code)
           ->limit(1)
           ->first();

      if($code == true){
        
          DB::table('tbl_customer')->update($date);
        
         Session::put('customer_id', $code->customer_id);
          Session::put('customer_name', $code->customer_name);
          Session::put('customer_email', $code->customer_email);

           return Redirect::to('Show-Cart-mitfarm');
      }else{
           Session::put('massage','Your Email Verity Code is not Mach !.');

            return Redirect::to('Verify-Account-Mitfarm');
      }     

   }
   public function LogoutPagemitfarm()
   {
    Session::flush();

     return Redirect::to('Login-Page-mitfarm');

   }

   public function LoginCustomermitfarm(Request $request)
   {

   	 $this->validate($request ,[
        
           'customer_email' => 'required',
           'customer_password' => 'required',
         
     	]);

   
    $customer_email    =$request->customer_email;
    $customer_password =md5($request->customer_password);

   	$customer = DB::table('tbl_customer')
   	          ->where('customer_email' ,$customer_email)
   	          ->where('customer_password', $customer_password)
   	          ->first();
   	          
   	          

   	    if($customer)
   	    {
   	    	Session::put('customer_id', $customer->customer_id);
          Session::put('customer_name', $customer->customer_name);
   	    	Session::put('customer_email', $customer->customer_email);

           return Redirect::to('Show-Cart-mitfarm');
   	    }else{

   	    Session::put('massage','Email or Password Invalid');

   	    	 return Redirect::to('Login-Page-mitfarm');
   	    }      
   }

   function AdminCheck(){
      $admin_id = Session::get('customer_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('Login-Page-mitfarm')->send();
      }
    }

    public function ShowCart()
   {
     
      $contents = Cart::content();
       
      foreach ($contents as $vcontent) {
            $date = $vcontent->id;

            if($date){
               return;
            }
           }    
        return Redirect::to('mitfarm-home')->send();        
   }

    function CartCheck(){
  
     $contents = Cart::content();
       
     $date=array();

        foreach ($contents as $vcontent) {
            $date['product_id']= $vcontent->id;

            if($vcontent){
              return;	
            }
           }  

      return Redirect::to('mitfarm-home')->send();
      
    }

   public function PaymentPagemitfarm()
   {
   	 
   	$this->AdminCheck();
   	$this->ShowCart();
   	return view('payment'); 
   }


  public function SuccessPagemitfarm(){
  		$this->AdminAuthCheck();
  		 
  		return view('success'); 
  }


   public function OrderPagemitfarm()
   {
   		$this->AdminCheck();
       $customer = Session::get('customer_id'); 
        
       
      $sheping_id =  DB::table('shepping')->orderby('sheping_id','desc')->first();  
        
 
         $contents = Cart::content();
       
     $date=array();

        foreach ($contents as $vcontent) {
       
       
             $date['product_id']= $vcontent->id;
             $date['customer_id']= $customer;
           	 $date['sheping_id']= $sheping_id->sheping_id;
             $date['or_product_name'] = $vcontent->name;
           	 $date['or_product_image']= $vcontent->options->image;
           	 $date['or_product_qty'] = $vcontent->qty;
           	 $date['or_product_price'] = $vcontent->price;
           	 $date['or_product_total'] = $vcontent->total;
           	 $date['order_type'] = "Hand Cash";

             DB::table('tbl_orders')->insert($date);
            
            
           
      }
        Cart::destroy();
        return Redirect::to('Success-Page-mitfarm'); 

       Mail::send('email.oreder' ,$date,function($massage) use ($date)
              {
               $massage->to('gaziparvez452@gmail.com');
                
                $massage->Subject( ' Sent Customer Order ');
                $massage->from('gaziparvez452@gmail.com');

              });  

 
         
}
   
   public function CustomerProfilemitfarm()
   {
    $this->AdminCheck();
      $customer = Session::get('customer_id');

    $customer = DB::table('tbl_customer')->where('customer_id', $customer)->first();

     return view('profile')->with('customer',$customer);
   }



  public function UpdateProfilemitfarm(){

    $this->AdminCheck();
   $customer_id = Session::get('customer_id');

   $update = DB::table('tbl_customer')->where('customer_id' , $customer_id)->first();

    return view('updateporfile')->with('updateprofile', $update);
  }

  public function UpdatePageProfileMitfarm(Request $request){
    $this->AdminCheck();
     $customer_id = Session::get('customer_id'); 
      $date=array();
       $date['customer_name']=$request->customer_name;
       $date['customer_phone']=$request->customer_phone;
       $date['customer_city']=$request->customer_city;

          $image= $request->file('customer_photo');
        
        if($image){

          $images = DB::table('tbl_customer')->where('customer_id' ,$customer_id)->get();

            foreach ($images as $imag) {
            $imag =  $imag->customer_photo;
             unlink(public_path($imag));
          
        }
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['customer_photo']= $image_url;
         
          
     $update = DB::table('tbl_customer')->where('customer_id',$customer_id)->update($date);
    Session::put('massage','Your Profile Is Update .');
   return Redirect::to('Update-Profile-mitfarm');
 
        }

    }else{
     $update = DB::table('tbl_customer')->where('customer_id',$customer_id)->update($date);
    Session::put('massage','Your Profile Is Update .');
   return Redirect::to('Update-Profile-mitfarm');
    }

  
      
  }

  public function ContickProfilemitfarm()
  {
    return view('contack');
  }

  public function contactUsermitfarm(Request $request)
  {
    $date=array();
       $date['name']=$request->name;
       $date['email']=$request->email;
       $date['massage']=$request->massage;
       

     DB::table('tbl_contacks')->insert($date);
     Session::put('massage','You Massage Sent .');

     

     return Redirect::to('Contick-Page-mitfarm'); 
  }

 public function AddBlogsPostProfilemitfarm(){
     $this->AdminCheck();
     
    return view('adduserpost');
   }


   public function Deleteordermitfarm($order_id){
    $this->AdminCheck();
     $customer_id = Session::get('customer_id');
    DB::table('tbl_orders')
       ->where('customer_id',$customer_id)
       ->where('order_id',$order_id)
       ->delete();

     return $this->CustomerProfilemitfarm();  
   }

   public function pandingorder(){
      $this->AdminAuthCheck();
    $order =  DB::table('tbl_orders')
           ->join('tbl_customer','tbl_customer.customer_id','=','tbl_orders.customer_id')
           ->where('order_pandding',0)
           ->orderby('order_id','dsce')
           ->get();
    return view('backsite.order')->with('order',$order);
   }

   public function vieworder($sheping_id)
   {
     $this->AdminAuthCheck();
     $order =  DB::table('tbl_orders')
            ->where('sheping_id',$sheping_id)
            ->where('order_pandding',0)
           ->first();
    return view('backsite.veworder')->with('orders',$order);
   }
 
   public function orderpade($sheping_id)
   { 
     $this->AdminAuthCheck();
    
      DB::table('tbl_orders')->where('sheping_id',$sheping_id)
              ->update(['order_pandding'=>1]);
        Session::put('massage','Customer Order Product Is Pade.');

        return $this->pandingorder(); 
   }

  public function allpadeorder()
  {
  
      $this->AdminAuthCheck();
    $order =  DB::table('tbl_orders')
           ->join('tbl_customer','tbl_customer.customer_id','=','tbl_orders.customer_id')
           ->where('order_pandding',1)
           ->get();
    return view('backsite.allpadeorder')->with('order',$order);
  }

  public function deletepadeorder($order_id)
  {
    DB::table('tbl_orders')
           ->where('order_id',$order_id)
           ->delete();
      Session::put('massage','This Order is delete');     
     return Redirect::to('allpadeorder');      
  }
  public function viewpadeorder($customer_id)
  {
    $this->AdminAuthCheck();
     $order =  DB::table('tbl_orders')
           ->join('tbl_customer','tbl_customer.customer_id','=','tbl_orders.customer_id')
           ->where('order_pandding',1)
           ->where('tbl_customer.customer_id', $customer_id)
           ->get();
    return view('backsite.viewpadeorder')->with('order',$order);
  }


public function frogetpassword(){
  return view('forgert');
}

public function frogetpasswordsent(Request $request){
      $this->validate($request ,[
               'customer_email' => 'required',
           ]);
   
           $customer_email=$request->customer_email;

        $user = DB::table('tbl_customer')
              ->where('customer_email' ,$customer_email)
              ->limit(1)
              ->first();

        $date=array();
           $date['customer_email']=$request->customer_email;
         
          $code = rand();

         $date['code'] = $code;

           DB::table('tbl_customer')
              ->where('customer_email' ,$customer_email)
              ->update($date);


           if($user){

              Mail::send('email.forgote',$date,function($massage) use ($date)
              {
                $massage->to($date['customer_email']);
                $massage->Subject('Forgote Password');
                $massage->from('gaziparvez452@gmail.com');

              });
              Session::put('massage','Place chack your email');
              return  Redirect::to('Verify-Account-Mitfarm');

           }else{
            Session::put('massage','Your Email Is No Mach!');
             return  Redirect::to('froget-password');
           }
}




}
