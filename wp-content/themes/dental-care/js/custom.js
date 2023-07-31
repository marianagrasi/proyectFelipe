/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
1.0 Mobile Menu
2.0 Back to top
3.0 Sticky Header
4.0 Search Toggle
5.0 Fit Vids
6.0 Lightbox
7.0 Isotope
8.0 Blog Gallery
9.0 Blog Grid Gallery Slider
10.0 Animations
11.0 Smooth Scrolling
12.0 Counter
13.0 Icon Box
14.0 Testimonials Widget
15.0 Before & After
16.0 Blog Carousel
17.0 Brand Carousel
18.0 Product Carousel
19.0 Service Carousel
20.0 Team Carousel
21.0 Testimonial Carousel
22.0 Animations
--------------------------------------------------------------*/

jQuery(document).ready(function ($) {
  "use strict";

  /*--------------------------------------------------------------
  1.0 Mobile Menu
  --------------------------------------------------------------*/
  var side = $(".mobile-header").data('side');
  var displace_en = $(".mobile-header").data('displace');
  var displace;

  if(displace_en == ''){
    displace_en = 'on';
  }

  if(side == ''){
    side = 'right';
  }

  if(displace_en == 'off'){
    displace = false;
  }else{
    displace = true
  }
  $('#mobile-menu-toggle-icon').sidr({
    side: side,
    speed: 500,
    name: 'mobile-menu',
    source: '.mobile-menu',
    displace: displace
  });

  $('body').on("click", function () {
    $.sidr('close', 'mobile-menu');
  });


  $(".hamburger").on("click", function() {
    $(this).toggleClass('is-active');
    $(".mobile-menu-area").slideToggle();
  });

  $('.mobile-menu .sub-menu').hide();

  $('.mobile-submenu-toggle').on("click", function() {
    $(this).parent().find('.sub-menu').slideToggle();
  });

  /*--------------------------------------------------------------
  Mobile Top Header
  --------------------------------------------------------------*/
  $(".mobile-top-header-toggle-btn").on("click", function() {
    $(this).find(".fa").toggleClass("fa-caret-down").toggleClass("fa-caret-up");
    $(".header-top-mobile").slideToggle();
  });


  /*--------------------------------------------------------------
  2.0 Back to top
  --------------------------------------------------------------*/
  $(window).on("scroll", function() {
    if ($(this).scrollTop() > 450) {
      $('#to-top').fadeIn();
    } else {
      $('#to-top').fadeOut();
    }
  });
  $('#to-top').on("click", function() {
    $('html, body').animate({scrollTop: 0}, 1000);
    return false;
  });

  /*--------------------------------------------------------------
  3.0 Sticky Header
  --------------------------------------------------------------*/
  $(window).on("scroll", function() {
    if ($(this).scrollTop() > 250) {
      var offset = $(".sticky-header-wrapper").data('offset');
      $(".sticky-header-wrapper").css({"visibility": "visible", "opacity": "1", "position": "fixed", "top": offset});
    } else {
      $(".sticky-header-wrapper").css({"visibility": "hidden", "opacity": "0", "top": "-30px"});
    }
  });

  /*--------------------------------------------------------------
  4.0 Search Toggle
  --------------------------------------------------------------*/
  $(".search-toggle").on("click", function() {
    $(".search-box-wrapper").toggle();
  });

  /*--------------------------------------------------------------
  5.0 FitVids
  --------------------------------------------------------------*/
  $("#main-content").fitVids();
  $("#content").fitVids();

  /*--------------------------------------------------------------
  6.0 Lightboxes
  --------------------------------------------------------------*/
  $('.gallery-lightbox-en, .stronghold-masonry-gallery').magnificPopup({
  delegate: 'a', // child items selector, by clicking on it popup will open
  type: 'image',
    zoom: {
           enabled: true,
           duration: 300, // duration of the effect, in milliseconds
           easing: 'ease-in-out' // CSS transition
          },
  gallery:{
    enabled:true
  }
  // other options
});

  /*--------------------------------------------------------------
  7.0 Isotope
  --------------------------------------------------------------*/
  var $container = $('.isotope-cat-container');
  $container.imagesLoaded(function () {

    $container.fadeIn(1500).isotope({
      filter: '*',
      itemSelector: '.iso-cat-item',
      layoutMode: 'fitRows',
      transitionDuration: '0.85s',
    });
  });

  var $container2 = $('.isotope-images-container');
  $container2.imagesLoaded(function () {

    $container2.fadeIn(1500).isotope({
      filter: '*',
      itemSelector: '.iso-cat-item',
      layoutMode: 'fitRows',
      transitionDuration: '0.85s',
      percentPosition: true,
      fitRows: {
        columnWidth: 364,
        gutter: 10
      }
    });
  });

  $('.isotope-filter a').on("click", function() {
    $('.isotope-filter .current').removeClass('current');
    $(this).addClass('current');

    var selector = $(this).attr('data-filter');
    $container2.isotope({
      filter: selector,
    });
    $container.isotope({
      filter: selector,
    });
    return false;
  });


  /*--------------------------------------------------------------
  8.0 Blog Gallery
  --------------------------------------------------------------*/
  if ($('.gallery-featured-slider').children('.gallery-slide-img').length > 1) {
    var $loopSet = true;
  } else {
    var $loopSet = false;
  }

  $(".gallery-featured-slider").slick({
    slidesToShow: 1,
    infinite: $loopSet,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false
  });


  /*--------------------------------------------------------------
  9.0 Blog Grid Gallery Slider
  --------------------------------------------------------------*/
  if ($('.gallery-featured-slider-grid-widget').children('.gallery-slide-img').length > 1) {
    var $loopSet = true;
  } else {
    var $loopSet = false;
  }

  $(".gallery-featured-slider-grid-widget").slick({
    slidesToShow: 1,
    infinite: $loopSet,
    autoplay: true,
    autoplaySpeed: 4000,
    arrows: false
  });


  /*--------------------------------------------------------------
  10.0 Animations
  --------------------------------------------------------------*/
  if ($(window).width() > 800) {
    $('.comments-area, .search-content, .above-shop, .widget-area, .single-gallery-wrapper, .service-content, .team-member-main-info, .team-member-additional-details, .team-member-detail, .tech-life-blog-grid .col-md-4, .service-block, .service-block-block-item, .team-member-block-list-img-wrapper, .team-member-block, .dental-care-blog-item, .blog-grid-widget-item-left, .blog-grid-widget-item-right, .dental-care-brands, .dental-care-product-item, .service-block, .dental-care-gallery-widget, .team-member-block, .dental-care-testimonials-item, .article-wrapper, .shop-content, .product_item, .author-box, .related-posts, .company-info-wid, .opening-hours-wid, .recent-widget, .social-widget').viewportChecker({
      classToAdd: 'animated fadeIn',
      offset: 10
    });
  }

  /*--------------------------------------------------------------
  11.0 Smooth Scrolling
  --------------------------------------------------------------*/
  $(function () {
    $('.masthead a[href*="#"]:not([href="#"]), .header-three .main-navigation a[href*="#"]:not([href="#"])').on("click", function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - 100
          }, 1000);
          return false;
        }
      }
    });
  });

  /*--------------------------------------------------------------
  12.0 Counter
  --------------------------------------------------------------*/
  var runonce = true;
  $('.stronghold-counter-wrapper').waypoint(function () {
    if (runonce == true) {
      $('.counter-number-val').countTo({
        delay: 60,
        speed: 2500,
        refreshInterval: 30,
        time: 4000
      });
      runonce = false;
    }
  }, {offset: '80%', triggerOnce: true});


  /*--------------------------------------------------------------
  13.0 Icon Box
  --------------------------------------------------------------*/
  $(".single-icon-box").on("mouseenter", function() {

    var hover = $(this).data('hoveren');

    if(hover == 'yes'){
      $(this).css("bottom", "10px");
    }


  });
  $(".single-icon-box").on("mouseleave", function() {


    var hover = $(this).data('hoveren');


    if(hover == 'yes'){
      $(this).css("bottom", "0");
    }


  });


  /*--------------------------------------------------------------
  14.0 Testimonials Widget
  --------------------------------------------------------------*/
  var speed = 5000;
  var carousel_speed = $(".dental-care-testimonials-widget").data("speed");

  if(carousel_speed != null){
    speed = carousel_speed;
  }


  $(".dental-care-testimonials-widget").slick({
    infinite:true,
    arrows:false,
    autoplay: true,
    autoplaySpeed: speed,
    slidesToShow: 1,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]

  });


  /*--------------------------------------------------------------
  15.0 Before & After
  --------------------------------------------------------------*/

  $(".stronghold-before-after").imagesLoaded(function() {
      var orientation = $(".stronghold-before-after").data("orientation");
    $(".stronghold-before-after").twentytwenty({
      orientation: orientation
    });
  });



  /*--------------------------------------------------------------
  16.0 Blog Carousel
  --------------------------------------------------------------*/
  var blogSpeed =  $(".dental-care-blog-items").data('speed');
  var blogItems =  $(".dental-care-blog-items").data('items');
  var blogCount =  $(".dental-care-blog-items").data('count');
  var blogLoop = true;
  var blogAuto = 5000;
  var blogItemCount = 3;

  if(blogCount < 1){
    blogLoop = false;
  }

  if(blogSpeed != null || blogSpeed != ""){
    blogAuto = blogSpeed;
  }

  if(blogItems != null || blogItems != ""){
    blogItemCount = blogItems;
  }

  $(".dental-care-blog-items").slick({
    infinite: blogLoop,
    autoplay: true,
    autoplaySpeed: blogAuto,
    arrows: false,
    slidesToShow: blogItemCount,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $(".dental-care-blog-wrapper .arrow_next_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickNext');
  });
  $(".dental-care-blog-wrapper .arrow_prev_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickPrev');
  });


  /*--------------------------------------------------------------
  17.0 Brand Carousel
  --------------------------------------------------------------*/
  var brandSpeed =  $(".dental-care-brands").data('speed');
  var brandItems =  $(".dental-care-brands").data('items');
  var brandCount =  $(".dental-care-brands").data('count');
  var brandLoop = true;
  var brandAuto = 5000;
  var brandItemCount = 3;

  if(brandCount < 1){
    brandLoop = false;
  }

  if(brandSpeed != null || brandSpeed != ""){
    brandAuto = brandSpeed;
  }

  if(brandItems != null || brandItems != ""){
    brandItemCount = brandItems;
  }

  $(".dental-care-brands").slick({
    infinite: brandLoop,
    autoplay: true,
    autoplaySpeed: brandAuto,
    arrows: false,
    slidesToShow: brandItemCount,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $(".dental-care-brands-wrapper .arrow_next_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickNext');
  });
  $(".dental-care-brands-wrapper .arrow_prev_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickPrev');
  });


  /*--------------------------------------------------------------
  18.0 Product Carousel
  --------------------------------------------------------------*/
  var productSpeed =  $(".dental-care-products").data('speed');
  var productItems =  $(".dental-care-products").data('items');

  var productLoop = true;
  var productAuto = 5000;
  var productItemCount = 3;

  if(productSpeed != null || productSpeed != ""){
    productAuto = productSpeed;
  }

  if(productItems != null || productItems != ""){
    productItemCount = productItems;
  }

  $(".dental-care-products").slick({
    infinite: true,
    autoplay: true,
    autoplaySpeed: productAuto,
    arrows: false,
    slidesToShow: productItemCount,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $(".products-wrapper .arrow_next_top, .stronghold-products-wrapper .arrow_next_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickNext');
  });
  $(".products-wrapper .arrow_prev_top, .stronghold-products-wrapper .arrow_prev_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickPrev');
  });

  /*--------------------------------------------------------------
  19.0 Service Carousel
  --------------------------------------------------------------*/
  var serviceSpeed =  $(".dental-care-service-carousel").data('speed');
  var serviceItems =  $(".dental-care-service-carousel").data('items');
  var serviceCount =  $(".dental-care-service-carousel").data('count');
  var serviceLoop = true;
  var serviceAuto = 5000;
  var serviceItemCount = 3;

  if(serviceCount < 1){
    serviceLoop = false;
  }

  if(serviceSpeed != null || serviceSpeed != ""){
    serviceAuto = serviceSpeed;
  }

  if(serviceItems != null || serviceItems != ""){
    serviceItemCount = serviceItems;
  }

  $(".dental-care-service-carousel").slick({
    infinite: serviceLoop,
    autoplay: true,
    autoplaySpeed: serviceAuto,
    arrows: false,
    slidesToShow: serviceItemCount,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $(".dental-care-services-wrapper .arrow_next_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickNext');
  });

  $(".dental-care-services-wrapper .arrow_prev_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickPrev');
  });


  /*--------------------------------------------------------------
  20.0 Team Carousel
  --------------------------------------------------------------*/
  var teamSpeed =  $(".dental-care-team-members-carousel").data('speed');
  var teamItems =  $(".dental-care-team-members-carousel").data('items');
  var teamCount =  $(".dental-care-team-members-carousel").data('count');
  var teamLoop = true;
  var teamAuto = 5000;
  var teamItemCount = 3;

  if(teamCount < 1){
    teamLoop = false;
  }

  if(teamSpeed != null || teamSpeed != ""){
    teamAuto = teamSpeed;
  }

  if(teamItems != null || teamItems != ""){
    teamItemCount = teamItems;
  }

  $(".dental-care-team-members-carousel").slick({
    infinite: teamLoop,
    autoplay: true,
    autoplaySpeed: teamAuto,
    arrows: false,
    slidesToShow: teamItemCount,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $(".dental-care-team-wrapper .arrow_next_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickNext');
  });
  $(".dental-care-team-wrapper .arrow_prev_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickPrev');
  });


  /*--------------------------------------------------------------
  21.0 Testimonial Carousel
  --------------------------------------------------------------*/
  var testimonialSpeed =  $(".dental-care-testimonials").data('speed');
  var testimonialItems =  $(".dental-care-testimonials").data('items');
  var testimonialCount =  $(".dental-care-testimonials").data('count');
  var testimonialLoop = true;
  var testimonialAuto = 5000;
  var testimonialItemCount = 3;

  if(testimonialCount < 1){
    testimonialLoop = false;
  }

  if(testimonialSpeed != null || testimonialSpeed != ""){
    testimonialAuto = testimonialSpeed;
  }

  if(testimonialItems != null || testimonialItems != ""){
    testimonialItemCount = testimonialItems;
  }

  $(".dental-care-testimonials").slick({
    infinite: testimonialLoop,
    autoplay: true,
    autoplaySpeed: testimonialAuto,
    arrows: false,
    slidesToShow: testimonialItemCount,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $(".dental-care-testimonials-wrapper .arrow_next_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickNext');
  });
  $(".dental-care-testimonials-wrapper .arrow_prev_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickPrev');
  });

  /*--------------------------------------------------------------
  21.0 Testimonial Slider
  --------------------------------------------------------------*/
  var testimonialSpeed =  $(".testimonials-slider").data('speed');
  var testimonialItems =  $(".testimonials-slider").data('items');
  var testimonialCount =  $(".testimonials-slider").data('count');
  var testimonialLoop = true;
  var testimonialAuto = 5000;
  var testimonialItemCount = 3;

  if(testimonialCount < 1){
    testimonialLoop = false;
  }

  if(testimonialSpeed != null || testimonialSpeed != ""){
    testimonialAuto = testimonialSpeed;
  }

  $(".testimonials-slider").slick({
    infinite: testimonialLoop,
    autoplay: true,
    autoplaySpeed: testimonialAuto,
    arrows: false,
    slidesToShow: 1,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $(".dental-care-testimonials-wrapper .arrow_next_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickNext');
  });
  $(".dental-care-testimonials-wrapper .arrow_prev_top").on("click", function() {
    $(this).parent().parent().find('.slick-slider').slick('slickPrev');
  });

  /*--------------------------------------------------------------
  Partners Carousel
  --------------------------------------------------------------*/
  var array = jQuery.makeArray($(".container").find(".partners-carousel"));
  $(array).each(function () {

    var speed = $(this).data("speed");
    var items = $(this).data("items");
    var count = $(this).data("count");
    var loop = true;

    if (count < 1) {
      loop = false;
    }

    if (speed == "") {
      speed = 5000;
    }

    if (items == "") {
      items = 3;
    }

    $(this).slick({
      infinite: loop,
      autoplay: true,
      autoplaySpeed: speed,
      arrows: false,
      slidesToShow: items,
      responsive: [
        {
          breakpoint: 1100,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  });


  /*--------------------------------------------------------------
  Masonry Gallery
  --------------------------------------------------------------*/
  var masonry_Gallery_Array = jQuery.makeArray($(".container").find(".stronghold-masonry-gallery-widget"));
  $(masonry_Gallery_Array).each(function () {

    var gutter_Size = $(this).data("gutter-size");

    if (gutter_Size == "") {
      gutter_Size = 10;
    }

    $('.stronghold-masonry-gallery').imagesLoaded(function () {
      $('.stronghold-masonry-gallery').packery({
        // options
        itemSelector: '.masonry-gallery-item',
        gutter: gutter_Size,
        percentPosition: true,
        transitionDuration: '0.65s'
      });
    });

  });


  /*--------------------------------------------------------------
  Accordion
  --------------------------------------------------------------*/
  function close_accordion_item() {
    $('.stronghold-accordion-wrapper .accordion-item-title-area').removeClass('active');
    $('.stronghold-accordion-wrapper .accordion-item-content').slideUp(500).removeClass('open');
  }

  $('.accordion-item-title-area').on("click", function() {
    var currentAttrValue = $(this).attr('href');
    if ($(this).is('.active')) {
      close_accordion_item();
    } else {
      close_accordion_item();
      $(this).addClass('active');
      $('.stronghold-accordion-wrapper ' + currentAttrValue).slideDown(300).addClass('open');
    }
    return false;
  });


  /*--------------------------------------------------------------
  Parallax
  --------------------------------------------------------------*/
  if ($(window).width() > 800) {
    $('.row-scroll-parallax').parallax({
      speed: 0.5
    });
  }

  /*--------------------------------------------------------------
  Single Gallery Slider
  --------------------------------------------------------------*/
        var array3 = jQuery.makeArray($("body").find(".gallery-slider"));

      $(array3).imagesLoaded(function() {

        $(array3).each(function() {

  var galleryAuto = 5000;
  var gallerySpeed =  $(this).data('speed');

  if(gallerySpeed != null || gallerySpeed != ""){
    galleryAuto = gallerySpeed;
  }


  $(this).slick({
  infinite:true,
  autoplay: true,
  autoplaySpeed: galleryAuto,
  arrows: false,
  slidesToShow: 1,
  responsive: [
    {
      breakpoint: 1100,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }
  ]

  });
   });
         });

  /*--------------------------------------------------------------
  Single Gallery Carousel
  --------------------------------------------------------------*/
        var array = jQuery.makeArray($("body").find(".gallery-carousel"));

      $(array).imagesLoaded(function() {

        $(array).each(function() {

  var galleryAuto = 5000;
  var galleryItemCount = 3;
  var galleryItemCountTablet = 2;
  var galleryItemCountMobile = 1;
  var prev = "";
  var next = "";


  var gallerySpeed =  $(this).data('speed');
  var gallerycols =  $(this).data('items');
  var gallerycols_tablet =  $(this).data('items-tablet');
  var gallerycols_mobile =  $(this).data('items-mobile');
  var arrows = $(this).data("arrows");

   if(gallerySpeed != null || gallerySpeed != ""){
    galleryAuto = gallerySpeed;
  }

  if(gallerycols != null || gallerycols != ""){
    galleryItemCount = gallerycols;
  }

  if(gallerycols_tablet != null || gallerycols_tablet != ""){
    galleryItemCountTablet = gallerycols_tablet;
  }

  if(gallerycols_mobile != null || gallerycols_mobile != ""){
    galleryItemCountMobile = gallerycols_mobile;
  }

  if (arrows == 'on' || arrows == true) {
    prev = '<div class="slider-arrow slider-prev fa fa-angle-left"></div>';
    next = '<div class="slider-arrow slider-next fa fa-angle-right"></div>';
  }


  $(this).slick({
  infinite:true,
  autoplay: true,
  autoplaySpeed: galleryAuto,
  slidesToShow: galleryItemCount,
  prevArrow: prev,
  nextArrow: next,
  responsive: [
    {
      breakpoint: 1100,
      settings: {
        slidesToShow: galleryItemCountTablet
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: galleryItemCountTablet
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: galleryItemCountMobile
      }
    }
  ]

  });
  });
  });


  /*--------------------------------------------------------------
  Single Gallery Justified Gallery
  --------------------------------------------------------------*/
  var array2 = jQuery.makeArray($("body").find(".gallery-justified"));

    $(array2).imagesLoaded(function() {

   $(array2).each(function() {

    var caps = $(this).data('caps');

    if(caps == null){
      caps = 'false';
    }

      $(this).justifiedGallery({
          rowHeight: 200,
          margins: 4,
          lastRow: 'justify',
          randomize: false,
          captions: true
      });



      });
   });



});
