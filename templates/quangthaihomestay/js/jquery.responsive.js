function responsiveSliderFullHeight() {

    const $header = jQuery('#header'),        
            header_height = $header.height(),
            slider_height = window.innerHeight - header_height;

    const count = window.bxslider_objects_instances ? window.bxslider_objects_instances['#slider'] : -1,
          instance = count !== -1 ? window.bxslider_instances[count] : null;

    if ( instance === null || typeof(instance) === 'undefined' ) return;

    instance.destroySlider();

    if ( jQuery(window).width() > 768 ) {

        jQuery('.mainslider-cn-wrapper').css('height', slider_height + 'px');

        jQuery('#slider').css('height', slider_height + 'px');

        
        
    }

    else {

        jQuery('.mainslider-cn-wrapper').css('height', '');

        jQuery('#slider').css('height', '');

    }

    instance.reloadSlider();
}

function responsiveIframe() {

    jQuery('iframe, .fixed-object').each(function() {

        if ( jQuery(this).parent().hasClass('fixed-size') ) return;
            
        var w = jQuery(this).attr('width');
        var h = jQuery(this).attr('height');
        var ratio = h / w;

        if ( ! isNaN(ratio) ) {
            
            var width = jQuery(this).width();
            var height = width * ratio;

            jQuery(this).css('height', height + 'px');

            if ( jQuery(this).is('iframe') ) {

                jQuery(this).css({                                       
                                'display' : 'table',
                                'margin' : 'auto'
                            });

            }

        }
                   
    });

}

function responsiveSliderWhenResized() {

    if ( typeof(window.bxslider_objects_instances) === 'undefined' ) return;

    const keys = Object.keys(window.bxslider_objects_instances);

    for ( let i = 0; i < keys.length; i++ ) {

        //console.log(keys[i]);

        const count = window.bxslider_objects_instances[keys[i]],
              instance = window.bxslider_instances[count];

        instance.destroySlider();

        setTimeout(function() {
        
            instance.reloadSlider();

        }, 200);

    }

    
}

function responsiveRespListBox() {

    const getBackgroundImageSize = function(el) {
        var imageUrl = $(el).css('background-image').match(/^url\(["']?(.+?)["']?\)$/);
        var dfd = new $.Deferred();
    
        if (imageUrl) {
            var image = new Image();
            image.onload = dfd.resolve;
            image.onerror = dfd.reject;
            image.src = imageUrl[1];
        } else {
            dfd.reject();
        }
    
        return dfd.then(function() {
            return { width: this.width, height: this.height };
        });
    };

    const performRespBgList = function() {

        const $items = jQuery('.grid-resp-box');

        $items.each(function(i, e) {

            let $item = jQuery(e),
                container_width = 0,
                $contents = $item.find($item.data('elementContents')),
                $image = $item.find($item.data('elementThumbnail') + ' img'),
                image_offset_width = $image.length ? $image.width() : 0;

            //console.log($contents);

            if ( $image.length ) {

                $contents.attr('style', '');

                container_width = $item.width();

                if ( jQuery(window).width() <= 768 ) {

                    if ( image_offset_width === container_width ) return;

                    if ( image_offset_width > container_width ) {
                        image_offset_width = container_width;
                    }

                    $contents.css({
                        'width' : image_offset_width + 'px',
                        'display' : 'table',
                        'margin' : 'auto'
                    });

                }

                else {

                    $contents.attr('style', '');

                }

            }

        });        

    };

    performRespBgList();

    jQuery(window).resize(function() {

        performRespBgList();

    })

}

export function setupResponsive() {

    responsiveSliderFullHeight();
    responsiveIframe();
    responsiveRespListBox();

    jQuery(window).resize(function() {

        responsiveSliderFullHeight();
        responsiveSliderWhenResized();
        responsiveIframe();

    });    

}