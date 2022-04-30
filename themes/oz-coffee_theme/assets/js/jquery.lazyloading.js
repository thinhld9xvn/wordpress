export function setupLazyLoading() {

    jQuery(window).scroll(function() {

        const $objs = jQuery('.backgroundi-lazy, .i-lazy'),                     
            window_top = jQuery(this).scrollTop(),

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

                const $obj = jQuery(e);

                let distance = $obj.offset().top;

                if ( distance === 0 ) {

                    distance = $obj.parent().offset().top;

                    if ( distance === 0 ) {

                        distance = $obj.parent().parent().offset().top;

                    }

                }

                if ( window_top >= distance - 500 ) {

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

}