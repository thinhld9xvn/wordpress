export function setupGallery() {

    const $lg = jQuery('.lightGallery');    

    $lg.lightGallery({
        thumbnail: true,
        animateThumb: true,
        showThumbByDefault: true,
        mode: 'lg-fade',
        selector: '.item-gallery',
        addClass: 'lg-fixed-size',
    });

    $lg.on('onAfterOpen.lg', function() {

        const $lg_thumb = jQuery('.lg-fixed-size.lg-outer .lg-thumb-outer .lg-thumb'),
              $lg_prev = jQuery('.lg-fixed-size.lg-outer .lg-actions .lg-prev'),
              $lg_next = jQuery('.lg-fixed-size.lg-outer .lg-actions .lg-next');

        const lg_thumb_width = $lg_thumb.width(),
              lg_thumb_offset_left = $lg_thumb.offset().left;

        /*let   lg_prev_offset_left = ( window.innerWidth - lg_thumb_width ) / 2 - 2 * $lg_prev.width(),
              lg_next_offset_left = ( window.innerWidth - lg_thumb_width ) / 2 + lg_thumb_width;*/

        let   lg_prev_offset_left = lg_thumb_offset_left - 2 * $lg_prev.width(),
              lg_next_offset_left = lg_thumb_offset_left + lg_thumb_width;

        if (lg_prev_offset_left < 0 ) {

            lg_prev_offset_left = 0;

        }

        if (lg_next_offset_left > window.innerWidth ) {

            lg_next_offset_left = window.innerWidth;

        }

        $lg_prev.css('left', lg_prev_offset_left + 'px');
        $lg_next.css('left', lg_next_offset_left + 'px');

    });

}