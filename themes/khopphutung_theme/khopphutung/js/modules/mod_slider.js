jQuery(function($) {

	var slider = {
		ready: function() {		

	        this.initBxSlider();
	        this.initLightGallery();                 

		},	
		initBxSlider: function() {		

			$('.bxslider').each(function() {

				var direction = $(this).attr('data-direction'),
					number = $(this).attr('data-minSlides');

				var bxslider = $(this).bxSlider({
					mode: direction,
				    slideMargin: 5,
				    pager: false,
				    minSlides: parseInt( number ),
				    auto: true,
				    autoHover: false,
				    onSlideAfter: function() {
			          bxslider.stopAuto();
			          bxslider.startAuto();
			        }
				});			
					
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

});