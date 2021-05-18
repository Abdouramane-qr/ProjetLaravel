
@extends('welcome')

@section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title>add user post || {{$images->website_title}} || mitfarm </title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <div class="container">
    <br><br><br>
   <div class="registration">
     <div class="registration_left">

       <h2>Add User Post </h2>

       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?> 

       <!-- [if IE] 
        < link rel='stylesheet' type='text/css' href='ie.css'/>  
       [endif] -->  
        
       <!-- [if lt IE 7]>  
        < link rel='stylesheet' type='text/css' href='ie6.css'/>  
       <! [endif] -->  
       <script>
        (function() {
      
        // Create input element for testing
        var inputs = document.createElement('input');
        
        // Create the supports object
        var supports = {};
        
        supports.autofocus   = 'autofocus' in inputs;
        supports.required    = 'required' in inputs;
        supports.placeholder = 'placeholder' in inputs;
      
        // Fallback for autofocus attribute
        if(!supports.autofocus) {
          
        }
        
        // Fallback for required attribute
        if(!supports.required) {
          
        }
      
        // Fallback for placeholder attribute
        if(!supports.placeholder) {
          
        }
        
        // Change text inside send button on submit
        var send = document.getElementById('register-submit');
        if(send) {
          send.onclick = function () {
            this.innerHTML = '...Sending';
          }
        }
      
       })();
       </script>
       <style>.form-control{width:100% !important;}</style>
       <div class="registration_form">
       <!-- Form -->
        <form id="registration_form"  method="post" action="{{URL('customer-Submit-Blog-mitfarm')}}" enctype="multipart/form-data">
           {{csrf_field()}}
          <div>
            <label>
              <input name="blog_title" placeholder="Enter Blog Title" type="text" tabindex="1" required autofocus>
            </label>
          </div>
          <div>
            <label  >
               <select     class="form-control" class="mass" name="blog_category_id"  >
            <option> Category ..... </option>
           <?php 
            $allcategory = DB::table('categories')->where('category_type',1)
                                  ->where('category_status',0)
                                  ->get();
                 foreach ($allcategory as $v_category) {
                                                    
           ?>
               <option value="{{$v_category->category_id}}">{{$v_category->category_name}} </option>

        <?php } ?>
          </select>
            </label>
          </div>
          <div>
            <label>
              <input type="file" class="form-control" id="name" name="Blog_image"  required>
            </label>
          </div>  
          <div>
            <label>
             <textarea  class="mass"   name="blog_detels" type="textarea" id="message" placeholder="Enter Blog Shot Description"   rows="7"></textarea>
     
            </label>
          </div>
                  
             <div>
            <label>
             <textarea class="mass" name="blog_tag" type="textarea" id="message" placeholder="Enter Blog Shot Tag"   rows="7"></textarea>
     
            </label>
          </div>
                     
           
          <div>
            <input type="submit" value="Add User Post" id="register-submit">
          </div>
          <div class="sky-form">
           
          </div>
        </form>
        <!-- /Form -->
       </div>
     </div>
     <div class="registration_left">
       <h2></h2>
       <div class="registration_form">
       <!-- Form -->
         
       <!-- /Form -->
       </div>
     </div>
     <div class="clearfix"></div>
   </div>
</div>

 @endsection