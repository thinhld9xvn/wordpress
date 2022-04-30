jQuery(document).ready(function($) {
	$(".item_pr").click(function() {  
        $(this).children('.caret').animate({ 'height': 'toggle' });             
      });

     $(".btn_button").click(function() {  
        $(".item_pr").children('.caret').animate({ 'height': 'hide' });             
      });
     $(".btn_button").click(function() {  
        $(".item_pr").parents().children('.box_pr_featured').animate({ 'height': 'hide' });             
      });
   
    $('.item_pr').click(function () {
        $(this).next('#target').toggle(300);       
        $(this).closest('.box').siblings().find('#target').hide();
        $(this).closest('.box').siblings().find('.caret').hide();
    })
     $(document).ready(function(){
      $(".page_ul ul li").click(function(){
        $(".page_ul ul li").removeClass('active');
        $(this).addClass('active');
      });
    });
  $('#pr_cate_featured').owlCarousel({
        loop:false,
        nav:false,
        dots:true,
        lazyLoad: true,
        autoplay: true, //  tự chạy
        loop: true,
        rewind: true,
        margin:30,
        paginationSpeed: true,
        autoplayTimeout: 3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
	$('.pr_featured').owlCarousel({
        loop:false,
        nav:true,
        navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        dots:true,
        lazyLoad: true,
        autoplay: true, //  tự chạy
        loop: true,
        rewind: true,
        paginationSpeed: true,
        autoplayTimeout: 5000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    
});	