@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="post" action="{{URL('save_seo')}}"  enctype="multipart/form-data" >
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Website SEO Page</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">Website Title</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="website_title" value="{{$seo->website_title}}"  required>
        </div>

         <label style="text-align:left;width:100%;">Website Logo</label>
        <div class="form-group">
        	<img src="{{URL($seo->website_image)}} " height="150px;" width="150px;" alt="">
           <input type="file" class="form-control" id="name" name="website_image" required>
        </div>
        
         <label style="text-align:left;width:100%;">Website Description</label> 
        <div class="form-group">
        <textarea class="form-control" name="website_detels" type="textarea" id="message" placeholder="Enter Website Description"   rows="7">{{$seo->website_detels}}</textarea>
                               
        </div>

         <label style="text-align:left;width:100%;">Website Tags</label> 
        <div class="form-group">
        <textarea class="form-control" name="website_tags" type="textarea" id="message" placeholder="Enter Website Tags"   rows="7">{{$seo->website_tags}}</textarea>
                               
        </div>
         
       <input type="submit"  name="submit" value="Save" class="btn btn-primary pull-right" />
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