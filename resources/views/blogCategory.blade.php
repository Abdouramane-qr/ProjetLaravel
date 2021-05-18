@extends('welcome')

 @section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title>blog category page || {{$images->website_title}} || mitfarm</title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')

  <meta name="viewport" content="width=device-width, initial-scale=1">






<div class="top-sellers">
     <div class="container">
         <h3>GET LATEST BLOG</h3>
         <div class="seller-grids">

<?php
    foreach($allcategory as $v_blog){    ?>

             <div class="col-md-3 seller-grid">
                 <a href="{{URL::to('Show-Blog-Detels-mitfarm', $v_blog->blog_id)}}"><img src="{{URL($v_blog->blog_image)}}" alt=""/></a>
                 <h4><a href="{{URL::to('Show-Blog-Detels-mitfarm', $v_blog->blog_id)}}">{{$v_blog->blog_title}}</a></h4>
                 <h4  style="color:#D08D25">Category :  {{$v_blog->category_name}} </h4>
                 <a href="{{URL::to('Show-Blog-Detels-mitfarm', $v_blog->blog_id)}}"> <p> {{substr($v_blog->blog_detels,0,50)}}</p></a>
                 <br />
                  <div class="item-info6">
                 
                </div>
             </div>
<?php } ?>
             
             <div class="clearfix"></div>
           
         </div>
     </div>
    
</div>
    @endsection
