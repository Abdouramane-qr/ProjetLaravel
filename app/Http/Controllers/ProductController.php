<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Http\Requests;
use Session;
Session_start();

class ProductController extends Controller
{
  function AdminAuthCheck(){
      $admin_id = Session::get('admin_id');
      if($admin_id){
        return;
      }else{
        return Redirect::to('backsite')->send();
      }
    }

   public function AddProduct()
   {
   	return view('backsite.AddProduct');
   }


  public function save_product(Request $request)
  {
  	 $date=array();
           $date['product_title']=$request->product_title;
           $date['product_detels']=$request->product_detels;
           $date['product_tags']=$request->product_tags;
           $date['product_price']=$request->product_price;
           $date['product_category_id']=$request->product_category_id;



            $image= $request->file('product_image');
        
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['product_image']= $image_url;

         DB::table('products')->insert($date);
           Session::put('massage','Product Inserted Successfully ! . ');
           return Redirect::to('Add-Product');
            }
            
        }
           
          

           
    
  }

   public function AllProduct()
   {
   	$all_product = DB::table('products')
   	->join('categories','products.product_category_id','=','categories.category_id')
   	->orderby('product_id','desc')
   	->get();
   	return view('backsite.allProduct')->with('all_product',$all_product);
   }

   public function activeProduct($product_id)
   {
   	  DB::table('products')->where('product_id',$product_id)->update(['product_status'=>1]);
   	  Session::put('massage', 'Product Is UnActive ! .');
   	  return Redirect:: to('All-Product');
   }
	public function unactiveProduct($product_id)
	   {
	   	  DB::table('products')->where('product_id',$product_id)->update(['product_status'=>0]);
	   	  Session::put('massage', 'Product Is Active ! .');
	   	  return Redirect:: to('All-Product');
	   }

	public function deleteProduct($product_id)
		   {
		     $images = DB::table('products')->where('product_id' ,$product_id)->get();

      foreach ($images as $img) {
            $img =  $img->product_image;
             unlink(public_path($img));
          
        }
		   	  DB::table('products')->where('product_id',$product_id)->delete();
		   	  Session::put('massage', 'Product Is Delete ! .');
		   	  return Redirect:: to('All-Product');
		   }

	public function EditProduct($product_id)
			   {
			   	$edit_product =  DB::table('products')
			   	              ->where('product_id',$product_id)
			                  ->first();
			   	 return view('backsite.editProduct')->with('edit_product' , $edit_product);
			   }

	public function update_product($product_id ,Request $request)
			   {
				   $date=array();
		           $date['product_title']=$request->product_title;
		           $date['product_detels']=$request->product_detels;
		           $date['product_tags']=$request->product_tags;
		           $date['product_price']=$request->product_price;
		           $date['product_category_id']=$request->product_category_id;


            

     

          $image= $request->file('product_image');
        
        if($image){
      
       $images = DB::table('products')->where('product_id' ,$product_id)->get();
           foreach ($images as $img) {
            $img =  $img->product_image;
             unlink(public_path($img));
          
        }

            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullName = $image_name.'.'. $ext;
            $upload_path = 'image/';
            $image_url= $upload_path.$image_fullName;
            $secc=$image->move($upload_path,$image_fullName);
            if($secc){
                $date['product_image']= $image_url;

           DB::table('products')->where('product_id',$product_id)->update($date);
		           Session::put('massage','Product Update Successfully ! . ');
		           return Redirect::to('All-Product'); 
            }
            
        }else{
         DB::table('products')->where('product_id',$product_id)->update($date);
		           Session::put('massage','Product Update Successfully ! . ');
		           return Redirect::to('All-Product');
        }


			   }


     public function ShowAllProductsmitfarm()
     {
          return view('all_product');
     } 

    public function ShowProductsdetelsmitfarm($product_id)
    {
    		$show_product_detels =  DB::table('products')
    		            ->join('categories','products.product_category_id','=','categories.category_id')
			   	        ->where('product_id',$product_id)
			            ->first();
		   return view('product_detels')->with('show_product_detels' , $show_product_detels);
    
    }


   public function ViewProductCategorymitfarm($category_id)
   {
    $product =	DB::table('products')
             ->join('categories','products.product_category_id','=','categories.category_id')
             ->where('category_id',$category_id)
             ->get();

   	return view('preductcategoryshow')->with('product',$product);
   }


 public function shepingorderpage(){
  return view('seping');
 }


  public function savesheppingaddress(Request $request){
    $customer = Session::get('customer_id');
       $date=array();
               $date['sheping_name']=$request->sheping_name;
               $date['sheping_phone']=$request->sheping_phone;
               $date['sheping_adders']=$request->sheping_adders;
               $date['sheping_zip']=$request->sheping_zip;
               $date['sheping_city']=$request->sheping_city;
               $date['sheping_country']=$request->sheping_country;
               $date['sheping_customer_id']=$customer;

            DB::table('shepping')->insert($date); 
    $code =  DB::table('shepping')->where('sheping_customer_id',$customer)->first(); 

      Session::put('sheping_id', $code->sheping_id);
      return Redirect::to('Payment-Page-mitfarm'); 
  }





}
