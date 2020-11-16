jQuery(function($) {


var slider = {
	ready: function() {		
		
		this.initFlexSlider();
        this.initOwlCarousel();        
        this.initLightGallery();
        this.initMarquee();        

	},
	initFlexSlider: function() {
		
		$('.flexslider').flexslider({
		    animation: "fade",
		    animationLoop: true,
		    pauseOnHover: false,
		    controlNav: false,
		    after: function(slider) {

			  /* auto-restart player if paused after action */
			  if ( ! slider.playing ) {
			    slider.play();
			  }

			}

		 });
		
	},
	initOwlCarousel: function() {

		$('.owl-carousel').each(function() {

			var c_items = $(this).attr('data-carousel-items'),
				c_autoplay = $(this).attr('data-carousel-autoplay') === 'true',
				c_navigation = $(this).attr('data-carousel-navigation') === 'true',
				c_pagination = $(this).attr('data-carousel-pagination') === 'true',
				c_singleItem = $(this).attr('data-carousel-singleitem') === 'true',		
				c_itemsDesktop = [1199, 2],
				c_itemsDesktopSmall = [979, 2],
				c_config = {
				  loop: true,
		          autoPlay: c_autoplay,
		          navigation: c_navigation,
		          pagination: c_pagination,
		          items : c_items,	       
		          singleItem: c_singleItem, 
		          itemsDesktop : c_itemsDesktop,
		          itemsDesktopSmall : c_itemsDesktopSmall 
				};

			$(this).owlCarousel( c_config );

		});
		
	},
	initLightGallery: function() {

		$lg = $('.lightgallery').lightGallery({
		    thumbnail: true,
		    animateThumb: true,
		    showThumbByDefault: true,
		    mode: 'lg-fade'
		});

		$(document).on( 'click', '.lightgallery-thumbnail', slider.showLightGallery );

	},
	showLightGallery: function(e) {

		e.preventDefault();	

		var $obj = $(this).closest('.allGalleryObjects').find('.galleryObjects'),
			index = $(this).closest('.item-gallery').index();

		$obj.find( 'a:eq(' + index + ')' ).click();

	},
	initMarquee: function() {

		var $marquee = $('.marqueePartner'),
			$logo_wrapper = $marquee.find('p'),
			$logo_images = $logo_wrapper.find('img'),
			mheight = 0,
			totalWidth = 0;

		$logo_images.each( function() {

			var $logo = $(this),
				h = $logo.outerHeight(),
				w = $logo.outerWidth(),
				margin = 10;

			if ( mheight < h ) {
				mheight = h;
			}

			totalWidth += w + margin;

		});

		$marquee.height( mheight );
		$logo_wrapper.width( totalWidth );

	}
}
slider.ready();

});