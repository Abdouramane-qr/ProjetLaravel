@extends('backsite/master')

@section('main_body')
  <div class="inner-block">
 
     <div class="market-updates text-center"> 

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form" method="post" action="{{URL('saveblog')}}" enctype="multipart/form-data" >
        	
            {{csrf_field()}}
        <br style="clear:both">
        <h3 style="margin-bottom: 25px; text-align: center;">Add Blog</h3>
       <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>  
       
        <label style="text-align:left;width:100%;">Blog Title</label>
        <div class="form-group">
           <input type="text" class="form-control" id="name" name="blog_title" placeholder="Enter Blog Title" required>
        </div>

       

        <label style="text-align:left;width:100%;">Blog Category</label>
        <div class="form-group">
           <select  class="form-control" name="blog_category_id"  >
           	<option> Category ..... </option>
           <?php 
            $allcategory = DB::table('categories')->where('category_type',1)
                                  ->where('category_status',0)
                                  ->get();
                 foreach ($allcategory as $v_category) {
                                  	                
           ?>
               <option value="{{$v_category->category_id}}">{{$v_category->category_name}} </option>

        <?php } ?>
          </select>
        </div>

        <label style="text-align:left;width:100%;">Blog Image</label>
        <div class="form-group">
           <input type="file" class="form-control" id="name" name="Blog_image"  required>
        </div>
        
         <label style="text-align:left;width:100%;">Blog  Description</label> 
        <div class="form-group">
        <textarea class="form-control" name="blog_detels" type="textarea" id="message" placeholder="Enter Blog Shot Description"   rows="7"></textarea>
        </div>
        
         <label style="text-align:left;width:100%;">Blog  Tag</label> 
        <div class="form-group">
        <textarea class="form-control" name="blog_tag" type="textarea" id="message" placeholder="Enter Blog Shot Description"    rows="7"></textarea>
        </div>

		 

         
         
        
         
       <input type="submit"  name="submit" value="Add Blog" class="btn btn-primary pull-right" />
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