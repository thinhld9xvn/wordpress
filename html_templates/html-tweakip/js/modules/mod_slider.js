jQuery(function($) {

	var slider = {

		bxslider_instances : [],
		bxslider_pagethumb_instances : [],

		bxslider_objects_instances : [], // lưu trữ các mảng id slider => instance nào
		bxslider_objects_pagethumb_instances : [], // lưu trữ các mảng id pagethumb slider => instance nào

		ready: function() {		

			var $bx_pagethumb = $('a', '.bx-pagethumb');			

	        this.initBxSlider();
	        slider.initBxPageThumbSlider();

	        $(window).resize(this.initBxSlider);
	        $(window).resize(slider.initBxPageThumbSlider);

	        if ( $bx_pagethumb.length > 0 ) {      

	        	$bx_pagethumb.eq(0).addClass('active');
	        	$(document).on('click', '.bx-pagethumb a', slider.onBxPageThumbItemClick);	        	

	        }     

		},
		initBxSlider: function() {

			var w = $(window).width(),
				count = 0;

			$('.bxslider').each(function( index, elem ) {

				var $slider = $(elem),
					slider_id = $slider.attr('id'),
					slider_width = $slider.closest('.bxslider-wrapper')
										  .width(),
					options = {

						slideWith : slider_width,
						pager : false,
						minSlides : 1,
						maxSlides : 1,			
						onSlideBefore: slider.onBxSliderBefore,			
						onSlideNext: slider.onBxSliderNext,
						onSlidePrev: slider.onBxSliderPrev,						
						auto : true,
						pause : 5000

					};

				if ( $slider.hasClass( '--fademode' ) ) {

					options.mode = 'fade';

				}

				if ( $slider.hasClass( '--carousel' ) ) {

					var slideMargin = 30,
						maxSlides = minSlides = 4,		
						slideWidth = 0,				
						_options = {							
						    moveSlides: 1						   
						};

					if ( 992 <= w && w <= 1250 ) {
						slideMargin = 20;
						maxSlides = minSlides = 3;
					}

					else if ( 768 <= w && w < 992 ) {
						slideMargin = 10;
						maxSlides = minSlides = 2;
					}

					else if ( w < 768 ) {
						slideMargin = 0;
						maxSlides = minSlides = 1;
					}
					
					slideWidth = ( slider_width - slideMargin * ( minSlides - 1 ) ) / minSlides;

					_options.slideWidth = slideWidth;
					_options.minSlides = minSlides;
					_options.maxSlides = maxSlides;
					_options.slideMargin = slideMargin;				

					$.extend( options, _options );

				}

				if ( $slider.hasClass( '--textmode' ) ) {
					options.controls = false;					
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
					slider_width = $slider.closest('.bxslider-pagethumb-wrapper').width(),
					options = {

						pager : false,
						minSlides : 5,
						maxSlides : 5,
						slideMargin : 5,
						slideWidth : 120,
						infiniteLoop : false,
						hideControlOnEnd: true,

					};									
				

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
				$slider_pagethumb = $( $slider.attr('data-bxslider-pagethumb-target') );				

			if ( $slider_pagethumb.length > 0 ) {

				var $target = $slider_pagethumb.find('.pageitem')
										       .find('a');

				$target.removeClass('active')
					   .filter('a[data-slide-index=' + newIndex + ']')
					   .addClass('active');

				var main_index = slider.bxslider_objects_instances[ '#' + $slider.attr('id') ],
					pagethumb_index = slider.bxslider_objects_pagethumb_instances[ '#' + $slider_pagethumb.attr('id') ],

					slider_instance = slider.bxslider_instances[ main_index ],
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
				
				slider_instance.startAuto();			

			}

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

		}
	
	}

	slider.ready();

});