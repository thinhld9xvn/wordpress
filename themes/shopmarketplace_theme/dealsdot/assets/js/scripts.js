jQuery(document).ready(function() {
    "use strict";

/*===================================================================================*/
/*	OWL CAROUSEL
/*===================================================================================*/
jQuery(function () {
    var dragging = true;
    var owlElementID = "#owl-main";

    function fadeInReset() {
        if (!dragging) {
            jQuery(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").stop().delay(800).animate({ opacity: 0 }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            jQuery(owlElementID + " .caption .fadeIn-1, " + owlElementID + " .caption .fadeIn-2, " + owlElementID + " .caption .fadeIn-3").css({ opacity: 0 });
        }
    }

    function fadeInDownReset() {
        if (!dragging) {
            jQuery(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").stop().delay(800).animate({ opacity: 0, top: "-15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            jQuery(owlElementID + " .caption .fadeInDown-1, " + owlElementID + " .caption .fadeInDown-2, " + owlElementID + " .caption .fadeInDown-3").css({ opacity: 0, top: "-15px" });
        }
    }

    function fadeInUpReset() {
        if (!dragging) {
            jQuery(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").stop().delay(800).animate({ opacity: 0, top: "15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            jQuery(owlElementID + " .caption .fadeInUp-1, " + owlElementID + " .caption .fadeInUp-2, " + owlElementID + " .caption .fadeInUp-3").css({ opacity: 0, top: "15px" });
        }
    }

    function fadeInLeftReset() {
        if (!dragging) {
            jQuery(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").stop().delay(800).animate({ opacity: 0, left: "15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            jQuery(owlElementID + " .caption .fadeInLeft-1, " + owlElementID + " .caption .fadeInLeft-2, " + owlElementID + " .caption .fadeInLeft-3").css({ opacity: 0, left: "15px" });
        }
    }

    function fadeInRightReset() {
        if (!dragging) {
            jQuery(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").stop().delay(800).animate({ opacity: 0, left: "-15px" }, { duration: 400, easing: "easeInCubic" });
        }
        else {
            jQuery(owlElementID + " .caption .fadeInRight-1, " + owlElementID + " .caption .fadeInRight-2, " + owlElementID + " .caption .fadeInRight-3").css({ opacity: 0, left: "-15px" });
        }
    }

    function fadeIn() {
        jQuery(owlElementID + " .active .caption .fadeIn-1").stop().delay(500).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeIn-2").stop().delay(700).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeIn-3").stop().delay(1000).animate({ opacity: 1 }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInDown() {
        jQuery(owlElementID + " .active .caption .fadeInDown-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInDown-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInDown-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInUp() {
        jQuery(owlElementID + " .active .caption .fadeInUp-1").stop().delay(500).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInUp-2").stop().delay(700).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInUp-3").stop().delay(1000).animate({ opacity: 1, top: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInLeft() {
        jQuery(owlElementID + " .active .caption .fadeInLeft-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInLeft-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInLeft-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    function fadeInRight() {
        jQuery(owlElementID + " .active .caption .fadeInRight-1").stop().delay(500).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInRight-2").stop().delay(700).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
        jQuery(owlElementID + " .active .caption .fadeInRight-3").stop().delay(1000).animate({ opacity: 1, left: "0" }, { duration: 800, easing: "easeOutCubic" });
    }

    jQuery(owlElementID).owlCarousel({

        autoPlay: 5000,
        stopOnHover: true,
        navigation: true,
        pagination: true,
        singleItem: true,
        addClassActive: true,
        transitionStyle: "fade",
        navigationText: ["<i class='icon fa fa-angle-left'></i>", "<i class='icon fa fa-angle-right'></i>"],

        afterInit: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        afterMove: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        afterUpdate: function() {
            fadeIn();
            fadeInDown();
            fadeInUp();
            fadeInLeft();
            fadeInRight();
        },

        startDragging: function() {
            dragging = true;
        },

        afterAction: function() {
            fadeInReset();
            fadeInDownReset();
            fadeInUpReset();
            fadeInLeftReset();
            fadeInRightReset();
            dragging = false;
        }

    });

if (jQuery(owlElementID).hasClass("owl-one-item")) {
    jQuery(owlElementID + ".owl-one-item").data('owlCarousel').destroy();
}

jQuery(owlElementID + ".owl-one-item").owlCarousel({
    singleItem: true,
    navigation: false,
    pagination: false
});




jQuery('.home-owl-carousel').each(function(){

    var owl = jQuery(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 4;
    }
    owl.owlCarousel({
        items : itemPerLine,
       itemsDesktop : [1300,3],
	   itemsDesktopSmall :[1180,2],
        itemsTablet:[768,2],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});

jQuery('.home-owl-carousel1').each(function(){

    var owl = jQuery(this);
    var  itemPerLine = owl.data('item');
    if(!itemPerLine){
        itemPerLine = 2;
    }
    owl.owlCarousel({
        items : itemPerLine,
       itemsDesktop : [1300,2],
	   itemsDesktopSmall :[1180,1],
        itemsTablet:[768,1],
        navigation : true,
        pagination : false,

        navigationText: ["", ""]
    });
});

jQuery(".blog-slider").owlCarousel({
    items : 3,
    itemsTablet :[979,2],
    itemsDesktopSmall  : [1180,2],
	itemsDesktop : [1300,3],
    navigation : true,
    slideSpeed : 300,
    pagination: false,
    navigationText: ["", ""]
});

jQuery(".coupons-deal").owlCarousel({
    items : 2,
    navigation : true,
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,2],
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});

jQuery(".sidebar-carousel").owlCarousel({
    items : 1,
    itemsTablet:[768,2],
    itemsDesktopSmall :[979,2],
    itemsDesktop : [1199,1],
    navigation : true,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});

jQuery(".brand-slider").owlCarousel({
    items :5,
    navigation : true,
    slideSpeed : 300,
    pagination: false,
    paginationSpeed : 400,
    navigationText: ["", ""]
});    
jQuery("#advertisement").owlCarousel({
    items : 1,
    itemsDesktopSmall :[979,1],
    itemsDesktop : [1199,1],
    itemsTablet : [992,1],
	itemsMobile : [479,1],
    navigation : true,
    slideSpeed : 300,
    pagination: true,
    paginationSpeed : 400,
    navigationText: ["", ""]
});    



});

/*===================================================================================*/
/*  LAZY LOAD IMAGES USING ECHO
/*===================================================================================*/
jQuery(function(){
    echo.init({
        offset: 100,
        throttle: 250,
        unload: false
    });
});

/*===================================================================================*/
/*  RATING
/*===================================================================================*/

jQuery(function(){
    jQuery('.rating').rateit({max: 5, step: 1, value : 4, resetable : false , readonly : true});
});

/*===================================================================================*/
/* PRICE SLIDER
/*===================================================================================*/
jQuery(function () {

// Price Slider
if (jQuery('.price-slider').length > 0) {
    jQuery('.price-slider').slider({
        min: 100,
        max: 700,
        step: 10,
        value: [200, 500],
        handle: "square"

    });

}

});


/*===================================================================================*/
/* SINGLE PRODUCT GALLERY
/*===================================================================================*/
jQuery(function(){
    jQuery('#owl-single-product').owlCarousel({
        items:1,
        itemsTablet:[768,3],
        itemsDesktop : [1199,1],
        itemsTablet : [992,1],
        itemsDesktopSmall : [768,3]

    });

    jQuery('#owl-single-product-thumbnails').owlCarousel({
        items: 4,
        pagination: true,
        rewindNav: true,
        itemsTablet : [992,4],
        itemsDesktopSmall :[768,4],
        itemsDesktop : [992,1]
    });

    jQuery('#owl-single-product2-thumbnails').owlCarousel({
        items: 6,
        pagination: true,
        rewindNav: true,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    });

    jQuery('.single-product-slider').owlCarousel({
        stopOnHover: true,
        rewindNav: true,
        singleItem: true,
        pagination: true
    });
	
    jQuery('.flex-control-thumbs').owlCarousel({
        items: 4,
        pagination: true,
        rewindNav: true,
        itemsTablet : [992,4],
        itemsDesktopSmall :[768,4],
        itemsDesktop : [992,1],
		itemsMobile : [479,3],
    });


  
});





/*===================================================================================*/
/*  WOW 
/*===================================================================================*/

jQuery(function () {
    new WOW().init();
});


/*===================================================================================*/
/*  TOOLTIP 
/*===================================================================================*/
jQuery("[data-toggle='tooltip']").tooltip(); 

/*===================================================================================*/
/*  Dealsdot KlbTheme Custom 
/*===================================================================================*/
jQuery('.textwidget img.size-full').closest('div.sidebar-widget').addClass("klb-widget-banner");		
jQuery(".wpcf7-form input[name='your-name'], .wpcf7-form input[type='email']" ).closest('p').wrapAll( "<div class='row'></div>" );
jQuery(".wpcf7-form input[name='your-name'], .wpcf7-form input[type='email']" ).closest('p').wrap( "<div class='col-lg-6'><div class='form-group'></div></div>" );
jQuery(".wpcf7-form input[type='text'], .wpcf7-form input[type='email'], .wpcf7-form textarea").addClass("form-control");

jQuery('ul.woocommerce-widget-layered-nav-list li a[href*="color"]').each(function() {
	jQuery(this).closest('ul').addClass("color-attribute");
	jQuery('ul.woocommerce-widget-layered-nav-list li a').each(function () {
		if (jQuery(this).text() == 'green') {
			jQuery(this).closest( "li" ).css('background-color', 'green');
		} else if (jQuery(this).text() == 'red'){
			jQuery(this).closest( "li" ).css('background-color', 'red');
		} else if (jQuery(this).text() == 'yellow'){
			jQuery(this).closest( "li" ).css('background-color', 'yellow');
		} else if (jQuery(this).text() == 'black'){
			jQuery(this).closest( "li" ).css('background-color', 'black');
		} else if (jQuery(this).text() == 'blue'){
			jQuery(this).closest( "li" ).css('background-color', 'blue');
		} else if (jQuery(this).text() == 'orange'){
			jQuery(this).closest( "li" ).css('background-color', 'orange');
		} else if (jQuery(this).text() == 'pink'){
			jQuery(this).closest( "li" ).css('background-color', 'pink');
		} else if (jQuery(this).text() == 'purple'){
			jQuery(this).closest( "li" ).css('background-color', 'purple');
		} else if (jQuery(this).text() == 'brown'){
			jQuery(this).closest( "li" ).css('background-color', 'brown');
		} else if (jQuery(this).text() == 'grey'){
			jQuery(this).closest( "li" ).css('background-color', 'grey');
		} else if (jQuery(this).text() == 'silver'){
			jQuery(this).closest( "li" ).css('background-color', 'silver');
		} else if (jQuery(this).text() == 'tortoise'){
			jQuery(this).closest( "li" ).css('background-color', '#ffab00');
		}
	});
});

jQuery('ul.woocommerce-widget-layered-nav-list li a[href*="size"]').each(function() {
	jQuery(this).closest('ul').addClass("size-attribute");
});


jQuery(window).load(function(){
	jQuery('#preloader').fadeOut('slow',function(){jQuery(this).remove();});
});

jQuery(window).scroll(function() {
	jQuery(this).scrollTop() > 35 ? jQuery(".main-header.fixed-menu").addClass("sticky-header") : jQuery(".main-header.fixed-menu").removeClass("sticky-header")
});

jQuery('.dropdown').click(function(e) {
	e.stopPropagation();
});

jQuery('.dropdown').children('.dropdown-toggle').on('click', function(event){
	event.preventDefault();
	jQuery(this).toggleClass('submenu-open').next('.dropdown-menu').slideToggle(300).end().parent('.dropdown').siblings('.dropdown').children('.dropdown-toggle').removeClass('submenu-open').next('.dropdown-menu').slideUp(300);
});

})