@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="post" action="{{URL('updateslider',$editslider->slider_id)}}"  enctype="multipart/form-data" >
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Edit Slider</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">Slider Title</label>
        <div class="form-group">
           <input type="text" value="{{$editslider->slider_title}} " class="form-control" id="name" name="slider_title"  required>
        </div>

         <label style="text-align:left;width:100%;">Slider Image</label>
        <div class="form-group">
        	<img src="{{URL($editslider->slider_image)}} " height="150px;" width="150px;" alt="">
           <input type="file" class="form-control" id="name" name="slider_image"  >
        </div>
        
         
         
       <input type="submit"  name="submit" value="Update Slider" class="btn btn-primary pull-right" />
        </form>
    </div>
</div>
</div>
  
  </div>
</div>
 <div class="inner-block">
 <div class="market-updates text-center"> 
    </div>
</div> <div class="inner-block">
 <div class="market-updates text-center"> 
    </div>
</div> 
   @endsection