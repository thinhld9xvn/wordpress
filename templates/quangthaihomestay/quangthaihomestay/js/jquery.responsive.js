function isMobileDevice() {
    return window.matchMedia("(max-width: 767px)").matches;
}

function responsiveSliderFullHeight() {

    //if (isMobileDevice()) return;

    const $header = jQuery('#header'),
        header_height = $header.height(),
        slider_height = window.innerHeight - header_height;

    const count = window.bxslider_objects_instances ? window.bxslider_objects_instances['#slider'] : -1,
        instance = count !== -1 ? window.bxslider_instances[count] : null;

    if (instance === null || typeof(instance) === 'undefined') return;

    instance.destroySlider();

    if (jQuery(window).width() > 768) {

        jQuery('.mainslider-cn-wrapper').css('height', slider_height + 'px');

        jQuery('#slider').css('height', slider_height + 'px');



    } else {

        jQuery('.mainslider-cn-wrapper').css('height', '');

        jQuery('#slider').css('height', '');

    }

    instance.reloadSlider();
}

function responsiveIframe() {

    jQuery('iframe, .fixed-object').each(function() {

        if (jQuery(this).parent().hasClass('fixed-size')) return;

        var w = jQuery(this).attr('width');
        var h = jQuery(this).attr('height');
        var ratio = h / w;

        if (!isNaN(ratio)) {

            var width = jQuery(this).width();
            var height = width * ratio;

            jQuery(this).css('height', height + 'px');

            if (jQuery(this).is('iframe')) {

                jQuery(this).css({
                    'display': 'table',
                    'margin': 'auto'
                });

            }

        }

    });

}

function responsiveSliderWhenResized() {

    if (typeof(window.bxslider_objects_instances) === 'undefined') return;

    //if (isMobileDevice()) return;

    const keys = Object.keys(window.bxslider_objects_instances);

    for (let i = 0; i < keys.length; i++) {

        //console.log(keys[i]);

        const id = keys[i],
            count = window.bxslider_objects_instances[id],
            instance = window.bxslider_instances[count],
            $target = jQuery(id);

        instance.destroySlider();

        $target.find('> *').attr('style', ''); // reset all styled

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
                inline = typeof($item.data('inline')) !== 'undefined' ? JSON.parse($item.data('inline')) : false;            

            $contents.attr('style', '');

            let $image = $item.find($item.data('elementThumbnail') + ' img'),
                image_offset_width = $image.length ? $image.width() : 0;

            //console.log($contents);

            if ($image.length) {                

                container_width = $item.width();

                let padding = 0;

                if (jQuery(window).width() <= 768) {

                    if ( inline ) {

                        padding = parseInt($contents.find('> .grid-ryl-element').css('padding')) * 2;
                        image_offset_width += padding;

                    }

                    if (image_offset_width === container_width) return;

                    if (image_offset_width > container_width) {
                        image_offset_width = container_width;
                    }

                    $contents.css({
                        'width': image_offset_width + 'px',
                        'display': 'table',
                        'margin': 'auto'
                    });

                } else {

                    $contents.attr('style', '');

                }

            }

        });

    };

    const performRespSliderList = function() {

        const $items = jQuery('.grid-resp-slider-box'),
            getValidateImageWidth = function($images) {

                let width = 0;

                $images.each(function(i, e) {

                    const $image = jQuery(e);

                    if (width > 0) return;

                    if ($image.width() > 0) {

                        width = $image.width();

                        return true;

                    }

                });

                return width;

            }

        $items.each(function(i, e) {

            let $item = jQuery(e),
                container_width = 0,
                $contents = $item.find($item.data('elementContents')),
                $images = $item.find($item.data('elementThumbnail') + ' img'),
                image_offset_width = 0,
                $next = $item.find('.bxslider-custom-controls > a.bx-next'),
                $previous = $item.find('.bxslider-custom-controls > a.bx-prev');                             

            if ($images.length) {

                $contents.attr('style', '');

                container_width = $item.width();

                image_offset_width = getValidateImageWidth($images);

                //console.log(image_offset_width);

                if (jQuery(window).width() <= 500) {

                    if (image_offset_width === container_width) return;

                    if (image_offset_width > container_width) {
                        image_offset_width = container_width;
                    }

                    $contents.css({
                        'width': image_offset_width + 'px',
                        'display': 'table',
                        'margin': 'auto'
                    });

                    const contents_offset_left = $contents.offset().left,
                            button_offset_left = contents_offset_left - 10,
                            button_previous_offset_left = button_offset_left,
                            button_next_offset_left = button_previous_offset_left + $next.width() + 1;  

                    $previous.css('left', button_offset_left + 'px');
                    $next.css('left', button_next_offset_left + 'px');

                } else {

                    $contents.attr('style', '');
                    $previous.css('style', '');
                    $next.css('style', '');

                }

            }

        });

    };

    performRespBgList();
    performRespSliderList();

    jQuery(window).resize(function() {

        performRespBgList();

        setTimeout(function() {
            performRespSliderList();
        }, 300);

    })

}



export function setupResponsive() {

    const isMobile = isMobileDevice();

    responsiveSliderFullHeight();
    responsiveIframe();
    responsiveRespListBox();

    jQuery(window).resize(function() {

        if (!isMobile) {

            responsiveSliderFullHeight();
            responsiveSliderWhenResized();

        }

        responsiveIframe();

    });

}