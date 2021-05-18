@extends('welcome')
  @section('title')

  
  
      <title> {{$allblog->blog_title}} </title>
    <meta  name="keywords" content="{{$allblog->blog_tag}} ">
    <meta name="viewport" content="{{$allblog->blog_detels}}">
  

@endsection

@section('body')
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <!-- breadcrubm area start -->
    <section  class="breadcrumb-area breadcrumb-bg1 hosting">
        
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="breadcrumb-inner">
                        <h1 class="title">Blog Details</h1>
                        <div class="page-navigation">
                            <a href="{{route('mitfarm-home')}}">Home</a> >
                            <span class="colored-text">Blog Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrubm area end -->

    <div class="blog-details-page-conent">
        <!-- blog details page content -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-single-page-content-area">
                        <article class="single-classic-blog-post">
                            <!-- single classic blog item -->
                            <div class="thumb">
                                <img src="{{URL($allblog->blog_image)}} " alt="blog post image">
                            </div>
                            <div class="content">
                            </br>
                            <span style="font-family: sans-serif;" class="date"><?php echo date('F j ,Y g:i a', strtotime($allblog->blog_date)); ?> </span>
                                <a href="#">
                                    <h4 class="title"><span style="font-size: 20px; color: #D08D25">{{$allblog->blog_title}}</span></h4>
                                </a>
                                <ul class="post-meta">
                                    <li>
                                        <a href="#">Post by : <span style="font-size: 20px; color: #D08D25">
                                             
                                        {{$allblog->customer_name }}
                              
                                         </span>  </a>
                                    </li>
                                    <li>
                                        <a href="#">Category:<span style="font-size: 20px; color: #D08D25"> {{$allblog->category_name}}</span> </a>
                                    </li>
                                </ul>
                                <p>{{$allblog->blog_detels}}</p>
                                 
                                
                            </div>
                        </article>
           

           <br>
           <br>
           <br>
           <hr>
            <div class="comment-form"><!-- comment form -->
                             <h4 class="title"> Comments</h4>

                              <?php 
         $massage = Session::get('massage');
         
         if($massage){  ?>
          <h4 class="alert alert-success"> <?php echo $massage; ?>  </h4>
          <?php   Session::put('massage',NULL); } ?>

                            <div class="comment-form-wrapper">
                                <div class="row">
                                    <form action="{{route('Commert-User-Blog-mitfarm',$allblog->blog_id)}} " method="post">
                                        {{csrf_field()}}
                                    <div class="col-md-6">
                                        <div class="form-element margin-bottom-20">
                                            <input type="text" required="" name="user_name" class="input-field" placeholder="Name*"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-element margin-bottom-20">
                                            <input type="email" required="" name="user_email" class="input-field" placeholder="E-mail*"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-element textarea margin-bottom-20">
                                            <textarea rows="30" required="" name="user_massage" placeholder="Message" cols="10" class="input-field textarea"></textarea>
                                        </div>
                                        <button type="submit" class="submit-btn">Send Comments</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- //. comment form -->            
                      <!-- //.post share area -->
                        <div class="comments-area"><!-- comments area -->
                          
                            <span class="separator"></span>
                          <!-- single comment list -->
                    
                    <?php
    $allservice=DB::table('tbl_comments')
             ->where('user_status',1)
             ->where('comments_blog_id', $allblog->blog_id)
            ->orderby('comment_id','dsce')
             ->get();
    foreach($allservice as $vservice){    ?>            
                                 <div class="single-comment-list">
                                <div class="content">
                                    <h4 class="title">{{$vservice->user_name}}</h4>
                                    <h4 class="title">{{$vservice->user_email}}</h4>
                                    <span class="time"> </span>
                                    <p>{{$vservice->user_massage}} </p>
                                </div>
                            </div><!-- //.single comment list -->
                            <span class="comments-separator"></span>

          <?php  } ?>                 
                          
                        </div><!-- //.comments area -->
                        
                    </div>
                </div>
                




                
                <div class="col-md-4">
                    <aside class="sidebar">
<!--                         <div class="search-widget">
                            <div class="search-form">
                                <form action="http://rexbd.net/html/markoz/blog.html">
                                    <div class="form-element">
                                        <input type="search" class="input-field" placeholder="Search....">
                                    </div>
                                    <button type="submit" class="submit-btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
 -->                        <!-- //.search widget-->
                        <div class="widget-area latest-post">
                            <!-- widget area -->
                            <div class="widget-title">
                                <h4 class="title">Latest Posts</h4>
                            </div>
                            <div class="widget-body">
    <?php
    $allbloga=DB::table('blogs')
     ->where('blog_status',0)
     ->join('categories','blogs.blog_category_id','=', 'categories.category_id')
     ->join('tbl_customer','blogs.blog_user_id','=','tbl_customer.customer_id')
     ->limit(7)
     ->orderby('blog_id','dsce')
     ->get();

    foreach($allbloga as $v_blog){    ?>                            
                                <div class="single-latest-posts">
                                    <!-- single latest posts -->
                                    <div class="thumb">
                                        <a href="{{URL::to('Show-Blog-Detels-mitfarm', $v_blog->blog_id)}}"><img src="{{URL($v_blog->blog_image)}}" height="60px;" width="60px;" alt=""></a>
                                    </div>
                                    <div class="content">
                                        <span class="subtitle">{{$v_blog->blog_date}}</span>
                                        <a href="{{URL::to('Show-Blog-Detels-mitfarm', $v_blog->blog_id)}}"><h4 class="title">{{$v_blog->blog_title}} </h4></a>
                                        <span class="author"><span style="font-size: 20px; color: #D08D25"> {{$v_blog->customer_name }}</span> </span>
                                    </div>
                                </div>
 <?php } ?>                               
                                 
                            </div>
                        </div>
                        <!-- //. widget area -->
                        <div class="widget-area categories">
                            <!-- widget area -->
                            <div class="widget-title">
                                <h4 class="title">Categories</h4>
                            </div>
                            <div class="widget-body">
                                <ul>
         <?php
    $allcategory=DB::table('categories')
             ->where('category_status',0)
             ->where('category_type',1)
             ->orderby('category_id','dsce')
             ->get();

    foreach($allcategory as $v_category){    ?> 
                                    <li>
                                        <a href="{{route('Blog-Category-Page-mitfarm',$v_category->category_id)}}">{{$v_category->category_name}}
                                            <span class="right">
                                                <i class="fas fa-angle-right"></i>
                                            </span>
                                        </a>
                                    </li>
 <?php } ?>

                                    
                                </ul>
                            </div>
                        </div>
                        <!-- //. widget area -->
                        
                            <!-- widget area -->
                             
                        <!-- //. widget area -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
    @endsection