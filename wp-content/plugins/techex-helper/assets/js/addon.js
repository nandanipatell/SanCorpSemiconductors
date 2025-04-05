(function($) {



    "use strict";



    /* ---------------------------------------------



    Navigation menu



    --------------------------------------------- */





    // dropdown for mobile

    /* is_exist() */

    jQuery.fn.is_exist = function() {

        return this.length;

    }



    var TechexGlobal = function($scope, $) {

        if ($scope.hasClass('techex-sticky-yes')) {

            var current_widget = $scope;

            current_widget.wrap('<div class="sticky-wrapper"></div>');

            var headerHeight = $(current_widget).parent('.sticky-wrapper').height(),

                stickyWrapper = $(current_widget).parent('.sticky-wrapper');

            stickyWrapper.css('height', headerHeight + "px")

            window.onscroll = function() {

                scrollFunction()

            };



            function scrollFunction() {



                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {

                    if ($scope.hasClass('techex-sticky-yes')) {

                        stickyWrapper.addClass("is-sticky");

                        console.log(stickyWrapper);

                    }

                } else {

                    if ($scope.hasClass('techex-sticky-yes')) {

                        stickyWrapper.removeClass("is-sticky");

                    }

                }

                if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {

                    if ($scope.hasClass('techex-sticky-yes')) {

                        $scope.addClass("reveal-sticky");

                    }

                } else {

                    if ($scope.hasClass('techex-sticky-yes')) {

                        $scope.removeClass("reveal-sticky");

                    }

                }



            }



        }

    }



    var HeroSliderOne = function($scope, $) {

        var hs_one = $scope.find('.hero-slider-active');

        if (hs_one.length === 0)

            return false;

        var settings = hs_one.data('settings');

        hs_one.owlCarousel({

            loop: settings['loop'],

            nav: settings['nav'],

            autoplay: settings['autoplay'],

            singleItem: true,

            animateIn: 'fadeIn',

            animateOut: 'fadeOut',

            dots: settings['dots'],

            autoplayTimeout: settings['autoplaytimeout'],

            items: 1,

            mouseDrag: settings['mousedrag'],

            navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],

        })

    };









    var HeroSlidertwo = function($scope, $) {

        var hs_two = $scope.find('.hero-slider-2');



        if (hs_two.length === 0)

            return false;



        var heros = hs_two.data('settings');



        hs_two.owlCarousel({

            items: 1,

            nav: heros['nav'],

            dots: heros['dots'],

            loop: heros['loop'],

            mouseDrag: heros['mousedrag'],

            singleItem: true,

            animateIn: 'fadeIn',

            animateOut: 'fadeOut',

            autoplayTimeout: heros['autoplaytimeout'],

            autoplay: heros['autoplay'],

            navText: ['<i class="eicon-arrow-left"></i>', '<i class="eicon-arrow-right"></i>'],



        });



    }



    var Testimonial_slider_Two = function($scope, $) {

        var hs_two = $scope.find('.techex-testimonial-2');



        if (hs_two.length === 0)

            return false;



        var heros = hs_two.data('settings');



        hs_two.owlCarousel({

            items: 1,

            nav: heros['nav'],

            dots: heros['dots'],

            loop: heros['loop'],

            mouseDrag: heros['mousedrag'],

            singleItem: true,

            autoplayTimeout: heros['autoplaytimeout'],

            autoplay: heros['autoplay'],

            navText: ['<i class="eicon-arrow-left"></i>', '<i class="eicon-arrow-right"></i>'],



        });



    }



    var project_slider_06 = function($scope, $) {

        var hs_two = $scope.find('.project-carousel-card-active');



        if (hs_two.length === 0)

            return false;



        var heros = hs_two.data('settings');



        hs_two.owlCarousel({

            items: 4,

            nav: heros['nav'],

            dots: heros['dots'],

            loop: heros['loop'],

            mouseDrag: heros['mousedrag'],

            singleItem: true,

            autoplayTimeout: heros['autoplaytimeout'],

            autoplay: heros['autoplay'],

            navText: ['<i class="eicon-arrow-left"></i>', '<i class="eicon-arrow-right"></i>'],

            responsive: {

                // breakpoint from 0 up

                0: {

                    items: 1

                },

                767: {

                    items: 2

                },

                // breakpoint from 992 up

                1191: {

                    items: 3

                },

                1366: {

                    items: 4

                },

            }



        });



    }



    var testimonial_slider_06 = function($scope, $) {

        var hs_two = $scope.find('.agent-element');



        if (hs_two.length === 0)

            return false;



        var heros = hs_two.data('settings');



        hs_two.owlCarousel({

            nav: heros['nav'],

            dots: heros['dots'],

            loop: heros['loop'],

            mouseDrag: heros['mousedrag'],

            singleItem: true,

            autoplayTimeout: heros['autoplaytimeout'],

            autoplay: heros['autoplay'],

            navText: ['<i class="eicon-arrow-left"></i>', '<i class="eicon-arrow-right"></i>'],

            responsive: {

                // breakpoint from 0 up

                0: {

                    items: 1

                },

                767: {

                    items: 1

                },

                // breakpoint from 992 up

                1191: {

                    items: 2

                },



            }



        });



    }



    var testimonial_slider_07 = function($scope, $) {

        var hs_two = $scope.find('.testimonial_widget');



        if (hs_two.length === 0)

            return false;



        var heros = hs_two.data('settings');



        hs_two.owlCarousel({

            nav: heros['nav'],

            dots: heros['dots'],

            loop: heros['loop'],

            mouseDrag: heros['mousedrag'],

            singleItem: true,

            autoplayTimeout: heros['autoplaytimeout'],

            autoplay: heros['autoplay'],

            navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],

            responsive: {

                // breakpoint from 0 up

                0: {

                    items: 1

                },

                // breakpoint from 992 up

                1191: {

                    items: 2

                }

            }



        });



    }





    var navMenu = function($scope, $) {



        $('.techex-mega-menu').closest('.elementor-container').addClass('megamenu-full-container');

        var count = 0;

        $(".main-navigation ul.navbar-nav>li.techex-mega-menu>.sub-menu>li").each(function(index) {

            count++;

            if ($(this).is('li:last-child')) {

                $(this).parent().addClass('mg-column-' + count);

                count = 0;

            }

        });



        $('.main-navigation ul.navbar-nav>li').each(function(i, v) {

            $(v).find('a').contents().wrap('<span class="menu-item-text"/>')

        });

        $(".menu-item-has-children > a").append('<span class="dropdownToggle"><i class="fas fa-angle-down"></i></span>');



        function navMenu() {



            if (jQuery('.techex-main-menu-wrap').hasClass('menu-style-inline')) {

                if (jQuery(window).width() < 1025) {

                    jQuery('.techex-main-menu-wrap').addClass('menu-style-flyout');

                    jQuery('.techex-main-menu-wrap').removeClass('menu-style-inline');

                } else {

                    jQuery('.techex-main-menu-wrap').removeClass('menu-style-flyout');

                    jQuery('.techex-main-menu-wrap').addClass('menu-style-inline');

                }



                $(window).resize(function() {

                    if (jQuery(window).width() < 1025) {

                        jQuery('.techex-main-menu-wrap').addClass('menu-style-flyout');

                        jQuery('.techex-main-menu-wrap').removeClass('menu-style-inline');

                    } else {

                        jQuery('.techex-main-menu-wrap').removeClass('menu-style-flyout');

                        jQuery('.techex-main-menu-wrap').addClass('menu-style-inline');

                    }

                })

            }



            // main menu toggleer icon (Mobile site only)

            $('[data-toggle="navbarToggler"]').on("click", function(e) {

                $('.navbar').toggleClass('active');

                $('.navbar-toggler-icon').toggleClass('active');

                $('body').toggleClass('offcanvas--open');

                e.stopPropagation();

                e.preventDefault();



            });

            $('.navbar-inner').on("click", function(e) {

                e.stopPropagation();

            });



            // Remove class when click on body

            $('body').on("click", function() {

                $('.navbar').removeClass('active');

                $('.navbar-toggler-icon').removeClass('active');

                $('body').removeClass('offcanvas--open');

            });

            $('.main-navigation ul.navbar-nav li.menu-item-has-children>a').on("click", function(e) {

                e.preventDefault();

                $(this).siblings('.sub-menu').toggle();

                $(this).parent('li').toggleClass('dropdown-active');

            })





        }

        navMenu();

    }





    // Testimonial

    var Techex_Testimonial_Js = function($scope, $) {

        var wrapper = $scope.find(".testimonial-slider");

        if (wrapper.length === 0)

            return;

        var settings = wrapper.data('settings');

        wrapper.slick({

            infinite: true,

            speed: 900,

            slidesToShow: settings['per_coulmn'],

            slidesToScroll: 1,

            autoplay: settings['autoplay'],

            autoplaySpeed: settings['autoplaytimeout'],

            draggable: settings['mousedrag'],

            dots: settings['dots'],

            lazyLoad: 'ondemand',

            dotsClass: "testimonial-slider-dot-list",

            swipe: true,

            nav: false,

            responsive: [{

                    breakpoint: 1600,

                    settings: {

                        slidesToShow: settings['per_coulmn'],

                        slidesToScroll: 1,

                    },

                },

                {

                    breakpoint: 1000,

                    settings: {

                        slidesToShow: settings['per_coulmn_tablet'],

                        slidesToScroll: 1,

                    },

                },

                {

                    breakpoint: 767,

                    settings: {

                        slidesToShow: settings['per_coulmn_mobile'],

                        slidesToScroll: 1,

                        vertical: false,

                    },

                },

            ],

        });

    }





    //Case Srudy

    var Techex_Case_Js = function() {

        if ($.fn.isotope) {



            var $gridMas = $('.techex-case-study-wrap.layout-mode-masonry');

            var $grid = $('.techex-case-study-wrap.layout-mode-normal');



            $grid.isotope({

                itemSelector: '.techex-case-study-item-wrap',

                percentPosition: true,

            }).resize()



            $grid.imagesLoaded().progress(function() {

                $grid.isotope('layout')

            }).resize();



            $gridMas.isotope({

                itemSelector: '.techex-case-study-item-wrap',

                percentPosition: true,

            })



            $gridMas.imagesLoaded().progress(function() {

                $gridMas.isotope('layout')

            });



            $grid.isotope().resize();

            $gridMas.isotope().resize();



            $(".case-isotope-nav li").on('click', function() {

                $(".case-isotope-nav li").removeClass("active");

                $(this).addClass("active");



                var selector = $(this).attr("data-filter");

                $gridMas.isotope({

                    filter: selector,

                    animationOptions: {

                        duration: 750,

                        easing: "linear",

                        queue: false,

                    }

                });



                var selector = $(this).attr("data-filter");

                $grid.isotope({

                    filter: selector,

                    animationOptions: {

                        duration: 750,

                        easing: "linear",

                        queue: false,

                    }

                });





            });



        }



    }





    function hello($scope, $) {

        //case study js active

        var casestudy_carosel = $scope.find('.casestudy-slider-active');



        console.log(casestudy_carosel);



        if (casestudy_carosel.length === 0)

            return false;



        var case_data = casestudy_carosel.data('settings');



        casestudy_carosel.owlCarousel({

            margin: 24,

            items: 1,

            nav: case_data['nav'],

            dots: case_data['dots'],

            loop: case_data['loop'],

            mouseDrag: case_data['mousedrag'],

            singleItem: true,

            animateIn: 'fadeIn',

            animateOut: 'fadeOut',

            autoplayTimeout: case_data['autoplaytimeout'],

            autoplay: case_data['autoplay'],

            navText: ['<i class="eicon-arrow-left"></i>', '<i class="eicon-arrow-right"></i>'],

            responsive: {

                1600: {

                    items: case_data['per_coulmn'],

                },

                1000: {

                    items: case_data['per_coulmn_tablet'],

                },

                767: {

                    items: case_data['per_coulmn_mobile'],

                }

            }

        });

    }

    $(window).on("elementor/frontend/init", function() {
        elementorFrontend.hooks.addAction("frontend/element_ready/techex_circle_progressbar.default", function($scope) {
            $scope.find(".circle").each(function() {
                var element = $(this)[0];
                var progressbar_linecap = $(this).data('progressbar_linecap');
                var progressbar_round_color = $(this).data('progressbar_round_color');
                var progressbar_round_bg = $(this).data('progressbar_round_bg');
                if (element) {
                    $(element).circleProgress({
                        size: 120,
                        lineCap: progressbar_linecap,
                        fill: { color: progressbar_round_color },
                        emptyFill: progressbar_round_bg,
                    })
                }
            });
        })
    });


    $(window).on("elementor/frontend/init", function() {



        elementorFrontend.hooks.addAction("frontend/element_ready/techex-hp-testimonial-sliders.default", testimonial_slider_06);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-testimonial-slider-three.default", testimonial_slider_07);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-hp-project-slider.default", project_slider_06);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-hero-one.default", HeroSliderOne);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-hero-two.default", HeroSlidertwo);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-testimonial-loop.default", Techex_Testimonial_Js);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-testimonial-2.default", Testimonial_slider_Two);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-case-study.default", Techex_Case_Js);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-case-study.default", hello);

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-main-menu.default", navMenu);

        elementorFrontend.hooks.addAction("frontend/element_ready/global", TechexGlobal);

    });



})(jQuery);