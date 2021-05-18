@extends('backsite/master')

@section('main_body')
  <div class="inner-block">

     <div class="market-updates text-center">

<div class="container">
<div class="col-md-5">
    <div class="form-area">
        <form role="form" method="post" action="{{URL('updategelleryphoto', $editphoto->gellery_id)}}" enctype="multipart/form-data" >

            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Edit Gellery Image</h3>
       <?php
         $massage = Session::get('massage');

         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>

        <label style="text-align:left;width:100%;">Photo Name</label>
        <div class="form-group">
           <input type="text" value="{{$editphoto->phote_name}}" class="form-control" id="name" name="phote_name"  required>
        </div>




        <label style="text-align:left;width:100%;"> Image</label>
        <div class="form-group">
          <img src="{{URL($editphoto->phote_image)}}" height="250px;" width="250px;" alt="">
           <input type="file" class="form-control" id="name" name="phote_image"   >
        </div>

          <input type="submit"  name="submit" value="Update Photo" class="btn btn-primary pull-right" />
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
