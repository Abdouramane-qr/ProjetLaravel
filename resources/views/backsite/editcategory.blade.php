@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="post" action="{{URL('updatecategory',$allcategory->category_id)}}" >
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Edit Category</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">Category Name</label>
        <div class="form-group">
           <input type="text" class="form-control" value="{{$allcategory->category_name}} " id="name" name="category_name"  required>
        </div>

        <label style="text-align:left;width:100%;">Category Type</label>
        <div class="form-group">
            <select  class="form-control" name="category_type"  >
            	@if($allcategory->category_type==1)
              <option selected="selected" value="1">Blog Category</option>
              <option value="2">Product Category</option>
              @elseif($allcategory->category_type==2)
               <option selected="selected" value="1">Blog Category</option>
              <option selected="selected" value="2">Product Category</option>
              @endif
            
          </select>
        </div>
         
       <input type="submit"  name="submit" value="Update Category" class="btn btn-primary pull-right" />
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