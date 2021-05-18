
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
		 <h2>Login</h2>

		 <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?> 

		 <div class="col-md-6 log">			 
				 
				<form action="{{route('Login-Customer-mitfarm')}} " method="post">
		        	{{csrf_field()}}

					 <h5>User Email:</h5>	
					 
					 <input type="text"  name="customer_email" required="" placeholder="Email Address"/>
					 <h5>Password:</h5>
					<input type="Password" name="customer_password" placeholder="Enter Password" required="" />				
					 <input type="submit" value="Login">
					  <a href="{{route('froget-password')}} ">Forgot Password ?</a>
				 </form>				 
		 </div>
		  <div class="col-md-6 login-right">
			  	<h3>NEW REGISTRATION</h3>
				<p>If You New Coustmer . so You Need A new account . </p>
				<a class="acount-btn" href="{{route('New-Customer-Registration-mitfarm')}}">Create an Account</a>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!----> 
	
 @endsection