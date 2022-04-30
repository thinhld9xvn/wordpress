var slider = {

    bxslider_instances : [],

    bxslider_pagethumb_instances : [],

    bxslider_objects_instances : [], // lưu trữ các mảng id slider => instance nào

    bxslider_objects_pagethumb_instances : [], // lưu trữ các mảng id pagethumb slider => instance nào

    bxslider_public_options : {}, // lưu trữ các options cho slider có mode = carousel

    ready: function() {		

        var $bx_pagethumb = jQuery('a', '.bx-pagethumb');			 

        this.initBxSlider();       

        jQuery(window).resize(this.initBxSlider);	

        if ( $bx_pagethumb.length > 0 ) {      

            $bx_pagethumb.eq(0).addClass('active');

            jQuery(document).on('click touchstart', '.bx-pagethumb a', slider.onBxPageThumbItemClick);	        	

        }  

        jQuery(document).on('click touchstart', '.bxslider-custom-controls a', slider.onBxCustomControlsClick);    
        
        //this.initLightGallery();

    },

    initBxSlider: function() {

        var w = jQuery(window).width(),

            count = 0;

        jQuery('.bxslider').each(function( index, elem ) {

            const $slider = jQuery(elem),

                slider_id = $slider.attr('id'),

                slider_width = $slider.closest('.bxslider-cn-wrapper').width(),

                mode = $slider.attr('data-bxslider-mode') !== undefined ? $slider.attr('data-bxslider-mode').toString().trim() : 'fade',

                numSlidesShow = $slider.attr('data-bxslider-slidesShow') !== undefined ? parseInt( $slider.attr('data-bxslider-slidesShow') ) : 1,
                numSlidesShow_md = $slider.attr('data-bxslider-slidesShow-md') !== undefined ? parseInt( $slider.attr('data-bxslider-slidesShow-md') ) : 3,
                numSlidesShow_sm = $slider.attr('data-bxslider-slidesShow-sm') !== undefined ? parseInt( $slider.attr('data-bxslider-slidesShow-sm') ) : 2,
                numSlidesShow_xs = $slider.attr('data-bxslider-slidesShow-xs') !== undefined ? parseInt( $slider.attr('data-bxslider-slidesShow-xs') ) : 2,

                slideMargin = $slider.attr('data-bxslider-margin') !== undefined ? 
                                    parseInt( $slider.attr('data-bxslider-margin') ) : 20,

                slideMargin_md = $slider.attr('data-bxslider-margin-md') !== undefined ?
                                    parseInt( $slider.attr('data-bxslider-margin-md') ) : 20, 

                slideMargin_sm = $slider.attr('data-bxslider-margin-sm') !== undefined ? 
                                parseInt( $slider.attr('data-bxslider-margin-sm') ) : 10,
                                
                slideMargin_xs = $slider.attr('data-bxslider-margin-xs') !== undefined ? 
                                parseInt( $slider.attr('data-bxslider-margin-xs') ) : 10,
                                
                options = {

                    $instance : $slider,						

                    slideWidth : slider_width,

                    slideMargin : slideMargin,

                    pager : false,

                    minSlides : numSlidesShow,

                    maxSlides : numSlidesShow,

                    onSlideBefore : slider.onBxSliderBefore,

                    onSlideNext: slider.onBxSliderNext,

                    onSlidePrev: slider.onBxSliderPrev,

                    onSliderLoad: slider.onSliderLoad,

                    infiniteLoop : $slider.attr('data-bxslider-infiniteLoop') !== undefined ? JSON.parse( $slider.attr('data-bxslider-infiniteLoop') ) : true,

                    auto : $slider.attr('data-bxslider-auto') !== undefined ? JSON.parse( $slider.attr('data-bxslider-auto') ) : true,

                    ticker : $slider.attr('data-bxslider-ticker') !== undefined ? JSON.parse( $slider.attr('data-bxslider-ticker') ) : false,

                    tickerHover : $slider.attr('data-bxslider-tickerHover') !== undefined ? JSON.parse( $slider.attr('data-bxslider-tickerHover') ) : false,

                    autoHover : $slider.attr('data-bxslider-autoHover') !== undefined ? JSON.parse( $slider.attr('data-bxslider-autoHover') ) : true,

                    useCSS : $slider.attr('data-bxslider-useCSS') !== undefined ? JSON.parse( $slider.attr('data-bxslider-useCSS') ) : true,

                    speed : $slider.attr('data-bxslider-speed') !== undefined ? parseInt( $slider.attr('data-bxslider-speed') ) : 500,

                    controls : $slider.attr('data-bxslider-control') !== undefined ? JSON.parse( $slider.attr('data-bxslider-control') ) : true,

                    hideControlOnEnd : $slider.attr('data-bxslider-hideControlOnEnd') !== undefined ? JSON.parse( $slider.attr('data-bxslider-hideControlOnEnd') ) : false,

                    pause : $slider.attr('data-bxslider-pause') !== undefined ? parseInt( $slider.attr('data-bxslider-pause') ) : 4000

                };
           

            if ( 'fade' === mode ) {
                
                options.mode = 'fade';					

            }

            else if ( 'vertical' === mode ) {					

                options.mode = 'vertical';

            }

            else if ( 'carousel' === mode ) {

                var _options = {							

                    mode: 'horizontal',
                    moveSlides: 1

                };                

                if ( 992 <= w && w <= 1250 ) {

                    console.log('abc');

                    if ( options.slideMargin > 0 ) {

                        options.slideMargin = slideMargin_md;

                    }

                    options.minSlides = options.maxSlides = numSlidesShow_md;

                }

                else if ( 768 <= w && w < 992 ) {

                    if ( options.slideMargin > 0 ) {

                        options.slideMargin = slideMargin_sm;

                    }

                    options.minSlides = options.maxSlides = numSlidesShow_sm;

                }

                else if ( 500 <= w && w < 768 ) {

                    options.slideMargin = slideMargin_xs;

                    options.minSlides = options.maxSlides = numSlidesShow_xs;

                }

                else if ( w < 500 ) {

                    options.slideMargin = 0;

                    options.minSlides = options.maxSlides = 1;

                }

                _options.slideWidth = ( slider_width - options.slideMargin * ( options.minSlides - 1 ) ) / options.minSlides;

                jQuery.extend( options, _options );

            }

            $slider.data('bxslider-control-index', 0);

            if ( slider.bxslider_instances[count] === undefined ) {

                slider.bxslider_instances[count] = $slider.bxSlider( options );

                window.bxslider_instances = slider.bxslider_instances;

                //console.log( slider.bxslider_instances[count] );

                slider.bxslider_objects_instances[ '#' + slider_id ] = count;		
                window.bxslider_objects_instances = slider.bxslider_objects_instances;

            }

            else {

                slider.bxslider_instances[count].reloadSlider(options);

            }

            if ( $slider.data('bxslider-object') === 'tab' ) {

                $slider.closest('.singleTabBox-cn-wrapper')
                       .find('.bx-controls-direction > a')
                       .unbind('click')
                       .bind('click', { $slider: $slider, options: options, instance: slider.bxslider_instances[count] }, slider.onBxsliderTabAction);

            }

            count++;

        });

    },

    

    onBxSliderAction: function( $slideElement, oldIndex, newIndex, action ) {

        var $slider = $slideElement.closest('.bxslider'),

            $slider_pagethumb = jQuery( $slider.attr('data-bxslider-pagethumb-target') ),

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

        if ( ( $slider.data('bxslider-auto') === undefined ) || 
             ( $slider.data('bxslider-auto') !== undefined &&
               JSON.parse( $slider.data('bxslider-auto') ) === true ) ) {

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

     onSliderLoad: function( currentIndex ) {

         var self = this,
             $slider = self.$instance,
             mode = self.mode,
             numSlidesShow = self.minSlides; 				

         if ( $slider.data('bxslider-object') === 'tab' ) {

             setTimeout(function() {

                 if ( mode === 'horizontal' ) {

                    var total_twidth = 0,
                        n = 0,
                        $slides = $slider.find('> *'),
                        slides_length = $slides.length;

                    $slides.each(function(i, e) {

                        if ( n < numSlidesShow ) {

                            var $element = jQuery(e),
                                w = $element.outerWidth();

                            total_twidth += w;

                            n++;

                        }

                    });

                    if ( total_twidth > 0 ) {

                        $slider.closest('.bx-viewport')
                               .outerWidth( total_twidth + 2 );

                    }

                    if ( slides_length > numSlidesShow ) {

                        $slider.closest('.bxslider-cn-wrapper')
                               .find('.bx-controls-direction > a')
                               .removeClass('disabled');

                    }

                    $slider.css('transform', 'translate3d(0px, 0px, 0px)');

                }

            }, 200);

         }

     },

     onBxsliderTabAction: function(e) {

         e.preventDefault();

        var $slider = e.data.$slider,
            instance = e.data.instance,
            options = e.data.options,
            $bx_controls_direction = $slider.closest('.bxslider-cn-wrapper')
                                              .find('.bx-controls-direction > a'),
            action = jQuery(this).attr('class') === 'bx-next' ? 'nextSlide' : 'prevSlide';

        if ( action === 'nextSlide' || action === 'prevSlide' ) {

            var numSlidesShow = options.minSlides,
                mode = options.mode,
                current_index = parseInt( $slider.data('bxslider-control-index') ),
                total_index = 0,
                slides_length = $slider.find('> *')
                                       .length;

            if ( slides_length > numSlidesShow ) {

                total_index = slides_length - numSlidesShow;

            }					

            if ( mode === 'horizontal' ) {

                if ( action === 'nextSlide' ) {

                    if ( current_index < total_index ) {							

                        instance.goToNextSlide();

                        current_index++;

                        /*if ( current_index < total_index ) {

                            $bx_controls_direction.filter('.bx-next')
                                                  .removeClass('disabled');

                        } 

                        else {

                            $bx_controls_direction.filter('.bx-next')
                                                  .addClass('disabled');								

                        }

                        $bx_controls_direction.filter('.bx-prev')
                                              .removeClass('disabled');*/

                    }

                }

                else if ( action === 'prevSlide' ) {

                    if ( current_index > 0 ) {

                        instance.goToPrevSlide();

                        current_index--;

                        /*if ( current_index > 0 ) {

                            $bx_controls_direction.filter('.bx-prev')
                                                  .removeClass('disabled');

                        } 

                        else {

                            $bx_controls_direction.filter('.bx-prev')
                                                  .addClass('disabled');

                        }	

                        $bx_controls_direction.filter('.bx-next')
                                              .removeClass('disabled');*/						

                    }					

                }

                $slider.data('bxslider-control-index', current_index);

            }

        }

     },

    onBxPageThumbItemClick: function(e) {

        e.preventDefault();

        var slider_target_id = jQuery(this).closest('.bx-pagethumb').attr('data-bxslider-target'),

            instance_index = slider.bxslider_objects_instances[ slider_target_id ],

            slide_item_index = jQuery(this).attr('data-slide-index');

        slider.bxslider_instances[instance_index].goToSlide(slide_item_index);
    },

    onBxCustomControlsClick: function(e) {

        e.preventDefault();

        var $obj = jQuery(this),	

            type = $obj.parent().data('bxsliderType'),

            performPageThumbEvent = function() {
                var slider_target_id = jQuery(this).closest('.bxslider-cn-wrapper')
                                               .find('.bx-pagethumb')
                                                .attr('data-bxslider-target'),

                instance_index = slider.bxslider_objects_instances[ slider_target_id ],

                action = jQuery(this).attr('class');

                if (action === 'bx-next') {

                    slider.bxslider_instances[instance_index].goToNextSlide();

                }

                else { 
                    slider.bxslider_instances[instance_index].goToPrevSlide();
                }
            },

            performSliderEvent = function() {
                var slider_target_id = jQuery(this).closest('.bxslider-cn-wrapper')
                                                   .find('.bxslider')
                                                   .attr('id'),

                instance_index = slider.bxslider_objects_instances[`#${slider_target_id}`],

                action = jQuery(this).attr('class');

                if (action === 'bx-next') {     

                    slider.bxslider_instances[instance_index].goToNextSlide();

                }

                else { 
                    slider.bxslider_instances[instance_index].goToPrevSlide();
                }
            }

        if ( type === 'bx-pagethumb' ) {

            performPageThumbEvent.call(this);

        }

        else {

            performSliderEvent.call(this);
            
        }

    }
}