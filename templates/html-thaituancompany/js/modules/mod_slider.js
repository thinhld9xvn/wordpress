jQuery(function($) {

	var slider = {

		bxslider_instances : [],

		bxslider_pagethumb_instances : [],

		bxslider_objects_instances : [], // lưu trữ các mảng id slider => instance nào

		bxslider_objects_pagethumb_instances : [], // lưu trữ các mảng id pagethumb slider => instance nào

		ready: function() {		

			var $bx_pagethumb = $('a', '.bx-pagethumb');			 

	        this.initBxSlider();
	        this.initBxPageThumbSlider();

	        $(window).resize(this.initBxSlider);
	        $(window).resize(this.initBxPageThumbSlider);	

	        if ( $bx_pagethumb.length > 0 ) {      

	        	$bx_pagethumb.eq(0).addClass('active');

	        	$(document).on('click', '.bx-pagethumb a', slider.onBxPageThumbItemClick);	        	

	        }  

	        $(document).on('click', '.bxslider-custom-controls a', slider.onBxCustomControlsClick);

	        this.initLightGallery();

	    },

		initBxSlider: function() {

			var w = $(window).width(),

				count = 0;

			$('.bxslider').each(function( index, elem ) {

				var $slider = $(elem),

					slider_id = $slider.attr('id'),

					slider_width = $slider.closest('.bxslider-cn-wrapper').width(),

					options = {

						slideWidth : slider_width,

						pager : false,

						minSlides : 1,

						maxSlides : 1,

						onSlideBefore : slider.onBxSliderBefore,

						onSlideNext: slider.onBxSliderNext,

						onSlidePrev: slider.onBxSliderPrev,

						auto : true,

						pause : 4000

					};

				if ( 'fade' === $slider.attr('data-bxslider-mode') ) {

					options.mode = 'fade';
					//options.pager = true;

				}

				if ( 'carousel' === $slider.attr('data-bxslider-mode' ) ) {

					var slideMargin = 20,

						maxSlides = minSlides = $slider.attr('data-bxslider-numSlidesShow' ),

						slideWidth = 0,				

						_options = {							

						    moveSlides: $slider.attr('data-bxslider-moveSlides' )

						};

					if ( 992 <= w && w <= 1250 ) {

						slideMargin = 20;

						if ( minSlides === undefined ) {

							maxSlides = minSlides = 1;

						}

						else {

							maxSlides = minSlides = 3;

						}

					}

					else if ( 768 <= w && w < 992 ) {

						slideMargin = 10;

						if ( minSlides === undefined ) {

							maxSlides = minSlides = 1;

						}

						else {

							maxSlides = minSlides = 2;

						}

					}

					else if ( w < 768 ) {

						slideMargin = 0;

						maxSlides = minSlides = 1;

					}

					if ( minSlides === undefined ) {

						_options.minSlides = 1;

						_options.maxSlides = 1;

					}

					else {

						_options.minSlides = minSlides;

						_options.maxSlides = maxSlides;

					}					

					slideWidth = ( slider_width - slideMargin * ( _options.minSlides - 1 ) ) / _options.minSlides;					

					_options.slideWidth = slideWidth;					

					_options.slideMargin = slideMargin;							

					$.extend( options, _options );

				}

				if ( slider.bxslider_instances[count] === undefined ) {

					slider.bxslider_instances[count] = $slider.bxSlider(options);

					slider.bxslider_objects_instances[ '#' + slider_id ] = count;
				}

				else {

					slider.bxslider_instances[count].reloadSlider(options);					

				}

				count++;

			});

		},

		initBxPageThumbSlider: function() {

			var count = 0;

			$('.bx-pagethumb').each( function( index, elem ) {

				var w = $(window).width(),

					$slider = $(elem),

					slider_id = $slider.attr('id'),

					slider_width = $slider.width(),

					options = {

						pager : false,

						minSlides : 3,

						maxSlides : 3,

						slideMargin : 10,

						slideWidth : 0,

						infiniteLoop : false,

						hideControlOnEnd: true,



					};						

				

				options.slideWidth = ( slider_width - ( options.minSlides - 1 ) * options.slideMargin ) / options.minSlides;



				if ( slider.bxslider_pagethumb_instances[count] === undefined ) {					

					slider.bxslider_pagethumb_instances[count] = $slider.bxSlider(options);

					slider.bxslider_objects_pagethumb_instances[ '#' + slider_id ] = count;

				}



				else {

					slider.bxslider_pagethumb_instances[count].reloadSlider(options);					

				}



				count++;				



			});

		},

		onBxSliderAction: function( $slideElement, oldIndex, newIndex, action ) {



			var $slider = $slideElement.closest('.bxslider'),

				$slider_pagethumb = $( $slider.attr('data-bxslider-pagethumb-target') ),

				main_index = slider.bxslider_objects_instances[ '#' + $slider.attr('id') ],

				slider_instance = slider.bxslider_instances[ main_index ];

			if ( $slider_pagethumb.length > 0 ) {

				var $target = $slider_pagethumb.find('.pageitem')

										       .find('a');

				$target.removeClass('active')

					   .filter('a[data-slide-index=' + newIndex + ']')

					   .addClass('active');

				var pagethumb_index = slider.bxslider_objects_pagethumb_instances[ '#' + $slider_pagethumb.attr('id') ],

					slider_pagethumb_instance = slider.bxslider_pagethumb_instances[ pagethumb_index ],

					current_index = oldIndex,

					total_index = slider_pagethumb_instance.getSlideCount() - 1;

				if ( action === 'nextSlide' ) {



					if ( current_index < total_index ) {

						slider_pagethumb_instance.goToNextSlide();

					}



					else {

						slider_pagethumb_instance.goToSlide(0);

					}


				}

				else if ( action === 'prevSlide' ) {



					if ( current_index > 0 ) { 

						slider_pagethumb_instance.goToPrevSlide();

					}



					else {

						slider_pagethumb_instance.goToSlide( total_index );

					}

				}

			}

			slider_instance.startAuto();

		},

		onBxSliderBefore: function( $slideElement, oldIndex, newIndex ) {

			slider.onBxSliderAction( $slideElement, oldIndex, newIndex, '' );

		},

		onBxSliderNext: function( $slideElement, oldIndex, newIndex ) {		

			slider.onBxSliderAction( $slideElement, oldIndex, newIndex, 'nextSlide' );

		},

		onBxSliderPrev: function( $slideElement, oldIndex, newIndex ) {		

			slider.onBxSliderAction( $slideElement, oldIndex, newIndex, 'prevSlide' );

 		},

		onBxPageThumbItemClick: function(e) {



			e.preventDefault();



			var slider_target_id = $(this).closest('.bx-pagethumb').attr('data-bxslider-target'),

				instance_index = slider.bxslider_objects_instances[ slider_target_id ],

				slide_item_index = $(this).attr('data-slide-index');



			slider.bxslider_instances[instance_index].goToSlide(slide_item_index);
		},

		onBxCustomControlsClick: function(e) {

			e.preventDefault();

			var $obj = $(this),	

				$controls = $obj.closest('.bxslider-cn-wrapper')
								.find('.bx-wrapper')
								.find('.bx-controls')
								.find('a'),

				action = $obj.attr('class');			

			$controls.filter( '.' + action )
					 .click();

		},

		initLightGallery: function() {

			$('.lightgallery').lightGallery({
			    thumbnail: true,
			    animateThumb: true,
			    showThumbByDefault: true,
			    mode: 'lg-fade'
			}); 			

		}		

	}

	slider.ready();
});