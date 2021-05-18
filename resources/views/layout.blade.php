





@extends('welcome')
@section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title> {{$images->website_title}} </title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')
 



 @include('inc.slider')
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <section style="background:#F9F9FF;" class="category-area section-gap" id="news">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-70 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">Our  Service</h1>
                                
                            </div>
                        </div>
                    </div>                      
                    <div class="active-cat-carusel">
 <?php
    $allservice=DB::table('services')
             ->where('service_type',1)
             ->where('service_status',0)
             ->orderby('service_id','dsce')
             ->get();
    foreach($allservice as $vservice){    ?>

                        <div class="item single-cat">
                           <a href="{{route('Service-Detels-Page-mitfarm',$vservice->service_id)}} "> <img src="{{URL($vservice->service_image)}}" alt=""> </a>
                              <br />
                            <h4><a href="{{route('Service-Detels-Page-mitfarm',$vservice->service_id)}}">{{$vservice->service_title}} </a></h4>
                        </div>
 <?php } ?>
                        

                    </div>                                              
                </div>  
            </section>
            
         
            
            <section style="background:#F9F9FF;" class="category-area section-gap" id="news">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-70 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">Our Training Courses </h1>
                                
                            </div>
                        </div>
                    </div>                      
                    
                          <div class="active-cat-carusel">
 <?php
    $allservice=DB::table('services')
             ->where('service_type',3)
             ->where('service_status',0)
             ->orderby('service_id','dsce')
             ->get();
    foreach($allservice as $vservice){    ?>

                        <div class="item single-cat">
                           <a href="{{route('Traning-Service-Detels-Page-mitfarm',$vservice->service_id)}} "> <img src="{{URL($vservice->service_image)}}" alt=""> </a>
                              <br />
                            <h4><a href="{{route('Traning-Service-Detels-Page-mitfarm',$vservice->service_id)}}">{{$vservice->service_title}} </a></h4>
                        </div>
 <?php } ?>
                        

                    </div>                                              
                </div>  
            </section>
  <!-- Service site -->

<!---->
<div class="top-sellers">
     <div class="container">
         <h3>Our Products</h3>
         <div class="seller-grids">

<?php
    $allproduct=DB::table('products')
             ->where('product_status',0)
             ->limit(4)
             ->orderby('product_id','dsce')
             ->get();
    foreach($allproduct as $vproduct){    ?> 

             <div class="col-md-3 seller-grid">
                 <a href="{{route('Show-Product-Detels-mitfarm',$vproduct->product_id)}}"><img src="{{URL($vproduct->product_image)}}" alt=""/></a>
                 <h4><a href="{{route('Show-Product-Detels-mitfarm',$vproduct->product_id)}}">{{$vproduct->product_title}}</a></h4>
 
                 <p>Rs.{{$vproduct->product_price}}/-</p>
                 <br />
                  <div class="item-info6">
                  <a href="{{route('Show-Product-Detels-mitfarm',$vproduct->product_id)}}">Buy Now</a>
             </div>
             </div>

    <?php } ?>  



 

             <div class="clearfix"></div>
              <a href="{{route('Show-All-Products-mitfarm')}}" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
         </div>
     </div>
    
</div>


<div style="background:#F9F9FF;" class="recommendation">
     <div class="container">
         <div class="recmnd-head">
            <br>
             <h3>RECOMMENDATIONS FOR YOU</h3>
         </div>
         <div class="bikes-grids">           
             <ul id="flexiselDemo1">
<?php
    $allproduct=DB::table('products')
             ->where('product_status',0)
             ->orderby('product_id','dsce')
             ->get();
    foreach($allproduct as $vproduct){    ?> 

                 <li>
                     <a href="{{route('Show-Product-Detels-mitfarm',$vproduct->product_id)}}"><img src="{{URL($vproduct->product_image)}}" alt=""/></a>  
                     <h4><a href="{{route('Show-Product-Detels-mitfarm',$vproduct->product_id)}}">{{$vproduct->product_title}}</a></h4> 
                     <p>Rs. {{$vproduct->product_price}}/-</p>
 
                  <div class="item-info6">
                  <a href="{{route('Show-Product-Detels-mitfarm',$vproduct->product_id)}}">Buy Now</a>
                 </li>

    <?php } ?>  



                
            </ul>
                     
     </div>
     </div>
</div>  
        
<div class="top-sellers">
     <div class="container">
         <h3>GET LATEST BLOG</h3>
         <div class="seller-grids">
<?php
    $allblog=DB::table('blogs')
             ->where('blog_status',0)
             ->join('categories','blogs.blog_category_id','=', 'categories.category_id')
             ->limit(4)
             ->orderby('blog_id','dsce')
             ->get();

    foreach($allblog as $v_blog){    ?>

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
              <a href="{{route('More-Blog')}}" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
         </div>
     </div>
    
</div>

    
    <!---->
<div class="top-sellers" style="background: #F9F9FF;" >
     <div class="container">
         <br>
         <h3>Gellery</h3>
         <div class="seller-grids">
   <?php
    $allproduct=DB::table('gelleries')
             ->where('phote_status',0)
             ->limit(4)
             ->orderby('gellery_id','dsce')
             ->get();
    foreach($allproduct as $vproduct){    ?> 

             <div class="col-md-3 seller-grid">
                 <a href=""><img src="{{URL::to($vproduct->phote_image)}}" alt=""/></a>
                 <h4><a href="">{{$vproduct->phote_name}} </a></h4>
 
                 <p></p>
                 <br />
                  <div class="item-info6">
                 
             </div>
             </div>
<?php } ?>
             
             <div class="clearfix"></div>
              <a href="{{route('See-More-Photo-mitfarm')}}" class="primary-btn load-more pbtn-2 text-uppercase mx-auto mt-60">Load More </a>
         </div>
     </div>
    
</div>

     
<!-- counterup area end -->
 <div class="about-mit-section">
        <div class="container1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mit-about-photo">
                        <img style="margin-top: 30px;" src="{{url($images->website_image)}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mit-about-content">
                        <h2 class="animated rotateInUpLeft">About <span>{{ $images->website_title }}</span> </h2>
                        <p>{{substr($images->website_detels,0,300)}}

                    </p>
                        <div class="learn-btn">
                            <a href="">learn more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


                <div style="margin-top:50px;" class="section-title">
                    <!-- section title -->
                    
                    <h3>Our Team Member</h3>
                   
                <!-- //. section title -->
            </div>
     

 <div  class="brand-carousel" id="brand-carousel">
       <?php
    $allMember=DB::table('team_mambers')
            ->orderby('member_id','dsce')
             ->get();

    foreach($allMember as $v_member){    ?> 

        <div class="single-brand-item"><!-- single brand item -->
            <a href="{{route('Show-Team-Mamber-mitfarm',$v_member->member_id)}} ">
                <img  class="thumb22" height="150px;" width="150px;"  src="{{URL($v_member->member_image)}}" alt="mitfarm">
            </a>
        </div> 
<?php } ?>
        
     
    </div>   

   
     

    @endsection
