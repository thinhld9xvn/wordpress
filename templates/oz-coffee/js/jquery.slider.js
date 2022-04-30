export let slider = {

    bxslider_instances : [],

    bxslider_pagethumb_instances : [],

    bxslider_objects_instances : [], // lưu trữ các mảng id slider => instance nào

    bxslider_objects_pagethumb_instances : [], // lưu trữ các mảng id pagethumb slider => instance nào

    ready: function() {		

        var $bx_pagethumb = jQuery('a', '.bx-pagethumb');			 

        this.initBxSlider();
        this.initBxPageThumbSlider();

        jQuery(window).resize(this.initBxSlider);
        jQuery(window).resize(this.initBxPageThumbSlider);	

        if ( $bx_pagethumb.length > 0 ) {      

            $bx_pagethumb.eq(0).addClass('active');

            jQuery(document).on('click', '.bx-pagethumb a', slider.onBxPageThumbItemClick);	        	

        }  

        jQuery(document).on('click', '.bxslider-custom-controls a', slider.onBxCustomControlsClick);

        this.initLightGallery();

    },

    initBxSlider: function() {

        var w = jQuery(window).width(),

            count = 0;

        jQuery('.bxslider').each(function( index, elem ) {

            var $slider = jQuery(elem),

                slider_id = $slider.attr('id'),

                slider_width = $slider.closest('.bxslider-cn-wrapper').width(),

                pauseOption = $slider.data('pause') ? parseInt( $slider.data('pause') ) : 4000,

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

            if ( $slider.hasClass( '--fademode' ) ) {

                options.mode = 'fade';
                options.pause = pauseOption;
                //options.pager = true;

            }

            if ( $slider.hasClass( '--carousel' ) ) {

                let  numShowItems = $slider.data('numshow') ? parseInt( $slider.data('numshow') ) : 1,                     
                     elements_count = $slider.find('> *').length;           

                if ( elements_count < numShowItems  ) {

                    numShowItems = elements_count;

                }  

                var slideMargin = 30,

                    maxSlides = numShowItems,
                    minSlides = numShowItems,

                    slideWidth = 0,				

                    _options = {							

                        moveSlides: 1,
                        pause : pauseOption

                    };

                if ( 992 <= w && w <= 1250 ) {

                    slideMargin = 20;

                    maxSlides = numShowItems;
                    minSlides = numShowItems;

                }

                else if ( 768 <= w && w < 992 ) {

                    slideMargin = 10;

                    maxSlides = numShowItems >= 2 ? 2 : 1;
                    minSlides = numShowItems >= 2 ? 2 : 1;

                }

                else if ( w < 768 ) {

                    slideMargin = 0;

                    maxSlides = 1;
                    minSlides = 1;

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

        jQuery('.bx-pagethumb').each( function( index, elem ) {

            var w = jQuery(window).width(),

                $slider = jQuery(elem),

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



        var slider_target_id = jQuery(this).closest('.bx-pagethumb').attr('data-bxslider-target'),

            instance_index = slider.bxslider_objects_instances[ slider_target_id ],

            slide_item_index = jQuery(this).attr('data-slide-index');



        slider.bxslider_instances[instance_index].goToSlide(slide_item_index);
    },

    onBxCustomControlsClick: function(e) {

        e.preventDefault();

        var $obj = jQuery(this),	

            $controls = $obj.closest('.bxslider-cn-wrapper')
                            .find('.bx-wrapper')
                            .find('.bx-controls')
                            .find('a'),

            action = $obj.attr('class');			

        $controls.filter( '.' + action )
                 .click();

    },

    initLightGallery: function() {

        var $lg = jQuery('.lightGallery');

        if ( $lg.length ) {
        
            $lg.lightGallery({
                thumbnail: true,
                animateThumb: true,
                showThumbByDefault: true,
                mode: 'lg-fade'
            });

        }

    }

}