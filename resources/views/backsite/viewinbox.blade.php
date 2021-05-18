@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form"   >
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">View Inbox</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">User Name</label>
        <div class="form-group">
           <input type="text" readonly="" class="form-control" value="{{$inbox->name}} " id="name"   >
        </div>

         <label style="text-align:left;width:100%;">User Email</label>
        <div class="form-group">
           <input type="text" readonly="" class="form-control" value="{{$inbox->email}} " id="name"   >
        </div>

		 <label style="text-align:left;width:100%;">User Massage</label>
		        <div class="form-group">
		        	<textarea class="form-control" name="member_detels" type="textarea" id="message" placeholder="Enter Member  Description"   rows="7">{{$inbox->massage}}</textarea>
		           
		        </div>



        
         
      <a href="{{route('inbox-page')}}"> <input  name="submit" value="Back" class="btn btn-primary pull-right" /></a>
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