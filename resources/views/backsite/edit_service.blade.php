@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="post" action="{{URL('updateservice',$editservice->service_id)}}"  enctype="multipart/form-data" >
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Edit Service</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">Service Title</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="service_title" value="{{$editservice->service_title}}" required>
        </div>

         <label style="text-align:left;width:100%;">Service Image</label>
        <div class="form-group">
        	<img src="{{URL($editservice->service_image)}}" height="100px;" width="90px;" alt="">
           <input type="file" class="form-control" id="name" name="service_image"  >
        </div>
        
         <label style="text-align:left;width:100%;">Service Description</label> 
        <div class="form-group">
        <textarea class="form-control" name="service_detels" type="textarea" id="message"   > {{$editservice->service_detels}} </textarea>
                               
        </div>

         <label style="text-align:left;width:100%;">Service Type</label>
        <div class="form-group">
            <select  class="form-control" name="service_type"  >
            	@if($editservice->service_type==1)
              <option selected = 'selected' value="1"> Service</option>
             <option  value="3">Training Courses</option>
             
               @elseif($editservice->service_type== 3)
              <option value="1">  Service</option>
              <option selected = 'selected' value="3">Training Courses</option>
               @endif
            
          </select>
        </div>
         
       <input type="submit"  name="submit" value="Updete Service" class="btn btn-primary pull-right" />
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