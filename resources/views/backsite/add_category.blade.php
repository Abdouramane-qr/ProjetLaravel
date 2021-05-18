@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="post" action="{{URL('save_category')}}" >
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Add Category</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">Category Name</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="category_name" placeholder="Enter Category Name" required>
        </div>

        <label style="text-align:left;width:100%;">Category Type</label>
        <div class="form-group">
            <select  class="form-control" name="category_type"  >
              <option value="1">Blog Category</option>
              <option value="2">Product Category</option>
              
               
            
          </select>
        </div>
         
       <input type="submit"  name="submit" value="Add Category" class="btn btn-primary pull-right" />
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