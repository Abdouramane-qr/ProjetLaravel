@extends('backsite/master')

@section('main_body')
  <div class="inner-block">

     <div class="market-updates text-center">

<div class="container">
<div class="col-md-5">
    <div class="form-area">
        <form role="form" method="post" action="{{URL('savegellery')}}" enctype="multipart/form-data" >

            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Add Gallery Photo</h3>
       <?php
         $massage = Session::get('massage');

         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>

        <label style="text-align:left;width:100%;">Photo Name</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="phote_name" placeholder="Enter Member Name" required>
        </div>




        <label style="text-align:left;width:100%;">Gallery Image</label>
        <div class="form-group">
           <input type="file" class="form-control" id="name" name="phote_image"  required>
        </div>
 

        







       <input type="submit"  name="submit" value="Add Team Member" class="btn btn-primary pull-right" />
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
