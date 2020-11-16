jQuery(function($) {

    $(window).scroll(function() {

        const $objs = $('.backgroundi-lazy, .i-lazy'),                     
              window_top = $(this).scrollTop(),

            background_ilazy = function( $obj ) {

              	let data_src = $obj.data('src');

              	if ( typeof( data_src ) !== 'undefined' && data_src !== '' ) {

              		$obj.attr('style', '')
              			.removeAttr('data-src')
              			.removeClass('backgroundi-lazy')
              			.attr('style', 'background-image: url("' + data_src + '");');

              	}

            },
            image_ilazy = function( $obj ) {

              	let data_src = $obj.data('src');

              	if ( typeof( data_src ) !== 'undefined' && data_src !== '' ) {

              		$obj.attr('src', '')
              			.removeAttr('style')
              			.removeAttr('data-src')
              			.removeClass('i-lazy')
              			.attr('src', data_src);

              	}

            };

        if ( $objs.length > 0 ) { 

            $objs.each(function(i, e) {

            	const $obj = $(e),
            		  container_top = $obj.closest('.container-lazy-loading').position().top,                      		
              		distance = container_top - window_top;                     

                if ( distance < 100 ) {

                    if ( $obj.hasClass('backgroundi-lazy') ) {

                    	console.log( 'ok' );

                    	background_ilazy( $obj );

                    }

                    else if ( $obj.hasClass('i-lazy') ) {

                    	image_ilazy( $obj );                                

                    }

                }


            });

           

        }

    });

});