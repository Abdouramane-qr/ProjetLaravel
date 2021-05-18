 
  @extends('welcome')
    @section('title')

         <?php
     $images = DB::table('seo')->where('website_id' ,'1')->first(); ?>
      <title>Contack page || {{$images->website_title}} || mitfarm</title>
    <meta  name="keywords" content="{{$images->website_tags}} ">
    <meta name="viewport" content="{{$images->website_detels}}">
  

@endsection

@section('body')
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- breadcrubm area start -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="breadcrumb-inner">
                        <h1 class="title">Contact</h1>
                        <div class="page-navigation">
                            <a href="index-2.html">Home</a> >
                            <span class="colored-text">Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrubm area end -->

<!-- contact page content area start-->
<div class="contact-page-content-area">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <div class="section-title">
                <!-- section title -->
                <h2 class="title">Get in touch</h2>
                
                <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?> 

                <span class="separator"></span>
            </div>
            <!-- //. section title -->
        </div>
    </div>
    
    <!-- contact page info area -->
    <div class="contact-page-info-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="left-content-area">
                        <h4 class="si-title">Contact info</h4>
                        <p>You can contact or visit us in our office from Monday to Friday from 8:00 - 17:00</p>
                        <div class="single-contact-info-item"><!-- single contact infor item -->
                            <div class="icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="content">
                                <span class="details">227 Marion Street Address Here Columbia, SC 29201</span>
                            </div>
                        </div><!-- //.single contact infor item -->
                        
                        <div class="single-contact-info-item"><!-- single contact infor item -->
                            <div class="icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="content">
                                <span class="details">+8801851708087</span>
                            </div>
                        </div><!-- //.single contact infor item -->
                        <div class="single-contact-info-item"><!-- single contact infor item -->
                            <div class="icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="content">
                                <span class="details">Support@mitfarm.com</span>
                            </div>
                        </div><!-- //.single contact infor item -->
                    </div>
                </div>
<div class="col-md-8">
    <div class="right-content-area">
        <div class="contact-form-wrapper">
<form action="{{route('contact-User-mitfarm')}} " method="post" id="get_in_touch">
	{{csrf_field()}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-element margin-bottom-20">
                <input type="text" name="name" id="uname" class="input-field" placeholder="Name*">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-element margin-bottom-20">
                <input type="email" name="email" id="email" class="input-field" placeholder="E-mail*">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-element textarea margin-bottom-20">
                <textarea rows="30" name="massage" id="message" placeholder="Message" cols="10" class="input-field textarea"></textarea>
            </div>
            <button type="submit" class="submit-btn">Send Message</button>
        </div>
    </div>
</form>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
    <!-- contact page info area -->
</div>
<!-- contact page content area  end-->
<!-- contact page map area start -->
<div class="contact-map-area" id="contact-map-area"></div>


 @endsection
