@extends('welcome')
 @section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title>all servece {{$images->website_title}} || mitfarm</title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')

<!-- header area start -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
 
<!-- why choose us area start -->
<section class="why-choose-us-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="section-title"><!-- section title -->
                     
                    <h3>Our Training Courses </h3>
                    
                </div><!-- //. section title -->
            </div>
        </div>
        <div class="row">
             <?php 
    $allservice=DB::table('services')
             ->where('service_type',3)
             ->where('service_status',0)
             ->orderby('service_id','dsce')
             ->get();
    foreach($allservice as $vservice){    ?> 
            <div class="col-md-4 col-sm-6" data-aos="flip-right" data-aos-duration="2000">
                <div class="single-why-us-box"><!-- single why us box -->
                    <div class="icon">
                     <a href="{{route('Traning-Service-Detels-Page-mitfarm',$vservice->service_id)}}">  <img src="{{Illuminate\Support\Facades\Storage::URL($vservice->service_image)}}" height="160px;" width="180px;" alt=""></a>
                    </div>
                    <div class="content">
                        <a href="{{route('Traning-Service-Detels-Page-mitfarm',$vservice->service_id)}}">   <h4 class="title">{{$vservice->service_title}} </h4></a>
                        <a href="{{route('Traning-Service-Detels-Page-mitfarm',$vservice->service_id)}}">   <p>{{substr($vservice->service_detels,0,150)}}</p></a>
                    </div>
                </div><!-- //.single why us box -->
            </div>
        <?php } ?>    
           
         </div>
          
    </div>
</section>
<!-- why choose us area end -->
<!-- service area start -->
 

    @endsection