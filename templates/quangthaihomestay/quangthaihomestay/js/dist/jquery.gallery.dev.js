"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupGallery = setupGallery;

function setupGallery() {
  var $lg = jQuery('.lightGallery');
  if (typeof $lg.lightGallery !== 'function') return;
  $lg.lightGallery({
    thumbnail: true,
    animateThumb: true,
    showThumbByDefault: true,
    mode: 'lg-fade',
    selector: '.item-gallery',
    addClass: 'lg-fixed-size'
  });
  $lg.on('onAfterOpen.lg', function () {
    var $lg_thumb = jQuery('.lg-fixed-size.lg-outer .lg-thumb-outer .lg-thumb'),
        $lg_prev = jQuery('.lg-fixed-size.lg-outer .lg-actions .lg-prev'),
        $lg_next = jQuery('.lg-fixed-size.lg-outer .lg-actions .lg-next');
    var lg_thumb_width = $lg_thumb.width(),
        lg_thumb_offset_left = $lg_thumb.offset().left;
    /*let   lg_prev_offset_left = ( window.innerWidth - lg_thumb_width ) / 2 - 2 * $lg_prev.width(),
          lg_next_offset_left = ( window.innerWidth - lg_thumb_width ) / 2 + lg_thumb_width;*/

    var lg_prev_offset_left = lg_thumb_offset_left - 2 * $lg_prev.width(),
        lg_next_offset_left = lg_thumb_offset_left + lg_thumb_width;

    if (lg_prev_offset_left < 0) {
      lg_prev_offset_left = 0;
    }

    $lg_prev.css('left', lg_prev_offset_left + 'px');

    if (lg_next_offset_left + $lg_prev.width() > window.innerWidth) {
      $lg_next.css({
        'right': '0',
        'left': 'auto'
      });
    } else {
      $lg_next.css('left', lg_next_offset_left + 'px');
    }
  });
}