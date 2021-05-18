(function ($) {
	"use strict";
    jQuery(document).ready(function($){
        /*--------------------
            wow js init
        ---------------------*/
        new WOW().init();

        /*-----------------------------
            magnific popup activation
        ------------------------------*/
        $('.video-play-btn,.video-popup,.small-vide-play-btn,.video-btn-new').magnificPopup({
            type: 'video'
        });
        $('.image-popup').magnificPopup({
            type: 'image'
        });
        /*------------------
            back to top
        ------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });
        /*-------------------------------
            counter section activation
        -------------------------------*/
        var counternumber = $('.count-num,.count-numb');
        counternumber.counterUp({
            delay: 20,
            time: 5000 
        });
        /*---------------------------
            Header carousel
        ---------------------------*/
        var $headerCarousel = $('#header-carousel');
        if ($headerCarousel.length > 0) {
            $headerCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: true,
                nav: false,
                animateOut: 'flipInX',
                animateIn: 'flipOutX',
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 1
                    },
                    960: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1920: {
                        items: 1
                    }
                }
            });
            $headerCarousel.on('translate.owl.carousel', function () {
                $('.single-slider-item .title,.single-slider-item .header-list').removeClass('animated fadeInDown').css('opaciry', '0');
                $('.single-slider-item p').removeClass('animated fadeInUp').css('opaciry', '0');
                $('.single-slider-item .btn-wrapper').removeClass('animated fadeInUp').css('opaciry', '0');
                $('.single-slider-item .header-right-img-wrapper .img-wrapper img').removeClass('animated fadeInUp').css('opaciry', '0');
            });
            $headerCarousel.on('translated.owl.carousel', function () {
                $('.single-slider-item .title,.single-slider-item .header-list').addClass('animated fadeInDown').css('opaciry', '1');
                $('.single-slider-item p').addClass('animated fadeInUp').css('opaciry', '1');
                $('.single-slider-item .btn-wrapper').addClass('animated fadeInDown').css('opaciry', '1');
                $('.single-slider-item .header-right-img-wrapper .img-wrapper img').addClass('animated fadeInDown').css('opaciry', '1');
            });
        }
        /*---------------------------
            testimonial carousel
        ---------------------------*/
        var $tesitmonialCarousel = $('#testimonial-carousel');
        if ($tesitmonialCarousel.length > 0) {
            $tesitmonialCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: false,
                nav: false,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    
                    768: {
                        items: 1
                    },
                    960: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1920: {
                        items: 1
                    }
                }
            });
        }
        /*---------------------------
            Team carousel
        ---------------------------*/
        var $teamCarousel = $('#team-carousel');
        if ($teamCarousel.length > 0) {
            $teamCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin: 30,
                dots: false,
                nav: false,
                navText: ['<i class="icofont icofont-rounded-left"></i>', '<i class="icofont icofont-rounded-right"></i>'],
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    960: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    },
                    1920: {
                        items: 4
                    }
                }
            });
        }
        /*---------------------------
            Brand carousel
        ---------------------------*/
        var $brandCarousel = $('#brand-carousel');
        if ($brandCarousel.length > 0) {
            $brandCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin:30,
                dots: false,
                nav: false,
                navText: ['<i class="icofont icofont-rounded-left"></i>', '<i class="icofont icofont-rounded-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    960: {
                        items: 4
                    },
                    1200: {
                        items: 6
                    },
                    1920: {
                        items: 6
                    }
                }
            });
        }
        /*---------------------------
            Data Center carousel
        ---------------------------*/
        var $DataCenterCarousel = $('#data-center-carousel');
        if ($DataCenterCarousel.length > 0) {
            $DataCenterCarousel.owlCarousel({
                loop: true,
                autoplay: true, //true if you want enable autoplay
                autoPlayTimeout: 1000,
                margin:30,
                dots: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    960: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    },
                    1920: {
                        items: 3
                    }
                }
            });
        }
    });
    //define variable for store last scrolltop
    var lastScrollTop = '';
    $(window).on('scroll', function () {
        //back to top show/hide
       var ScrollTop = $('.back-to-top');
       if ($(window).scrollTop() > 1000) {
           ScrollTop.fadeIn(1000);
       } else {
           ScrollTop.fadeOut(1000);
       }
       /*--------------------------
        sticky menu activation
       -------------------------*/
        var st = $(this).scrollTop();
        var mainMenuTop = $('.navbar-area');
        if ($(window).scrollTop() > 1000) {
            if (st > lastScrollTop) {
                // hide sticky menu on scrolldown 
                mainMenuTop.removeClass('nav-fixed');
                
            } else {
                // active sticky menu on scrollup 
                mainMenuTop.addClass('nav-fixed');
            }

        } else {
            mainMenuTop.removeClass('nav-fixed ');
        }
        lastScrollTop = st;
       
    });
           
    $(window).on('load',function(){
        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(1000);
        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut(100);
    });

}(jQuery));	
