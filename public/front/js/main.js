
(function($) {
    "use strict";

    $(document).on('ready', function() {


        /* ==================================================
            # Wow Init
         ===============================================*/
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();


        /* ==================================================
            # Tooltip Init
        ===============================================*/
        $('[data-toggle="tooltip"]').tooltip();



        /* ==================================================
            # Smooth Scroll
         ===============================================*/
        $("body").scrollspy({
            target: ".navbar-collapse",
            offset: 200
        });
        $('a.smooth-menu').on('click', function(event) {
            var $anchor = $(this);
            var headerH = '75';
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });


        /* ==================================================
            # Banner Animation
        ===============================================*/
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function() {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function() {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $immortalCarousel = $('.animate_text'),
            $firstAnimatingElems = $immortalCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        //Initialize carousel
        $immortalCarousel.carousel();
        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);
        //Other slides to be animated on carousel slide event
        $immortalCarousel.on('slide.bs.carousel', function(e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });


        /* ==================================================
            # Youtube Video Init    $('.player').mb_YTPlayer();
         ===============================================*/





         /* ==================================================
            # Fun Factor Init
        ===============================================*/
        $('.timer').countTo();
        $('.fun-fact').appear(function() {
            $('.timer').countTo();
        }, {
            accY: -100
        });


        /* ==================================================


        /* ==================================================
            # Feature Carousel
         ===============================================*/
        $('.feature-carousel').owlCarousel({
            loop: true,
            nav: false,
            margin:30,
            dots: true,
            autoplay: true,
            items: 1,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            responsive: {
                1000: {
                    stagePadding: 100,
                }
            }
        });


        /* ==================================================
            # Services Stage Carousel
         ===============================================*/
        $('.services-stage-carousel').owlCarousel({
            loop: true,
            nav: false,
            margin:30,
            dots: true,
            autoplay: true,
            items: 1,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                800: {
                    items: 2
                },
                1000: {
                    items: 3,
                    stagePadding: 100,
                }
            }
        });


        /* ==================================================
            # We Do Carousel
         ===============================================*/
        $('.wedo-carousel').owlCarousel({
            loop: true,
            nav: false,
            margin:30,
            dots: true,
            autoplay: true,
            items: 1,
            navText: [
                "<i class='arrow_left'></i>",
                "<i class='arrow_right'></i>"
            ],
        });


        /* ==================================================
            # Testimonial Carousel
        ===============================================*/
        $('.testimonials-carousel').owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            autoplay: true,
            items: 1,
            navText: [
                "<i class='arrow_left'></i>",
                "<i class='arrow_right'></i>"
            ],
        });


        /* ==================================================
            # Partner Carousel
         ===============================================*/
        $('.partner-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            navText: [
                "<i class='ti-angle-left'></i>",
                "<i class='ti-angle-right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3,
                    margin: 50
                },

                1000: {
                    items: 4,
                    margin: 80
                }
            }
        });


        /* ==================================================
            # Projects Carousel
         ===============================================*/
        $('.projects-carousel').owlCarousel({
            loop: true,
            nav: true,
            margin:30,
            dots: false,
            autoplay: false,
            items: 1,
            navText: [
                "<i class='arrow_left'></i>",
                "<i class='arrow_right'></i>"
            ],
            responsive: {
                800: {
                    items: 2
                },
                1200: {
                    items: 3
                },
                1400: {
                    stagePadding: 100,
                    items: 3,
                },

            }
        });


        /* ==================================================
            # Case Carousel
         ===============================================*/
        $('.case-carousel').owlCarousel({
            loop: true,
            center: true,
            margin: 30,
            nav: true,
            navText: [
                "<i class='arrow_left'></i>",
                "<i class='arrow_right'></i>"
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 3,
                    stagePadding: 100
                }
            }
        });


        /* ==================================================
            Preloader Init
         ===============================================*/
        $(window).on('load', function () {
            $('#site-preloader').delay('200').fadeOut();
        });


    }); // end document ready function
})(jQuery); // End jQuery
