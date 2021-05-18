
<!DOCTYPE HTML>
<html>
<head>
<title>Mit Farm Admin Panal</title>
<meta name="viewport" content=" ">
<meta http-equiv="Content-Type" content=" " />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="{{asset('admin/js/jquery-2.1.1.min.js')}}"></script>
<!--icons-css-->
<link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">
<!--Google Fonts-->
<link href='{{asset("admin//fonts.googleapis.com/css?family=Carrois+Gothic")}}' rel='stylesheet' type='text/css'>
<link href='{{asset("admin//fonts.googleapis.com/css?family=Work+Sans:400,500,600")}}' rel='stylesheet' type='text/css'>
<!--static chart-->
<script src="{{asset('admin/js/Chart.min.js')}}"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="{{asset('admin//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js')}}" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="{{asset('admin/js/chartinator.js')}}" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],

                colIndexes: [2],

                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],

                ignoreCol: [2],

                chartType: 'GeoChart',

                chartAspectRatio: 1.5,

                chartZoom: 1.75,

                chartOffset: [-12,0],

                chartOptions: {

                    width: null,

                    backgroundColor: '#fff',

                    datalessRegionColor: '#F5F5F5',

                    region: 'world',

                    resolution: 'countries',

                    legend: 'none',

                    colorAxis: {

                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {

                        trigger: 'focus',

                        isHtml: true
                    }
                }


            });
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="{{asset('admin/js/skycons.js')}}"></script>
<!--//skycons-icons-->
</head>
<body>
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
					<?php
     $imag = DB::table('seo')->where('website_id' ,'1')->first(); ?>			
									 <a href="{{route('home')}}"> <h2>{{$imag->website_title}} </h2>

								  </a>
							</div>
							<!--search-box
								<div class="search-box">
									<form>
										<input type="text" placeholder="Search..." required="">
										<input type="submit" value="">
									</form>
								</div>//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="{{route('inbox-page')}}" class="dropdown-toggle"    ><i class="fa fa-envelope"></i>
                            <?php 
                               $con=  DB::table('tbl_contacks')->where('type',0)->get();
                                  $i=0;
                                 foreach ($con as $con) {
                                  $i++; ?>
                                 <span class="badge blue">{{$i}} </span>
                              <?php     }
                            ?>
											

										</a>
									 
									</li>

									<li class="dropdown head-dpdn">
										<a href="{{route('connent-page')}}" class="dropdown-toggle"  ><i class="fa fa-bell"></i>
                                   <?php 
                               $con=  DB::table('tbl_comments')->where('user_status',0)->get();
                                  $i=0;
                                 foreach ($con as $con) {
                                  $i++; ?>
                                 <span class="badge blue">{{$i}} </span>
                              <?php     }
                            ?>

										</a>

										 
									</li>
									 
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">
												<span class="prfil-img"><img src="{{asset('admin/images/p1.png')}}" alt=""> </span>
												<div class="user-name">
													<p>{{Session::get('admin_name')}}</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>
											</div>
										</a>
										<ul class="dropdown-menu drp-mnu">
											
											<li> <a href="{{route('logout')}}"><i class="fa fa-sign-out">Logout</i> </a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
@yield('main_body')










<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© copyright PG Template <a href="" target="_blank"></a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
			      <!--<img id="logo" src="" alt="Logo"/>-->
			  </a> </div>
		    <div class="menu">
		      <ul id="menu" >
		       
		       <li id="menu-comunicacao" ><a href="{{route('sitetitle')}}"><i class="fa fa-bar-chart"></i><span>Title</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          
		        </li>
		        
		        <li><a href=""><i class="fa fa-cogs"></i><span> Service</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul>
		            <li><a href="{{route('add_service')}}">Add Service</a></li>
		            <li><a href="{{route('all_service')}}">All Service</a></li>
		          </ul>
		        </li>

		        <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Category</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >

		            <li id="menu-arquivos" ><a href="{{route('addcategory')}}">Add Category</a></li>
		            <li id="menu-arquivos" ><a href="{{route('allcategory')}} ">All Category</a></li>
		          </ul>
		        </li>

		         <li id="menu-comunicacao" ><a href="#"><i class="fa fa-map-marker"></i><span>Blog</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >

		            <li id="menu-arquivos" ><a href="{{route('addblog')}}">Add Blog</a></li>
		            <li id="menu-arquivos" ><a href="{{route('allblog')}} ">All Blog</a></li>
		          </ul>
		        </li>

                <li id="menu-comunicacao" ><a href="#"><i class="fa fa-bar-chart"></i><span>Slider</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >

		            <li id="menu-arquivos" ><a href="{{route('addslider')}}">Add Slider</a></li>
		            <li id="menu-arquivos" ><a href="{{route('allslider')}} ">All Slider</a></li>
		          </ul>
		        </li>

                 <li id="menu-comunicacao" ><a href="#"><i class="fa fa-cog"></i><span>Team Member</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >

		            <li id="menu-arquivos" ><a href="{{route('add-team-member')}}">Add Team Member</a></li>
		            <li id="menu-arquivos" ><a href="{{route('all-team-mamber')}} ">All Team Member</a></li>
		          </ul>
		        </li>

                 <li><a href=" "><i class="fa fa-shopping-cart"></i><span>Product</span><span class="fa fa-angle-right" style="float: right"></span></a>
		         	<ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="{{route('Add-Product')}}">Add Product</a></li>
			            <li id="menu-academico-boletim" ><a href="{{route('All-Product')}}">All Product</a></li>
		             </ul>
		         </li>

                 <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Order Page</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >

		            <li id="menu-arquivos" ><a href="{{route('pandingorder')}}"> Panding Order  </a></li>
		            <li id="menu-arquivos" ><a href="{{route('allpadeorder')}} ">All Order</a></li>
		          </ul>
		        </li>

		        <li><a href="#"><i class="fa fa-envelope"></i><span>Mailbox</span><span class="fa fa-angle-right" style="float: right"></span></a>
		        	 <ul id="menu-academico-sub" >
			            <li id="menu-academico-avaliacoes" ><a href="{{route('inbox-page')}}">Inbox Massage</a></li>
			            <li id="menu-academico-boletim" ><a href="{{route('connent-page')}} ">All Comment</a></li>
		             </ul>
		        </li>

                 <li id="menu-comunicacao" ><a href="#"><i class="fa fa-bar-chart"></i><span>Gellery Photos</span><span class="fa fa-angle-right" style="float: right"></span></a>
		          <ul id="menu-comunicacao-sub" >

		            <li id="menu-arquivos" ><a href="{{route('gelleryphoto')}}">Add Gellery Photo</a></li>
		            <li id="menu-arquivos" ><a href="{{route('allgelleryphoto')}} ">All Gellery Photo</a></li>
		          </ul>
		        </li>
		          
		        

		      </ul>
		    </div>
	 </div>
	 
	<div class="clearfix"> </div>
</div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
		<script src="{{asset('admin/js/scripts.js')}}"></script>
		<!--//scrolling js-->
<script src="{{asset('admin/js/bootstrap.js')}}"> </script>
<!-- mother grid end here-->
</body>
</html>
