@extends('backsite/master')

@section('main_body')
  <div class="inner-block">

     <div class="market-updates text-center">

<div class="container">
<div class="col-md-5">
    <div class="form-area">
        <form role="form" method="post" action="{{URL('savemamber')}}" enctype="multipart/form-data" >

            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Add Team Member</h3>
       <?php
         $massage = Session::get('massage');

         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>

        <label style="text-align:left;width:100%;">Team Member Name</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="member_name" placeholder="Enter Member Name" required>
        </div>




        <label style="text-align:left;width:100%;">Member Image</label>
        <div class="form-group">
           <input type="file" class="form-control" id="name" name="member_image"  required>
        </div>

         <label style="text-align:left;width:100%;">Member  Description</label>
        <div class="form-group">
        <textarea class="form-control" name="member_detels" type="textarea" id="message" placeholder="Enter Member  Description"   rows="7"></textarea>
        </div>

        <label style="text-align:left;width:100%;">Member Post</label>
        <div class="form-group">
            <select  class="form-control" name="member_type"  >
              <option value="1">MD</option>
              <option value="2">CO</option>
              <option value="3">Manager</option>
              <option value="4">Share Holder</option>
              <option value="5">General Mamber </option>


          </select>
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
