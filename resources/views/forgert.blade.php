
  @extends('welcome')

    @section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title>mitfarm Login page {{$images->website_title}} || mitfarm</title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <div class="login_sec">
	 <div class="container" style="text-align: left;">
		 <br> <br> <br>
		 <h2>Forget Password</h2>

		 <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?> 

		 <div class="col-md-6 log">			 
				 
				<form action="{{route('froget-password-sent')}} " method="post">
		        	{{csrf_field()}}

					 <h5>Your Email:</h5>	
					 
					 <input type="text"  name="customer_email" required="" placeholder="Your Email Address"/>
									
					 <input type="submit" value="sent">
					
				 </form>				 
		 </div>
		 
		 <div class="clearfix"></div>
	 </div>
</div>
<!----> 
	
 @endsection