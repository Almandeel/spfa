'use strict';

$(function () {
    
    $(".flexslider").flexslider({
        animation: "slide", 
        slideshow: true,
        touch: true,
        keyboard: true,
        pauseOnHover: true,
        
       // animationLoop: false
      });


    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      autoWidth:true,
      items:4,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:4
          }
      }
  })

  new WOW({mobile: false,}).init();

  $(window).scroll(function() {    
        var scroll = $(window).scrollTop();

        if (scroll >= 222) {
            $(".main-navbar").addClass("navbar-fixed-top");
            $(".main-navbar").addClass("container");
        } else {
            $(".main-navbar").removeClass("navbar-fixed-top");
            $(".main-navbar").removeClass("container");
        }
    });

    $('.next').click(function () {
    $('.register').fadeOut()
    $('.login').fadeIn()
    })

    $('.back').click(function () {
    $('.login').fadeOut()
    $('.register').fadeIn()
    })
});