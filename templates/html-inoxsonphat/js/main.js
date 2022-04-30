$(document).ready(function($){
  if($('header.top').length){
    $(window).scroll(function(){
      /*var anchor = $('header.top').offset().top;*/
      var anchor = $('header.top').offset().top;
      /*console.log(anchor);*/
      if(anchor >= 130){
          $('header.top').addClass('cmenu');
          /*$('.cate-list').removeClass('on');*/
          $('.tcate-list').slideUp();
      }
      else{
          $('header.top').removeClass('cmenu');
      }
    });
  }

  /*new WOW().init();*/

  if($('.to-top').length){
    $('.to-top').on('click',function(event){
        event.preventDefault();
    $('body, html').stop().animate({scrollTop:0},800)});
    $(window).scroll(function(){
        var anchor=$('.to-top').offset().top;
        if(anchor>1000){
            $('.to-top').css('opacity','1')
        }
        else{
            $('.to-top').css('opacity','0')
        }
    });
  }

  $("#menu").mmenu({
    "extensions": [
          "pagedim-black"
       ]
      // options
      /*"offCanvas": {
              "position": "right"
          }*/
    }, {
        // configuration
        clone: true
  });

    var swiper = new Swiper('.main-slider', {
      lazy: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });

    var swiper = new Swiper('.tes-slider', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });

    var swiper = new Swiper('.blog-slider', {
      slidesPerView: 3,
      spaceBetween: 20,
      breakpoints: {
        1024: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 2,
        },
        575: {
          slidesPerView: 1,
        }
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });

    var swiper = new Swiper('.pdetail-re-slider', {
      slidesPerView: 4,
      spaceBetween: 20,
      breakpoints: {
        1024: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 2,
        },
        575: {
          slidesPerView: 1,
        }
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });
    var swiper = new Swiper('.partner-slider', {
      slidesPerView: 6,
      spaceBetween: 20,
      breakpoints: {
        1024: {
          slidesPerView: 5,
        },
        768: {
          slidesPerView: 4,
        },
        575: {
          slidesPerView: 2,
        }
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });

  $('.search-open').on('click', function(event) {
    event.preventDefault();
    $('.search-dropdown').toggleClass('on');
  });

  $('.more-link').click(function(event) {
    /*$(this).parents('.pdetail-info').toggleClass('open');*/
    $(this).closest('.pdetail-info').toggleClass('open');
  });
  $('.index-link').click(function(e){
      e.preventDefault();
      $('.on').removeClass('on');
      el = $(this);
      name = el.attr('href');
      if($(window).width() >= 992) {
          pos = $(name).position().top;
      }
      else {
          pos = $(name).position().top + 80;
      }
      el.addClass('on');
      $('html,body').stop().animate({scrollTop:pos},600);
      return false;
  });

  
});
/*
http://jsfiddle.net/LCB5W/
https://stackoverflow.com/questions/152975/how-do-i-detect-a-click-outside-an-element

https://codepen.io/altro-nvp2/pen/MmQBVd
http://www.landmarkmlp.com/js-plugin/owl.carousel/demos/transitions.html
https://codepen.io/radimby/pen/YpEJQP
*/