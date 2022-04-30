"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.reponsiveWindow = reponsiveWindow;

function responsiveBorderMainSlider() {
  var BORDER_OFFSET_SP = 30,
      BORDER_LEFT_OFFSET_SP = 30,
      BORDER_OFFSET_HEIGHT = 2;
  var $slider_items = jQuery('.slider-main-item');
  $slider_items.each(function (i, e) {
    var $slider_item = jQuery(e),
        $container = $slider_item.find('figcaption'),
        $figcaption = $container.find('.headingFigCaption'),
        $first_elem = $figcaption.find('> *:first-child'),
        $middle_elem = $figcaption.find('> *:nth-child(2)'),
        $last_elem = $figcaption.find('> *:last-child'),
        $border_top = $slider_items.find('.figure-slider-border.__top'),
        $border_left = $slider_items.find('.figure-slider-border.__left'),
        $border_right = $slider_items.find('.figure-slider-border.__right'),
        $border_bottom = $slider_items.find('.figure-slider-border.__bottom'),
        container_width = $container.width(),
        container_height = $container.outerHeight(),
        first_elem_width = $first_elem.width(),
        first_elem_height = $first_elem.height(),
        last_elem_width = $last_elem.width(),
        last_elem_height = $last_elem.height(),
        figcaption_padding_top_offset = parseInt($figcaption.css('padding-top')),
        border_top_offset_top = first_elem_height / 2,
        border_top_offset_left = first_elem_width + BORDER_OFFSET_SP,
        border_top_offset_width = container_width - first_elem_width - BORDER_OFFSET_SP,
        middle_elem_height = $middle_elem.height(),
        border_right_offset_top = border_top_offset_top + BORDER_OFFSET_HEIGHT,
        border_right_offset_height = middle_elem_height / 2 - BORDER_OFFSET_HEIGHT,
        border_left_offset_top = figcaption_padding_top_offset + middle_elem_height + BORDER_LEFT_OFFSET_SP,
        border_left_offset_height = container_height - border_left_offset_top - last_elem_height / 2,
        border_bottom_offset_bottom = last_elem_height / 2 - BORDER_OFFSET_HEIGHT,
        border_bottom_offset_width = container_width - last_elem_width - BORDER_OFFSET_SP; //console.log($last_elem, $last_elem.width());

    $border_top.css({
      'top': border_top_offset_top + 'px',
      'left': border_top_offset_left + 'px',
      'width': border_top_offset_width + 'px'
    });
    $border_right.css({
      'top': border_right_offset_top + 'px',
      'height': border_right_offset_height + 'px'
    });
    $border_left.css({
      'top': border_left_offset_top + 'px',
      'height': border_left_offset_height + 'px'
    });
    $border_bottom.css({
      'bottom': border_bottom_offset_bottom + 'px',
      'width': border_bottom_offset_width + 'px'
    });
  });
}

function responsiveSlider() {
  var performRespMainSlider = function performRespMainSlider() {
    var pos = (jQuery(window).width() - jQuery('.container').width()) / 4;
    jQuery('.mainslider-cn-wrapper .bx-prev').css('left', pos + 'px');
    jQuery('.mainslider-cn-wrapper .bx-next').css('right', pos + 'px');
  };

  var performRespPortolifoFeedsSlider = function performRespPortolifoFeedsSlider() {
    var $container = jQuery('.bxslider-portfoliofeeds-cn-wrapper').closest('.container'),
        pos = (jQuery(window).width() - $container.width()) / 8;
    jQuery('.bxslider-portfoliofeeds-cn-wrapper .bx-prev').css('left', -pos + 'px');
    jQuery('.bxslider-portfoliofeeds-cn-wrapper .bx-next').css('right', -pos + 'px');
  };

  performRespMainSlider();
  performRespPortolifoFeedsSlider();
}

function responsiveIframe() {
  jQuery('iframe, .fixed-object').each(function () {
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

function responsiveRespListBox() {
  var getBackgroundImageSize = function getBackgroundImageSize(el) {
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

    return dfd.then(function () {
      return {
        width: this.width,
        height: this.height
      };
    });
  };

  var performRespBgList = function performRespBgList() {
    if (jQuery(window).width() <= 768) {
      var $items = jQuery('.grid-resp-listbox .item');
      $items.each(function (i, e) {
        var $item = jQuery(e),
            container_width = $item.width(),
            $contents = $item.find('.contents');
        var $background = $item.find('.bg-thumbnail'),
            $image = $item.find('.thumbnail img'),
            background_offset_height = $background.length ? $background.height() : 0,
            image_offset_width = $image.length ? $image.width() : 0; //console.log(background_offset_height);

        if ($background.length) {
          var results = getBackgroundImageSize($background);
          results.then(function (sizes) {
            var width = sizes.width,
                height = sizes.height,
                ratio = width / height;
            var background_offset_width = background_offset_height * ratio;

            if (background_offset_width < container_width) {
              $contents.css('width', background_offset_width + 'px');
            } else {
              $contents.css('width', '');
            }
          });
        } else {
          if ($image.length) {
            $contents.css('width', image_offset_width + 'px');
          } else {
            $contents.css('width', '');
          }
        }
      });
    }
  };

  performRespBgList();
  jQuery(window).resize(function () {
    performRespBgList();
  });
}

function reponsiveWindow() {
  jQuery(window).resize(function () {
    responsiveSlider();
    responsiveIframe();
    responsiveBorderMainSlider();
    responsiveRespListBox();
  });
  responsiveIframe();
  responsiveSlider();
  responsiveRespListBox();
  jQuery(window).load(function () {
    responsiveBorderMainSlider();
  });
}