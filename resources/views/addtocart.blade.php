  @extends('welcome')
@section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title>add to cart || {{$images->website_title}} || mitfarm </title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')
 <br><br><br>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<div class="cart_main">
	 <div class="container" style="text-align: left;">
			 			
		 <div class="cart-items">
			 <h2>My Shopping Bag </h2>
				
			 <div class="cart-header">
				
	<?php 


   $content = Cart::content();

 

    $i=0;
    $sum =0;
   foreach ($content as $v_content) {
    $i++;
?>			

           
				 <div class="cart-sec">
						<div class="cart-item cyc">
							 <img src="{{URL($v_content->options->image)}}"/>
						</div>
					   <div class="cart-item-info">
							 <h3>{{$v_content->name}}  </h3>
							 <h4 class="font" ><span>Rs.  </span>{{$v_content->price}} tk</h4>
							 <form action="{{route('Update-Cart-mitfarm',$v_content->rowId)}} " method="post">
                              	{{csrf_field()}}
							 <p class="qty">Qty ::</p>
							 <input  type="number" id="quantity" name="qty" value="{{$v_content->qty}}" class="form-control input-small">

                            <input type="submit" value="Update">
                            </form>
							  <h4 class="font"><span>Total.  </span>{{$v_content->total}} tk</h4>

							   <a class="btn btn-danger" onclick="return confirm('ARE YOU SURE TO DELET');" href="{{URL('Delete-Cart-mitfarm/'.$v_content->rowId)}} "> Delete </a>
					   </div>
					   <div class="clearfix"></div>
											
				  </div>

				  <?php

                 $sum = $v_content->qty+$sum;

                 Session::put('sum',$sum);



				   } ?>	
			 </div>
			 
			 		
		 </div>
		 
		 <div class="cart-total">
			 <a class="continue" href="{{route('Show-All-Products-mitfarm')}}">Continue to Shoping</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="font" class="total">{{ Cart::subtotal() }} </span>
				 <span>Discount</span>
				 <span class="total">--- </span>
				 <span>Delivery Charges</span>
				 <span class="total">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <h4 class="last-price">TOTAL</h4>
			 <span class="font" class="total final">{{ Cart::total() }} tk</span>
			 <div class="clearfix"></div>
            <?php 
                  $customer = Session::get('customer_id');

                  
                ?>    
                 
          @if($customer)

			 <a class="order" href="{{route('sheping-order-page')}}">Order Place</a>
			  @else
			   <a class="order" href="{{route('Login-Page-mitfarm')}}"> Check Out</a>
			   @endif
			</div>
	 </div>
</div>


 @endsection