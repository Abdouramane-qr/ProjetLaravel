@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="post" action="{{URL('save_product')}}"  enctype="multipart/form-data" >
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Add Product</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">Product Title</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="product_title" placeholder="Enter Product Title" required>
        </div>

         <label style="text-align:left;width:100%;">Product Category</label>
        <div class="form-group">
            <select  class="form-control" name="product_category_id" required >
              <option value="">Select Product Category</option>
<?php 
    $product_category= DB::table('categories')->where('category_status',0)->where('category_type',2)->get();
    foreach($product_category as $product_category){
?>
              <option value="{{$product_category->category_id}} ">{{$product_category->category_name}} </option>
              
         <?php } ?>      
            
          </select>
        </div>

         <label style="text-align:left;width:100%;">Product Image</label>
        <div class="form-group">
           <input type="file" class="form-control" id="name" name="product_image" required>
        </div>
        
         <label style="text-align:left;width:100%;">Product Description</label> 
        <div class="form-group">
        <textarea class="form-control" name="product_detels" type="textarea" id="message" placeholder="Enter Product Description"   rows="7" required></textarea>
                               
        </div>
       <label style="text-align:left;width:100%;">Product Tags</label> 
        <div class="form-group">
        <textarea class="form-control" name="product_tags" type="textarea" id="message" placeholder="Enter Product tags"   rows="7" required></textarea>
                               
        </div>

         <label style="text-align:left;width:100%;">Product Price</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="product_price" placeholder="Enter Product Price" required>
        </div>





        
         
       <input type="submit"  name="submit" value="Add Product" class="btn btn-primary pull-right" />
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