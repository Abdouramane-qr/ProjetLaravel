<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use App\Http\Requests;
use Session;
Session_start();

class CartController extends Controller
{
   public function addtocartmitfarm(Request $request)
   {
      $qty=$request->qty;
      $product_id=$request->product_id;

      $addcart=DB::table('products')
              ->where('product_id',$product_id)
              ->first();

      $date= array() ;
      $date['qty']= $qty;
      $date['id'] =$addcart->product_id;      
      $date['name'] =$addcart->product_title;      
      $date['price'] =$addcart->product_price;      
      $date['options']['image'] =$addcart->product_image;   

    Cart::add($date);

    Session::put('total', Cart::total());
    
     return Redirect::to('Show-Cart-mitfarm');

   }



   public function ShowCart()
   {
      $showcategory = DB::table('categories')
                    ->where('category_status',1)
                    ->get();
      $contents = Cart::content();
       
      foreach ($contents as $vcontent) {
            $date = $vcontent->id;

            if($date){
               return view('addtocart')->with('addcart',$showcategory);
            }
           }    
        return Redirect::to('mitfarm-home')->send();        
   }

  public function DeleteCartmitfarm($rowId)
{
	Cart::update($rowId,0);
	
	return Redirect::to('Show-Cart-mitfarm');

}

   public function UpdateCartmitfarm(Request $request , $rowId)
   {
   	  $date=array();
   	  $date['qty']=$request->qty;

   	  Cart::update($rowId, $date);
	
	  return Redirect::to('Show-Cart-mitfarm');
   }



















}
