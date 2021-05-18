 @extends('welcome')

   @section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title>Gallery page || {{$images->website_title}} || mitfarm</title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')

  <meta name="viewport" content="width=device-width, initial-scale=1">
<section class="latest-blog-area"   data-aos="zoom-in" data-aos-duration="3000">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="section-title">
                    <!-- section title -->

                    <h3>Our Gallery</h3>

                <!-- //. section title -->
            </div>
        </div>
        <div class="row">
   <?php
    $allproduct=DB::table('gelleries')
             ->where('phote_status',0)
             ->orderby('gellery_id','dsce')
             ->get();
    foreach($allproduct as $vproduct){    ?> 

            <div class="col-md-4 col-sm-6" style="margin-bottom: 15px;">
                <div class="single-news-item"><!-- single news item -->
                    <div class="thumb">
                       <a href=""><img src="{{URL($vproduct->phote_image)}}" alt="news image"></a>
                    </div>

                </div><!-- //.single news item -->
            </div>
<?php } ?>
            

            

             

             

            
            <br>

        </div>
        
    </div>

</section>


@endsection