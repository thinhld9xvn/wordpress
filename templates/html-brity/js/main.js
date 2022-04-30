  

/*----------------------------------------------------------------------*/
/* =  Preloader
/*----------------------------------------------------------------------*/
window.addEventListener('load', function() {

  TweenLite.to('.loading .txt', .4, {autoAlpha: 1, y:0});
  TweenLite.to('.progress', .5, {autoAlpha: 1, delay:.4});
  TweenLite.to('.bar-loading', 0.7, {width: '100%', delay:1 });

  TweenLite.to('.loading', 0.7, {y:-100, autoAlpha:0, delay:1.7 });
  TweenLite.to('#loader', 3, {y:-3000, delay:2, ease:'easeOutExpo' } );
  TweenLite.from('.hero', 1, {y:100, delay:2, ease:'easeOutExpo' } );
  
  setTimeout(function(){ window.scrollTo(0, 0); }, 2000);
  setTimeout(function(){ document.getElementById('loader').remove(); }, 3000);  
  
});
  
  
   
   $(document).ready( function() {
  
    function ajaxLoad(){
      letter_slider();
      infinty_loop();
      //PortfolioGrids();
      //lightbox();
      map();
      wideslider();
      wheelslider();
      //contactform();
      others();
      cursorMoveFunc();
  
    $(window).resize(others);
  
    }
  
    header_options();
    magnetizeFunc();
    ajaxLoad();
  
   
  
  
  
  
  //AJAX LOAD    
  $("body").on('click','[data-type="ajax-load"], header ul li a, .logo', function(e) {
  $(".page-overlay").addClass("from-bottom");
  setTimeout( function(){  $('.right-menu, header, .overlay-bg').removeClass('right-menu-active');  },2000);
  $('.right-menu ul ul').slideUp();
  $('.hassub .plus').removeClass('active');
  $('header').removeClass('active');
  var href = $(this).attr("href");
  loadHtml();
  function loadHtml() {
      setTimeout(function() {
          loadContent(href);            
          history.pushState('', 'new URL: '+href, href);        
      },1000);
  }
  e.preventDefault();
  window.onpopstate = function(event) {
      location.reload();
  };
  });
  
  function loadContent(url) {
      var getData = $.get(url, function(response) {
          var markup = $("<main>" + response + "</main>");
          var fragment = markup.find("main").html();
          var title = markup.find("title").html();
          $('head title').html(title);
          $("main").html(fragment);
          ajaxLoad();
          window.scrollTo(0, 0);
          $(".page-overlay").addClass("from-bottom");
          setTimeout( function(){
            $(".page-overlay").addClass("from-bottom-end");
            setTimeout( function(){
              $(".page-overlay").removeClass("from-bottom");
              $(".page-overlay").removeClass("from-bottom-end");
            } , 800 );
          } , 500 );
      });
  }
  
  
  
  
  /*----------------------------------------------------------------------*/
  /*   INFINITY SCROLL
  /*----------------------------------------------------------------------*/
  
  function infinty_loop() {
  
    if ($('.forslide').length) {
  
      var doc = window.document,
        context = doc.querySelector('.forslide'),
        clones = context.querySelectorAll('.is-clone'),
        disableScroll = false,
        scrollHeight = 0,
        scrollPos = 0,
        clonesHeight = 0,
        i = 0;
  
      function getScrollPos() {
        return (context.pageYOffset || context.scrollTop) - (context.clientTop || 0);
      }
  
      function setScrollPos(pos) {
        context.scrollTop = pos;
      }
  
      function getClonesHeight() {
        clonesHeight = 0;
  
        for (i = 0; i < clones.length; i += 1) {
          clonesHeight = clonesHeight + clones[i].offsetHeight;
        }
  
        return clonesHeight;
      }
  
      function reCalc() {
        scrollPos = getScrollPos();
        scrollHeight = context.scrollHeight;
        clonesHeight = getClonesHeight();
  
        if (scrollPos <= 0) {
          setScrollPos(1); // Scroll 1 pixel to allow upwards scrolling
        }
      }
  
      function scrollUpdate() {
        if (!disableScroll) {
          scrollPos = getScrollPos();
  
          if (clonesHeight + scrollPos >= scrollHeight) {
            // Scroll to the top when you’ve reached the bottom
            setScrollPos(1); // Scroll down 1 pixel to allow upwards scrolling
            disableScroll = true;
          } else if (scrollPos <= 0) {
            // Scroll to the bottom when you reach the top
            setScrollPos(scrollHeight - clonesHeight);
            disableScroll = true;
          }
        }
  
        if (disableScroll) {
          // Disable scroll-jumping for a short time to avoid flickering
          window.setTimeout(function () {
            disableScroll = false;
          }, 40);
        }
      }
  
      function init() {
        reCalc();
  
        context.addEventListener('scroll', function () {
          window.requestAnimationFrame(scrollUpdate);
        }, false);
  
        window.addEventListener('resize', function () {
          window.requestAnimationFrame(reCalc);
        }, false);
      }
  
      if (document.readyState !== 'loading') {
        init()
      } else {
        doc.addEventListener('DOMContentLoaded', init, false)
      }
  
  
      //$('.allworks .infinity-list').hover(mouseEnter, mouseLeave);
      const infinity_nodes = document.querySelectorAll('.allworks .infinity-list'),
            from_infinity_nodes = Array.from(infinity_nodes);

      infinity_nodes.forEach(node => {
        
          node.addEventListener('mouseover', mouseEnter);
          node.addEventListener('mouseleave', mouseLeave);
          
      }); 

      function mouseEnter(e) {

        var total_image = document.querySelectorAll('.forslide.slider-images li').length,
            list_index = from_infinity_nodes.indexOf(e.currentTarget) + 1;
  
        //var total_image = $('.forslide.slider-images li').length;
        //var list_index = $(this).index();

        document.querySelector(`.forslide.slider-images li:nth-child(${list_index})`).classList.add('focus');
        document.querySelector('.focus video').play();
  
        //$('.forslide.slider-images li:eq(' + list_index + ')').addClass('focus');
        //$('.focus').find('video').get(0).play();
  
      };
  
      function mouseLeave() {

        document.querySelectorAll('.forslide.slider-images li').forEach(node => node.classList.remove('focus'));
        document.querySelector('.focus video').pause();

        //$('.forslide.slider-images li').removeClass('focus');
        //$('.focus').find('video').get(0).pause();

      };
  
  
    }
  
  
  }
  
  /*----------------------------------------------------------------------*/
  /*   LETTER SLIDER
  /*----------------------------------------------------------------------*/
  
  function letter_slider() {

      const letter_slider = document.getElementById('letter-slider');

      if (letter_slider) {
         
          document.querySelector('html').classList.add('showcase');

          var lnx = document.querySelectorAll('.swiper-slide .slide-content .title');

          for (let i = 0; i < lnx.length; i++) {

              var txt = lnx[i].textContent.charAt(0);

              document.querySelector('.bullets ul')
                      .innerHTML += '<li class="magnetize" data-dist="1"> <span data-cursor-type="medium">' + txt + '\n' + '</span></li>'
              
              //$('.bullets ul').append('<li class="magnetize" data-dist="1"> <span data-cursor-type="medium">' + txt + '\n' + '</span></li>');

          }

          document.querySelector('.bullets ul li:first-child').classList.add('focus');
          document.querySelector('.slider-images ul li:first-child').classList.add('focus');
  
          //$('.bullets ul li:first-child, .slider-images ul li:first-child').addClass('focus');
  
          var swiper = new Swiper('.swiper-container', {
              speed: 1000,
              direction: 'vertical',
              slidesPerView: 'auto',
              simulateTouch: false,
              mousewheel: true,
              on: {
                  slideChange: function () {
                      var aktifindex = swiper.activeIndex + 1;
                      var coord = aktifindex * -55;

                      document.querySelectorAll('.bullets ul li').forEach(node => node.classList.remove('focus'));
                      document.querySelectorAll('.slider-images ul li').forEach(node => node.classList.remove('focus'));

                      document.querySelector(`.bullets ul li:nth-child(${aktifindex})`).classList.add('focus');
                      document.querySelector(`.slider-images ul li:nth-child(${aktifindex})`).classList.add('focus');

                      //$('.bullets ul li, .slider-images ul li').removeClass('focus');
                      //$('.bullets ul li:eq(' + aktifindex + '), .slider-images ul li:eq(' + aktifindex + ')').addClass('focus');
                    
                    document.querySelector('.bullets ul').style.marginTop =  coord;
                    //$('.bullets ul').css('margin-top', coord);
                    // $('.slider-images li video').get(0).pause(); 
                    // $('.slider-images .focus video').get(0).play();
                    
                    document.querySelectorAll('.slider-images video')
                            .forEach(node => node.pause());
                    
                    document.querySelectorAll('.slider-images .focus video')
                            .forEach(node => node.play());
  
                    /*$('.slider-images').find('video').each(function() {      
                      this.pause();
                    });
                    $('.slider-images .focus').find('video').each(function() {      
                      this.play();
                    });*/
                    
                },
            },
          });
          const nodes = document.querySelectorAll('.bullets ul li'),
                fromNodes = Array.from(nodes);

          nodes.forEach(node => node.addEventListener('click', function() {

              swiper.slideTo(fromNodes.indexOf(node));

          }))
          /*$('.bullets ul li').on('click', function () {
              swiper.slideTo($(this).index());
          });*/
      } else{
          //$('html').removeClass('showcase');
          document.querySelector('html').classList.remove('showcase');
    }
  
  
      
  }
  
  
  
  /*----------------------------------------------------------------------*/
  /*   WIDE SLIDER
  /*----------------------------------------------------------------------*/
  
  function wideslider() {
    
    const wipde_slider = document.getElementById('wide-slider');

    if(wipde_slider){

      //$('html').addClass('wide-slider');
      document.querySelector('html').addClass('wide-slider');

      var wiper_container = document.querySelector('.swiper-container'),
          dataAutoplay = wiper_container.dataset['autoplay'],
          dataautospeed = wiper_container.dataset['autospeed'];

      //var dataAutoplay = $('.swiper-container').data('autoplay');
      //var dataautospeed = $('.swiper-container').data('autospeed');
      var swiper = new Swiper('.swiper-container', {
        direction: "horizontal",
        centeredSlides: true,
        slidesPerView: 'auto',
        speed: 1000,
        autoplay:{
          delay: dataautospeed * 1000,
        },
        loop: true,
        mousewheel: true,  
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 300,
          modifier: 1,
          slideShadows : true,
        },
        pagination: {
            el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
              return '<span class="' + className + '">'+'<div data-cursor-type="medium" class="bullet-outter">' + '<svg data-cursor-type="medium" class="fp-arc-loader" width="20" height="20" viewBox="0 0 20 20">'+
                      '<circle class="path" cx="10" cy="10" r="5.5" fill="none" transform="rotate(-90 10 10)" stroke="#FFF"'+
                      'stroke-opacity="1" stroke-width="2px"></circle>'+
                  '<circle  data-cursor-type="medium" cx="10" cy="10" r="3" fill="#FFF"></circle>'+
                      '</svg></div></span>';
              },
        },
        });
        if ( dataAutoplay === false ){ swiper.autoplay.stop(); };
      }
  }
  
    
  
  
  /*----------------------------------------------------------------------*/
  /*   WHEEL SLIDER
  /*----------------------------------------------------------------------*/
    
  function wheelslider() {

    const wheel_slider = document.getElementById('wheel-slider');

    if ( wheel_slider ) {

        document.querySelector('html').classList.add('wheel-slider');

        var wiper_container = document.querySelector('.swiper-container'),
            dataAutoplay = wiper_container.dataset['autoplay'],
            dataautospeed = wiper_container.dataset['autospeed'];

          //$('html').addClass('wheel-slider');

          //var dataAutoplay = $('.swiper-container').data('autoplay');
          //var dataautospeed = $('.swiper-container').data('autospeed');
          var swiper = new Swiper('.swiper-container', {
              effect: 'coverflow',
              centeredSlides: true,
              slidesPerView: 'auto',
              allowTouchMove:true,  
        simulateTouch	:false,
              speed: 1000,
              autoplay:{
                  delay: dataautospeed * 1000,
              },
        loop: true,
              mousewheel: true,  
              coverflowEffect: {
                  rotate: 0,
                  stretch: 0,
                  depth: 150,
                  modifier: 1,
                  slideShadows : true,
              },
            });
    }
    
  const slide_content = document.querySelector('.slide-content');

  slide_content && 
      slide_content.addEventListener('mouseenter', function(e) {

        const target = e.currentTarget,
              nextElem = target.nextElementSibling;
        
        if ( nextElem ) {

          const video = nextElem.querySelector('video');

          if ( video ) {

            video.play();

          }

        }

      })

  /*$(".slide-content").mouseenter(function(e) {	
    $(this).next().find('video').each(function() {
      $(this).get(0).play();
    });
  });*/

  slide_content && 
        slide_content.addEventListener('mouseleave', function(e) {

          const target = e.currentTarget,
                nextElem = target.nextElementSibling;
          
          if ( nextElem ) {

            const video = nextElem.querySelector('video');

            if ( video ) {

              video.pause();

            }

          }   

        });
  
  /*$(".slide-content").mouseleave(function(e) {	
    $(this).next().find('video').each(function() {
      $(this).get(0).pause();
    });
  });*/
  
  
  }
  
  
  
  /*----------------------------------------------------------------------*/
  /*   ALL WORKS
  /*----------------------------------------------------------------------*/
  
  function allworks() {
  
      if ( $('.allworks').length ) {
  
      var main_works = $('.allworks .menu__item').length;
      if ( main_works >= 4) {
          $(".allworks").append( $(".allworks").children().clone());
          $(".allworks").prepend( $(".allworks").children().clone());
      
          if ( main_works <= 5 ){
              $(".allworks").prepend( $(".allworks").children().clone());
          }
          
          var scrollBottom = $('.allworks .menu__item:eq(' + main_works + ')').offset().top;
          $('.allworks').scrollTop(scrollBottom); 
          
          $('.allworks').on("scroll", function(event) {
              var windowst = $('.allworks').scrollTop() ;
              var works_height = ($('.allworks .menu__item').height() * main_works ) * 2 ;
  
              if( windowst > works_height  ){	
                  $('.allworks').scrollTop(100); 	
              }else if( windowst == 0  ){
                  $('.allworks').scrollTop(scrollBottom - 25); 	
              }
        
           });
          } 
    }
  
    
    if ( $('.forslide').length ) {   
          
          $('.allworks .menu__item').hover(mouseEnter, mouseLeave);
              function mouseEnter() {
    
          var total_image = $('.forslide.slider-images li').length;
          var list_index = $(this).index() / 2;
          if(list_index >= total_image){
             list_index = list_index % total_image;  console.log('bÃ¼yÃ¼k');
          }else{
            list_index = $(this).index() / 2; console.log('deÄŸil');
          }
  
        $('.forslide.slider-images li:eq('+ list_index +')').addClass('focus');
        $('.forslide.slider-images li:eq('+ list_index +')').find('video').each(function() {
          $(this).get(0).play();
        });
              };
              function mouseLeave() {
          $('.forslide.slider-images li').removeClass('focus');
          $('.forslide.slider-images li').find('video').each(function() {
            $(this).get(0).pause();
          });
              };
  
      }
  }
  
  
  
  /*----------------------------------------------------------------------*/
  /*   PORTFOLIO
  /*----------------------------------------------------------------------*/
  function PortfolioGrids() {

    const masonry = document.querySelector('.masonry');

  if( masonry ) {
  
    var $container = $('.masonry'); 
        $container.isotope({
          layoutMode: 'packery',
          itemSelector: '.grid-item',
          gutter:0,
          transitionDuration: "0.5s",
          columnWidth: '.grid-item'
        });
        $('.portfolio-filter ul li a').on("click", function(){
          $(".portfolio-filter ul li a").removeClass("select-cat");
          $(this).addClass("select-cat");        
          var selector = $(this).attr('data-filter');
          $(".masonry").isotope({
              filter: selector,
              animationOptions: {
                  duration: 750,
                  easing: 'linear',
                  queue: false,
        }
      });
          return false;
      });   
  
    TweenMax.set(".portfolio-filter", {autoAlpha:0});
      $(".filter-icon").on("click", function() {
      TweenMax.to(".portfolio-filter",.3, {autoAlpha:1});
      TweenMax.staggerFrom(".portfolio-filter ul > li", .5, { y: "50",autoAlpha: 0,ease: Back.easeOut},0.2);
    });
      $(".close-filter,  .portfolio-filter ul li a").on("click", function() { 
          TweenMax.to(".portfolio-filter",.3, {autoAlpha:0, delay:.5});
      });
      $(".portfolio-filter, .portfolio-filter ul li a").on("click", function (event) {
        if (!$(event.target).is(".portfolio-filter ul li a")) {
      TweenMax.to(".portfolio-filter",.3, {autoAlpha:0});
                return false;
            }
    }); 
  
    $(window).on("scroll", function() {
    var sw =   $(window).scrollTop();
    var bottom_items = $('.filter-icon, .allworks-link.grid-portfolio');
      if ( sw >= 200 ){
        $(bottom_items).addClass("magnetize");
        TweenMax.from(bottom_items,.5, { y:0,autoAlpha:1},1);
      }else{
        $(bottom_items).removeClass("magnetize");
        TweenMax.to(bottom_items,.5, { y:200, autoAlpha:0},1);
      }
  
    });
  
  // wide or long
  $('.grid-item:even').addClass('wide');
  
    $('.grid-item .portfolio-item').on('mouseenter', function() {
    TweenMax.to('.portfolio-big-title',.5, { y:100, autoAlpha:1},1);
  
    if ($(this).data('title')) {
      $('.portfolio-big-title .title').html('<span>' + $(this).data('title') + '</span>');
    }
  
    if ($(this).data('category')) {
      $('.portfolio-big-title .category').html('<span>' + $(this).data('category') + '</span>');
    }
  
  });
  
  $('.grid-item .portfolio-item').on('mouseleave', function() {
    TweenMax.to('.portfolio-big-title',.5, { y:0, autoAlpha:0},1);
  
  });
  
  
  $(".video-wrapper").mouseenter(function(e) {	
    $(this).find('video').each(function() {
      $(this).get(0).play();
    });
  });
  
  $(".video-wrapper").mouseleave(function(e) {	
    $(this).find('video').each(function() {
      $(this).get(0).pause();
    });
  });
  
  
  
  }
  
  }
  
  
  
  /*----------------------------------------------------------------------*/
  /*  CURSOR SETTINGS
  /*----------------------------------------------------------------------*/
  function cursorMoveFunc() {
  
  
        var e = $("#cursor");
        function t(t) {
            function n() {
                e.find(".cursor__label").text("");
            }
            TweenMax.to(e, 0, {
                left: t.clientX - e.width() / 2,
                top: t.clientY - e.height() / 2,
            }), "medium" == $(t.target).data("cursor-type") ? (e.removeClass().addClass("is-medium"), n()) : "big" == $(t.target).data("cursor-type") ? "btn-play" == $(t.target).data("cursor-text") ? (e.removeClass().addClass("is-play").addClass("is-big"), n()) : "btn-pause" == $(t.target).data("cursor-text") ? (e.removeClass().addClass("is-pause").addClass("is-big"), n()) : (e.removeClass().addClass("is-view").addClass("is-big"), e.find(".cursor__label").text($(t.target).data("cursor-text"))) : (e.removeClass(), n());
        
          }
        $("body, main, a").css("cursor", "none");
        var n = function() {
          $(window).on("mousemove", t)
        };
        n(), $(window).resize(n);
  
  }
        
      
  function magnetizeFunc(){
  
    if( $(window).width() >= 1024 ) {
      
  
    $(document).on('mousemove touch', function(e){  
        $('.magnetize').each(function() {
          magnetize(this, e); 
        });
      });
        
        function magnetize(el, e){
          var mX = e.pageX,
              mY = e.pageY;
          const item = $(el);
          
          const customDist = item.data('dist') * 20 || 120;
          const centerX = item.offset().left + (item.width()/2);
          const centerY = item.offset().top + (item.height()/2);
          
          var deltaX = Math.floor((centerX - mX)) * -0.45;
          var deltaY = Math.floor((centerY - mY)) * -0.45;
          
          var distance = calculateDistance(item, mX, mY);
            
          if(distance < customDist){
            TweenMax.to(item, 0.5, {y: deltaY, x: deltaX});
            item.addClass('magnet');
          }
          else {
            TweenMax.to(item, 0.6, {y: 0, x: 0, scale:1});
            item.removeClass('magnet');
          }
        }
        
        function calculateDistance(elem, mouseX, mouseY) {
          return Math.floor(Math.sqrt(Math.pow(mouseX - (elem.offset().left+(elem.width()/2)), 2) + Math.pow(mouseY - (elem.offset().top+(elem.height()/2)), 2)));
        }
  
      }
  
  }
  
  
  
  /*----------------------------------------------------------------------*/
  /*  HEADER OPTIONS
  /*----------------------------------------------------------------------*/
  
  function header_options(){
  
    if( $('.split-menu').length ){
  
      var full_menu_animation = new TimelineMax({yoyo: false,reversed: true});
      full_menu_animation.pause();
      full_menu_animation.to("header .hamburger span", .1, {backgroundColor:'#fff',ease: Back.easeOut});
      full_menu_animation.to("header .hamburger span:nth-child(1)", .1, {rotation:45 , ease: Back.easeOut});
      full_menu_animation.fromTo(["header .hamburger span:nth-child(1)"], .1, {width: '70%'}, {width:'100%'});
      full_menu_animation.to("header .hamburger span:nth-child(2)", .1, {rotation:-45, y:6, ease: Back.easeOut});
      full_menu_animation.to(".hamburger", .3, {width:'20px',ease: Back.easeOut});
      full_menu_animation.to(".hamburger", .3, {autoAlpha:.7,ease: Back.easeOut});
      full_menu_animation.from("header .split-menu .split-left-side", .8, {x:'-100%',ease: Power3.easeOut, },0.2,"Start");
      full_menu_animation.from("header .split-menu .split-right-side", .8, {x:'100%',ease: Power3.easeOut, },0.2,"Start");
      full_menu_animation.staggerFrom("header .full-menu nav ul li:not(header .full-menu nav ul li ul li)", .5, {autoAlpha: 0, x:-50,  },0.2,"Start");
      full_menu_animation.staggerFrom("header .split-menu .split-right-side ul", .5, {autoAlpha: 0, x:50,  },0.2,"Start");
      
      
  
      $('header .hamburger').on('click', function(){
          full_menu_animation.reversed() ? full_menu_animation.play():full_menu_animation.reverse(), $('header .full-menu ul li.has-sub ul').slideUp(),  $('header .full-menu ul li.has-sub i').removeClass('active');;
        });
        
        $('header .full-menu ul li.has-sub ul').slideUp();
  
        $('header .full-menu ul li.has-sub i').on('click', function(){
            $('header .full-menu ul li.has-sub ul').not($(this).parent().find('ul')).slideUp();
            $('header .full-menu ul li.has-sub i').not(this).removeClass('active');
            $(this).parent().find('ul').slideToggle();
            $(this).toggleClass('active');
        });
  
  
  }else{
  
      var full_menu_animation = new TimelineMax({yoyo: false,reversed: true});
      full_menu_animation.pause();
      full_menu_animation.to("header .hamburger span", .1, {backgroundColor:'#fff', className:"open", ease: Back.easeOut});
      full_menu_animation.to("header .hamburger span:nth-child(1)", .1, {rotation:45 , ease: Back.easeOut});
      full_menu_animation.fromTo(["header .hamburger span:nth-child(1)"], .1, {width: '70%'}, {width:'100%'});
      full_menu_animation.to("header .hamburger span:nth-child(2)", .1, {rotation:-45, y:6, ease: Back.easeOut});
      full_menu_animation.to(".hamburger", .3, {width:'20px',ease: Back.easeOut});
      full_menu_animation.to(".hamburger", .3, {autoAlpha:.7,ease: Back.easeOut});
      full_menu_animation.from("header .full-menu:not('header .full-menu.right-menu')", .8, {y:'-100%',ease: Power3.easeOut, },0.2,"Start");
      full_menu_animation.from("header .full-menu.right-menu", .8, {x:'100%',ease: Power3.easeOut, },0.2,"Start");
      full_menu_animation.staggerFrom("header .full-menu .social", 1, {autoAlpha: 0, ease: Power3.easeOut},0.2,"Start");
      full_menu_animation.staggerFrom("header .full-menu nav ul li:not(header .full-menu nav ul li ul li)", .5, {autoAlpha: 0, y:-50,  },0.2,"Start");
      
  
      $('header .hamburger').on('click', function(){
          full_menu_animation.reversed() ? full_menu_animation.play():full_menu_animation.reverse(), $('header .full-menu ul li.has-sub ul').slideUp(),  $('header .full-menu ul li.has-sub i').removeClass('active');;
        });
        
  }
  
  
  $('header .full-menu nav ul li.has-sub').append('<i class="fas fa-arrow-right" data-cursor-type="medium"></i>');
  
  $('header .full-menu ul li.has-sub ul').slideUp();
  
  $('header .full-menu ul li.has-sub i').on('click', function(){
      $('header .full-menu ul li.has-sub ul').not($(this).parent().find('ul')).slideUp();
      $('header .full-menu ul li.has-sub i').not(this).removeClass('active');
      $(this).parent().find('ul').slideToggle();
      $(this).toggleClass('active');
  });
  
  
  
  
    var lastScrollTop = 0;
  $(window).scroll(function(event){
     var st = $(this).scrollTop();
  
     if(st > 500 ){
       $('header').addClass('sticky');
       $('header').addClass('hide');
       $('header').addClass('addbg');
     } else{
      $('header').removeClass('sticky');
      $('header').removeClass('hide');
      $('header').removeClass('addbg');
     }
  
      if (st > lastScrollTop){
        $('header').removeClass('animate');
        } else {
          // upscroll code
      $('header').addClass('animate');
      $('header').removeClass('hide');
        }
    lastScrollTop = st;
  
  });
  
  
  
  
  
  }
  
  
  function slideUpAnimation(target, duration=500, callback) {

    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout( () => {
          target.style.display = 'none';
          target.style.removeProperty('height');
          target.style.removeProperty('padding-top');
          target.style.removeProperty('padding-bottom');
          target.style.removeProperty('margin-top');
          target.style.removeProperty('margin-bottom');
          target.style.removeProperty('overflow');
          target.style.removeProperty('transition-duration');
          target.style.removeProperty('transition-property');
          //alert("!");
          callback();
    }, duration);
}

  /* SLIDE DOWN */
  function slideDownAnimation(target, duration=500, callback) {

     target.style.removeProperty('display');
     let display = window.getComputedStyle(target).display;
     if (display === 'none') display = 'block';
     target.style.display = display;
     let height = target.offsetHeight;
     target.style.overflow = 'hidden';
     target.style.height = 0;
     target.style.paddingTop = 0;
     target.style.paddingBottom = 0;
     target.style.marginTop = 0;
     target.style.marginBottom = 0;
     target.offsetHeight;
     target.style.boxSizing = 'border-box';
     target.style.transitionProperty = "height, margin, padding";
     target.style.transitionDuration = duration + 'ms';
     target.style.height = height + 'px';
     target.style.removeProperty('padding-top');
     target.style.removeProperty('padding-bottom');
     target.style.removeProperty('margin-top');
     target.style.removeProperty('margin-bottom');
     window.setTimeout( () => {
       target.style.removeProperty('height');
       target.style.removeProperty('overflow');
       target.style.removeProperty('transition-duration');
       target.style.removeProperty('transition-property');
       callback();
     }, duration);
 }

 // Show an element
function showAnimation(elem) {
  elem.style.transitionDuration = '.2s';
  elem.style.transitionProperty = 'all';
  elem.style.maxHeight = 'max-content';
  elem.style.overflow = 'visible';  
};

// Hide an element
function hideAnimation(elem) {
	elem.style.transitionDuration = '.2s';
  elem.style.transitionProperty = 'all';
  elem.style.maxHeight = '0';
  elem.style.overflow = 'hidden';  
};
  
  
  /*----------------------------------------------------------------------*/
  /*  CONTACT FORM
  /*----------------------------------------------------------------------*/
  
  function contactform() {

    const contact_form = document.getElementById('contact-formular');

    if( contact_form ){

      contact_form.addEventListener('submit', function(e){

        var form = e.currentTarget,
            action = form.getAttribute('action');

          //var action = $(this).attr('action');

          const message = document.getElementById('message');

          slideUpAnimation(message, 750, function() {

            hideAnimation(message);
            form.setAttribute('disabled', 'disabled');

                //$('#message').hide();
                //$('#submit').attr('disabled','disabled');		
                $.post(action, {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    comments: $('#comments').val()
                },
                function(data){
                    document.getElementById('message').innerHTML = data;
                    $('#message').slideDown('slow');
                    $('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
                    $('#submit').removeAttr('disabled');
                    if(data.match('success') != null) $('#contactform').slideUp('slow');		
                }
            );		
        });

          /*$("#message").slideUp(750,function() {

              $('#message').hide();
              $('#submit').attr('disabled','disabled');		
              $.post(action, {
                  name: $('#name').val(),
                  email: $('#email').val(),
                  comments: $('#comments').val()
              },
              function(data){
                  document.getElementById('message').innerHTML = data;
                  $('#message').slideDown('slow');
                  $('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
                  $('#submit').removeAttr('disabled');
                  if(data.match('success') != null) $('#contactform').slideUp('slow');		
              }
          );		
          });	*/

          return false;		

      });

    }

  } 
  
  
  /*----------------------------------------------------------------------*/
  /*  MAP
  /*----------------------------------------------------------------------*/
  
  function map() {

    const map = document.querySelector('.map');

    if (map) {

      const open_map = document.querySelector('.open-map'),
            overlay_map = document.querySelector('.overlay-map');

      open_map && 
          open_map.addEventListener('click', function() {

          TweenMax.to(".map",.3, { autoAlpha:1, display: 'block'});
          TweenMax.to('.overlay-map', 0.2,{display:'block', autoAlpha:1});

        });

      /*$('.open-map').on('click', function(){
        
        TweenMax.to(".map",.3, { autoAlpha:1, display: 'block'});
        TweenMax.to('.overlay-map', 0.2,{display:'block', autoAlpha:1});

      });*/

      overlay_map && 
          overlay_map.addEventListener('click', function() {

          TweenMax.to(".map",.3, { autoAlpha:0, display: 'none'});
          TweenMax.to('.overlay-map', 0.2,{display:'none', autoAlpha:0});

        });
            
    
      /*$('.overlay-map').on('click', function(){

        TweenMax.to(".map",.3, { autoAlpha:0, display: 'none'});
        TweenMax.to('.overlay-map', 0.2,{display:'none', autoAlpha:0});

      });*/

    }

  }
  
  
  
  
  /*----------------------------------------------------------------------*/
  /*  MAGNIFIC POPUP
  /*----------------------------------------------------------------------*/
  function lightbox() {
    if ($('.lightbox').length) {
      $('.lightbox').magnificPopup({
            type:'image',
            gallery:{enabled:true},
            zoom:{enabled: true, duration: 300}
        });
    }
  }
  
  
    function others(){

      const classic_menu = document.querySelector('header .classic-menu');

      if ( classic_menu ) {

        const from_n2_excepts = Array.from(document.querySelectorAll('header .classic-menu  ul li ul li a')),
              from_nodes = Array.from(document.querySelectorAll('header .classic-menu  ul li a')),
              nodes = from_nodes.filter(n => ! from_n2_excepts.includes(n));

        nodes.forEach(node => {  

          node.addEventListener('mouseover', function(e) {

            const nodes_filtered = from_nodes.filter(n => ! from_n2_excepts.includes(n) && ! n.contains(e.currentTarget));

            if ( nodes_filtered.length ) {

              nodes_filtered.forEach(n => n.style.opacity = ".5");

            }

          });
          
          node.addEventListener('mouseout', function(e) {

            const nodes_filtered = from_nodes.filter(n => ! from_n2_excepts.includes(n) && ! n.contains(e.currentTarget));

            if ( nodes_filtered.length ) {

              nodes_filtered.forEach(n => n.style.opacity = "1");

            }

          });
                  
        })

        /*$("header .classic-menu  ul li a:not('header .classic-menu  ul li ul li a')").hover(function(){
          $('header .classic-menu  ul li a').not(this).not('header .classic-menu  ul li ul li a').css("opacity", ".5");
          }, function(){
            $('header .classic-menu  ul li a').not(this).not('header .classic-menu  ul li ul li a').css("opacity", "1");
            });*/
      }
  
      if( window.innerWidth <= 991 ){
        var sub_menu = new TimelineMax({yoyo: false,reversed: true});
        sub_menu.pause();
        sub_menu.from('header .classic-menu  ul li ul', 0.2,{height:'0', autoAlpha:0, display:'none'});
        sub_menu.to('header .classic-menu  ul li i', 0.1,{rotation:180});

        document.querySelectorAll('header .classic-menu  ul li')
                .forEach(node => node.addEventListener('click', function(e) {

            sub_menu.reversed() ? sub_menu.play():sub_menu.reverse();

        }));
    
        /*$('header .classic-menu  ul li').on('click', function(){
          sub_menu.reversed() ? sub_menu.play():sub_menu.reverse();
        });*/    
       
        var responsive_menu = new TimelineMax({yoyo: false,reversed: true});
        responsive_menu.pause();
        responsive_menu.to('header .classic-menu .close-menu span:first-child', 0.2,{ rotation:45, y:6});
        responsive_menu.to('header .classic-menu .close-menu span:last-child', 0.2,{ width:'100%', rotation:-45});
        responsive_menu.from("header .classic-menu ", .5, { display: 'none' ,autoAlpha: 0,ease: Back.easeOut},0.2);
        responsive_menu.staggerFrom("header .classic-menu  ul li:not('header .classic-menu  ul li ul li')", .6, { y: "50",autoAlpha: 0,ease: Back.easeOut},0.1);
        
        document.querySelector('header .classic-menu .close-menu')
                .addEventListener('click', function() {

            responsive_menu.reversed() ? responsive_menu.play():responsive_menu.reverse();

        });

        /*$('header .classic-menu .close-menu').on('click', function(){
          responsive_menu.reversed() ? responsive_menu.play():responsive_menu.reverse();
        });*/
      }

      const uptotop = document.querySelector('.uptotop');

      uptotop && 
        uptotop.addEventListener('click', function() {

          /*$('html, body').animate({
            'scrollTop': 0
        });*/

        window.scrollTo(0, 0);

      });
  
      /*$('.uptotop').on('click', function(){
        $('html, body').animate({
            'scrollTop': 0
        });
      });*/

      const downlink = document.querySelector('.down-link');

      downlink && 
        downlink.addEventListener('click', function() {

          window.scrollTo(0, window.innerHeight);

        });
  
      /*$('.down-link').on('click', function(){
        $('html, body').animate({
          'scrollTop': $(window).height()
        },1000);
      });*/

    const darkness = document.querySelector('.darkness');

    if ( darkness ) {

      const hero_full_image = document.querySelector('.hero.full-image');

      if ( hero_full_image ) {

        document.querySelector('header')
                .classList.add('bg-image-version');

      } else{

        document.querySelector('header')
                .classList.remove('bg-image-version');

      }
      
    }
  
    /*if (!$('.darkness').length)  {
      if( $('.hero.full-image').length ){
        $('header').addClass('bg-image-version');
      }else{
        $('header').removeClass('bg-image-version');
      }
     }*/

     const wave = document.getElementById('wave'); 
     
     if ( wave ) {

       var siriWave = new SiriWave({
          container: wave,
          speed: 0.02,
                color: '#ffffff',
                frequency: 4,
          autostart: true,
          amplitude: 0
        });
        setTimeout(function() {
          siriWave.setAmplitude(1);
        }, 1000);
      }

      /*const element_rotate = document.querySelector('.element-rotate');
    
      if( element_rotate ){

        $(".element-rotate").textrotator({

          animation: "fade",
          speed: 2000

        });

     }*/
  
     /*if( $('#wave').length  ){
      var siriWave = new SiriWave({
        container: document.getElementById('wave'),
        speed: 0.02,
              color: '#ffffff',
              frequency: 4,
        autostart: true,
        amplitude: 0
      });
      setTimeout(function() {
        siriWave.setAmplitude(1);
      }, 1000);
     }
  
     if( $('.element-rotate').length ){
      $(".element-rotate").textrotator({
        animation: "fade",
        speed: 2000
      });
    }*/
  
  
    setTimeout( function(){ 
      
    var wow = new WOW(
      {
        boxClass:     'box-animate',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       300,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
          // the callback is fired every time an animation is started
          // the argument that is passed in is the DOM node being animated
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
      }
    );
    wow.init();
  
  
     },2000);
  
  
  
    }
  
    
  
  
  }); // document read end 
  
  
  
  
  
  
  
    