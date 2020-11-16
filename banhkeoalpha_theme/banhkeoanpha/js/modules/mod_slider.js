jQuery(function($) {

	var slider = {

		bxslider_instances : [],
		bxslider_pagethumb_instances : [],

		bxslider_objects_instances : [], // lưu trữ các mảng id slider => instance nào

		ready: function() {		

			var $bx_pagethumb = $('a', '.bx-pagethumb');

	        slider.initBxSlider();
	        slider.initBxPageThumbSlider();

	        $(window).resize(slider.initBxSlider);
	        $(window).resize(slider.initBxPageThumbSlider);	

	        if ( $bx_pagethumb.length > 0 ) {      

	        	$bx_pagethumb.eq(0).addClass('active');
	        	$bx_pagethumb.click(slider.onBxPageThumbItemClick);

	        }

		},
		initBxSlider: function() {

			var w = $(window).width(),
				count = 0;

			$('.bxslider').each(function( index, elem ) {

				var $slider = $(elem),
					slider_id = $slider.attr('id'),
					slider_width = $slider.width(),
					options = {

						slideWidth : slider_width,
						pager : false,
						minSlides : 1,
						maxSlides : 1,
						onSlideBefore: slider.onBxSliderBefore

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
					slider_width = $slider.width(),
					options = {

						pager : false,
						minSlides : 3,
						maxSlides : 3,
						slideMargin : 10,
						slideWidth : 0

					};						
				
				options.slideWidth = ( slider_width - ( options.minSlides - 1 ) * options.slideMargin ) / options.minSlides;

				if ( slider.bxslider_pagethumb_instances[count] === undefined ) {					
					slider.bxslider_pagethumb_instances[count] = $slider.bxSlider(options);
				}

				else {
					slider.bxslider_pagethumb_instances[count].reloadSlider(options);					
				}

				count++;				

			});


		},
		onBxSliderBefore: function( $slideElement, oldIndex, newIndex ) {

			var $slider = $slideElement.closest('.bxslider'),
				$slider_pagethumb = $( $slider.attr('data-bxslider-pagethumb-target') );				

			if ( $slider_pagethumb.length > 0 ) {

				var $target = $slider_pagethumb.find('.pageitem')
										       .find('a');

				$target.removeClass('active');

				$target.filter('a[data-slide-index=' + newIndex + ']')
					   .addClass('active');

			}
 
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