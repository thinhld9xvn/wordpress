var slider = {
	ready: function() {		

        this.initFlexSlider();   
        this.initLightGallery();         

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

	}
}

slider.ready();