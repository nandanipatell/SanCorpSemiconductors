(function ($) {

    "use strict";

    /* ---------------------------------------------

    Navigation menu

    --------------------------------------------- */

    // dropdown for mobile
    /* is_exist() */
    jQuery.fn.is_exist = function(){
        return this.length;
    }


    $(document).ready(function () {


    });

    $(window).load(function () {

    })

  var TechexGlobal = function ($scope, $) {
    if ($scope.hasClass('techex-sticky-yes')) {
      var current_widget = $scope;
      current_widget.wrap('<div class="sticky-wrapper"></div>');
      var headerHeight = $(current_widget).parent('.sticky-wrapper').height(),
        stickyWrapper = $(current_widget).parent('.sticky-wrapper');
      stickyWrapper.css('height', headerHeight + "px")
      window.onscroll = function () {
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

    var TechexductCategories = function () {
        if ($.fn.isotope) {
            var $gridMas = $('.product-categories-wrap.masonry');

            $gridMas.isotope({
                itemSelector: '.techex-product-cat-wrap',
                percentPosition: true,
                layoutMode: 'packery',
            })

            $gridMas.imagesLoaded().progress(function () {
                $gridMas.isotope()
            });
        }
    }

    var ShadePostLoop = function () {
        if ($.fn.isotope) {

            $('.techex-post-widget-area.masonry').isotope({
                itemSelector: '.techex-post-widget-area.masonry>div',
                percentPosition: true,
                layoutMode: 'packery',
            })

        }
    }

    var ShadeJobLoop = function () {
        if ($.fn.owlCarousel) {
            $('.techex-job-carousel').owlCarousel({
                margin: 30,
                responsiveClass: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    768: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            })
        }
    }



    //portfolio gallery js start
    var Techex_Portfolio_Gallery_Js = function ($scope , $) {

        if ($.fn.isotope) {
                var gridMas = $('.techex-pf-gallery-wrap.layout-mode-masonry');

                gridMas.isotope({
                    itemSelector: '.techex-pf-gallery-wrap .techex-portfolio-item-wrap',
                    percentPosition: true,
                    layoutMode: 'packery',
                }).resize();

                gridMas.imagesLoaded().progress(function () {
                    gridMas.isotope()
                });
        }


        if ($(".techex-pf-gallery-slider").length > 0) {
            var wrapper = $scope.find(".techex-pf-gallery-slider");
            if (wrapper.length === 0)
                return;
            var settings = wrapper.data('settings');

            wrapper.slick({
                infinite: settings['loop'],
                speed: 900,
                slidesToShow: settings['per_coulmn'],
                slidesToScroll: 1,
                autoplay:  settings['autoplay'],
                autoplaySpeed: settings['autoplaytimeout'],
                arrows: settings['nav'],
                prevArrow: '<button type="button" class="techex-slick-prev">'+ settings.prev_icon +'</button>',
                nextArrow: '<button type="button" class="techex-slick-next">'+ settings.next_icon +'</button>',
                draggable: settings['mousedrag'],
                dots: settings['dots'],
                lazyLoad: 'ondemand',
                dotsClass: "techex-pf-gallery-slider-dots",
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: settings['per_coulmn_tablet'],
                        },
                    },
                    {
                        breakpoint: 450,
                        settings: {
                            slidesToShow: settings['per_coulmn_mobile'],
                        },
                    },
                ],
            });

        }
    }



    var Techex_Team_Js = function ($scope , $) {

        var wrapper = $scope.find(".team-slider");
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
                arrows: settings['nav'],
                draggable: settings['mousedrag'],
                dots: settings['dots'],
                lazyLoad: 'ondemand',
                dotsClass: "team-slider-dot-list",
                swipe: true,
                appendArrows: '.team-slider-arrow',
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
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
                        },
                    },
                ],
            });

            $(document).ready(function() {
                $('.team-slider-arrow button').click(function() {
                    $('.team-slider-arrow button').removeClass("slick-active");
                    $(this).addClass("slick-active");
                });
            });


    }

    var Techex_Testimonial_Js = function ($scope , $) {
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
                arrows: settings['nav'],
                draggable: settings['mousedrag'],
                dots: settings['dots'],
                lazyLoad: 'ondemand',
                dotsClass: "testimonial-slider-dot-list",
                swipe: true,
                vertical: settings['show_vertical'],
                appendArrows: '.team-slider-arrow',
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
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

    /* services-slider*/

    var Techex_services_Js = function ($scope , $) {

        var wrapper = $scope.find(".services-slider");

        var settings = wrapper.data('settings');
        console.log(settings);
        wrapper.slick({
            infinite: settings['loop'],
            speed: 900,
            slidesToShow: settings['per_coulmn'],
            slidesToScroll: 1,
            autoplay: settings['autoplay'],
            autoplaySpeed: settings['autoplaytimeout'],
            arrows: settings['nav'],
            draggable: settings['mousedrag'],
            dots: settings['dots'],
            lazyLoad: 'ondemand',
            dotsClass: "services-slider-dot-list",
            swipe: true,
            appendArrows: '.services-slider-arrow',
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            responsive: [{
                slidesToShow: settings['per_coulmn'],
                    settings: {
                        slidesToScroll: 2,
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


/*  Scrineshot Image Slider */

  var TechexImageCarousel = function ($scope, $) {

    var icarousel = $scope.find(".screenshot-slider");
    var datas = icarousel.data('apps');

    var rtl = $('body').hasClass('rtl') ? true : false;
    var apps = $('.screenshot-slider');

    if(apps.is_exist() ){
      apps.slick({
        rtl:rtl,
        loop:true,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: datas['dots'],
        arrows: datas['nav'],
        appendArrows: '.screenshot-slider-arrow',
        prevArrow: $('.prev'),
         nextArrow: $('.next'),
        centerMode: true,
        centerPadding: '130px',
        autoplay: datas['autoplay'],
        autoplaySpeed: datas['autoplaytimeout'],
        infinite: datas['loop'],
        easing: 'linear',
        speed: 800,
        appendDots: ".screenshots-dots",
        responsive: [{
            breakpoint: 1800,
            settings: {
              slidesToShow: 5,
              centerPadding: '100px',

            }
          },
          {
            breakpoint: 1750,
            settings: {
              slidesToShow: 5,
              centerPadding: '20px',

            }
          },
          {
            breakpoint: 1670,
            settings: {
              slidesToShow: 4,
              centerPadding: '60px',

            }
          },
          {
            breakpoint: 1640,
            settings: {
              slidesToShow: 3,
              centerPadding: '20px',

            }
          },
          {
            breakpoint: 1550,
            settings: {
              slidesToShow: 3,
              centerPadding: '30px',

            }
          },
          {
            breakpoint: 1450,
            settings: {
              slidesToShow: 3,
              centerPadding: '10px',

            }
          },
          {
            breakpoint: 1350,
            settings: {
              slidesToShow: 3,
              centerPadding: '20px',

            }
          },
          {
            breakpoint: 1250,
            settings: {
              slidesToShow: 3,
              centerPadding: '10px',

            }
          },
          {
            breakpoint: 1150,
            settings: {
              slidesToShow: 3,
              centerPadding: '0px',

            }
          },
          {
            breakpoint: 1050,
            settings: {
              slidesToShow: 1,
              centerPadding: '10px',

            }
          },
          {
            breakpoint: 950,
            settings: {
              slidesToShow: 1,
              centerPadding: '0',

            }
          },
          {
            breakpoint: 850,
            settings: {
              slidesToShow: 1,
              centerPadding: '20px',
            }
          },
          {
            breakpoint: 750,
            settings: {
              slidesToShow: 1,
              centerPadding: '20px',
            }
          },
          {
            breakpoint: 650,
            settings: {
              slidesToShow: 1,
              centerPadding: '10px',
            }
          },
          {
            breakpoint: 515,
            settings: {
              slidesToShow: 1,
              autoplay: true,
              centerPadding: '0px',
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              autoplay: true,
              centerPadding: '0px',
              arrows: false,
            }
          }

        ]
      }) }
  }

    //portfolio js start



    var Techex_Portfolio_Js = function ($scope,$) {
        if ($.fn.isotope) {

                var $gridMas = $('.techex-portfolio-wrap.layout-mode-masonry');
                var $grid = $('.techex-portfolio-wrap.layout-mode-normal.enable-filter-yes');

                $grid.isotope({
                    itemSelector: '.techex-portfolio-item-wrap',
                    percentPosition: true,
                    layoutMode: 'fitRows',
                }).resize()

                $grid.imagesLoaded().progress(function () {
                    $grid.isotope('layout')
                }).resize();

                $gridMas.isotope({
                    itemSelector: '.techex-portfolio-item-wrap',
                    percentPosition: true,
                    layoutMode: 'packery',
                })

                $gridMas.imagesLoaded().progress(function () {
                    $gridMas.isotope('layout')
                });

                $grid.isotope().resize();
                $gridMas.isotope().resize();

                $(".pf-isotope-nav li").on('click', function () {
                    $(".pf-isotope-nav li").removeClass("active");
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

//Portfolio slider

        var wrapper = $scope.find(".portfolio-slider");
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
                arrows: settings['nav'],
                draggable: settings['mousedrag'],
                dots: settings['dots'],
                lazyLoad: 'ondemand',
                dotsClass: "portfolio-slider-dot-list",
                swipe: true,
                appendArrows: '.portfolio-slider-arrow',
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
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
                        },
                    },
                ],
            });

        // comment load more button click event
        $('.techex-pf-loadmore-btn').on('click', function () {
            var button = $(this);

            // decrease the current comment page value
            var dpaged = button.data('paged'),
                total_pages = button.data('total-page'),
                nonce = button.data('referrar'),
                ajaxurl = button.data('url');

            dpaged++;
            // console.log(foio_portfolio_js_datas);
            $.ajax({
                url: ajaxurl, // AJAX handler, declared before
                dataType: 'html',
                data: {
                    'action': 'techex_loadmore_callback', // wp_ajax_cloadmore
                    // 'post_id': foio_portfolio_js_datas.parent_post_id, // the current post
                    'paged': dpaged, // current comment page
                    'folio_nonce': nonce,
                    'portfolio_settings': button.data('portfolio-settings'),
                },
                type: 'POST',
                beforeSend: function (xhr) {
                    button.text('Loading...'); // preloader here
                },
                success: function (data) {
                    if (data) {
                        $('.techex-portfolio-wrap').append(data);
                        $('.techex-portfolio-wrap').isotope('reloadItems').isotope()
                        button.text('More projects');
                        button.data('paged', dpaged);
                        // if the last page, remove the button
                        if (total_pages == dpaged)
                            button.remove();
                    } else {
                        button.remove();
                    }
                }
            });
            return false;
        });


        // $('a.popup-icon').on('click', function(event) {
        //     event.preventDefault();

        //     var gallery = $(this).attr('href');

        //     $(gallery).magnificPopup({
        //         type:'image',
        //         gallery: {
        //             enabled: true
        //         }
        //     }).magnificPopup('open');
        // });

        $(".popup-icon").magnificPopup({
            type: 'image',
            gallery:{
                enabled:true
            }
       });




    }



    //Job js start
    var Techex_Job_Js = function () {
        if ($.fn.isotope) {

                var $gridMas = $('.techex-job-wrap.layout-mode-masonry');
                var $grid = $('.techex-job-wrap.layout-mode-normal');

                $grid.isotope({
                    itemSelector: '.techex-job-item-wrap',
                    percentPosition: true,
                }).resize()

                $grid.imagesLoaded().progress(function () {
                    $grid.isotope('layout')
                }).resize();

                $gridMas.isotope({
                    itemSelector: '.techex-job-item-wrap',
                    percentPosition: true,
                })

                $gridMas.imagesLoaded().progress(function () {
                    $gridMas.isotope('layout')
                });

                $grid.isotope().resize();
                $gridMas.isotope().resize();

                $(".jf-isotope-nav li").on('click', function () {
                    $(".jf-isotope-nav li").removeClass("active");
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

        // comment load more button click event
        $('.techex-jf-loadmore-btn').on('click', function () {
            var button = $(this);

            // decrease the current comment page value
            var dpaged = button.data('paged'),
                total_pages = button.data('total-page'),
                nonce = button.data('referrar'),
                ajaxurl = button.data('url');

            dpaged++;
            // console.log(foio_job_js_datas);
            $.ajax({
                url: ajaxurl, // AJAX handler, declared before
                dataType: 'html',
                data: {
                    'action': 'techex_loadmore_callback', // wp_ajax_cloadmore
                    // 'post_id': foio_job_js_datas.parent_post_id, // the current post
                    'paged': dpaged, // current comment page
                    'folio_nonce': nonce,
                    'job_settings': button.data('job-settings'),
                },
                type: 'POST',
                beforeSend: function (xhr) {
                    button.text('Loading...'); // preloader here
                },
                success: function (data) {
                    if (data) {
                        $('.techex-job-wrap').append(data);
                        $('.techex-job-wrap').isotope('reloadItems').isotope()
                        button.text('More projects');
                        button.data('paged', dpaged);
                        // if the last page, remove the button
                        if (total_pages == dpaged)
                            button.remove();
                    } else {
                        button.remove();
                    }
                }
            });
            return false;
        });

    }

    var techexTestimonail = function ($scope, $) {

        var postwrapper = $scope.find(".techex--testimonial");
        if (postwrapper.length === 0)
            return;
        var settings = postwrapper.data('settings');

        /*--------------------------------------------------------------
        techex slider js
        --------------------------------------------------------------*/
        var postwrapper = $('.techex--testimonial'),
            rtl = $('body').hasClass('rtl') ? true : false;

        postwrapper.owlCarousel({
            rtl: rtl,
            loop: settings['loop'],
            autoplay: settings['autoplay'],
            nav: settings['nav'],
            mouseDrag:settings['mousedrag'],
            dots:settings['dots'],
            autoplaytimeout: settings['autoplaytimeout'],
            items: settings['per_coulmn'],
            centerMode: false,
            navText: [settings.prev_icon, settings.next_icon],
            responsive:{
                0:{
                    items: settings['per_coulmn_mobile'],
                    mouseDrag:settings['mousedrag']
                },
                768:{
                    items: settings['per_coulmn_tablet'],
                    mouseDrag:settings['mousedrag']
                },
                1025:{
                    items:settings['per_coulmn'],
                    mouseDrag:settings['mousedrag']
                }
            }




        });

    }


    var techexTeam = function ($scope, $) {

        var postwrapper = $scope.find(".techex--team");
        if (postwrapper.length === 0)
            return;

        var settings = postwrapper.data('settings');

        /*--------------------------------------------------------------
        techex slider js
        --------------------------------------------------------------*/
        var postwrapper = $('.techex--team'),
            rtl = $('body').hasClass('rtl') ? true : false;

        postwrapper.owlCarousel({
            rtl: rtl,
            stagePadding: 200,
            dots:settings['dots'],
            loop: settings['loop'],
            center: true,
            autoplay: settings['autoplay'],
            nav: settings['nav'],
            mouseDrag:settings['mousedrag'],
            autoplaytimeout: settings['autoplaytimeout'],
            items: settings['per_coulmn'],
            navText: [settings.prev_icon, settings.next_icon],
            responsive:{
                0:{
                    items: settings['per_coulmn_mobile'],
                    mouseDrag:settings['mousedrag'],
                    stagePadding: 0,
                },
                768:{
                    items: settings['per_coulmn_tablet'],
                    mouseDrag:settings['mousedrag'],
                    stagePadding: 0,
                },
                1025:{
                    items:settings['per_coulmn'],
                    mouseDrag:settings['mousedrag'],
                    stagePadding: 100,
                },

                1400:{
                    items:settings['per_coulmn'],
                    mouseDrag:settings['mousedrag'],
                    stagePadding: 200,
                }
            }
        });

    }

    var Techex_Back_To_Top = function ($scope, $) {
        //adding popup video

        $('.techex-popup-youtube').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
        });



        /*--------------------------------------------------------------
        techex slider js
        --------------------------------------------------------------*/
        var postwrapper = $('.techex--testimonial');

        jQuery(".techex-back-to-top-wraper").click(function () {
            jQuery("html, body").animate({
                scrollTop: 0
            }, 1000);
        });

        function stickyHeader($class) {
            jQuery(window).on('scroll', function () {
                var headerHeight = 600;
                if (jQuery(window).scrollTop() >= headerHeight) {
                    jQuery('.techex-back-to-top-wraper .techex-icon').addClass('sticky-active');
                } else {
                    jQuery('.techex-back-to-top-wraper .techex-icon').removeClass('sticky-active');
                }
            });
        }

        stickyHeader('.techex-back-to-top-wraper');

    }

    var navMenu = function ($scope, $) {

        $('.techex-mega-menu').closest('.elementor-container').addClass('megamenu-full-container');
        var count = 0;
        $(".main-navigation ul.navbar-nav>li.techex-mega-menu>.sub-menu>li").each(function (index) {
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

                $(window).resize(function () {
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
                $('[data-toggle="navbarToggler"]').on("click", function (e) {
                    $('.navbar').toggleClass('active');
                    $('.navbar-toggler-icon').toggleClass('active');
                    $('body').toggleClass('offcanvas--open');
                    e.stopPropagation();
                    e.preventDefault();

                });
                $('.navbar-inner').on("click", function (e) {
                    e.stopPropagation();
                });

                // Remove class when click on body
                $('body').on("click", function () {
                    $('.navbar').removeClass('active');
                    $('.navbar-toggler-icon').removeClass('active');
                    $('body').removeClass('offcanvas--open');
                });
                $('.main-navigation ul.navbar-nav li.menu-item-has-children>a').on("click", function (e) {
                    e.preventDefault();
                    $(this).siblings('.sub-menu').toggle();
                    $(this).parent('li').toggleClass('dropdown-active');
                })


        }


        navMenu();
    }



//Portfolio slider






    $(window).on("elementor/frontend/init", function () {

        elementorFrontend.hooks.addAction("frontend/element_ready/techex-portfolio-gallery.default", Techex_Portfolio_Gallery_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-product-categories.default", TechexductCategories);
        // elementorFrontend.hooks.addAction("frontend/element_ready/techex-cowork-search.default", ShadeSearch);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-job-loop.default", ShadeJobLoop);
        elementorFrontend.hooks.addAction("frontend/element_ready/blog-loop.default", ShadePostLoop);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-testimonial-loop.default", Techex_Testimonial_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-service.default", Techex_services_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex_team.default", techexTeam);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-back-to-top.default", Techex_Back_To_Top);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-portfolio.default", Techex_Portfolio_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-image-carousels.default", TechexImageCarousel);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-job.default", Techex_Job_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex-main-menu.default", navMenu);
        elementorFrontend.hooks.addAction("frontend/element_ready/techex_team.default", Techex_Team_Js);
        elementorFrontend.hooks.addAction("frontend/element_ready/global", TechexGlobal);

    });

})(jQuery);