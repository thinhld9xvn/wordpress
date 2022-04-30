"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.reponsiveWindow = reponsiveWindow;

function responsiveSlider() {
  var pos = (jQuery(window).width() - jQuery('.container').width()) / 2;
  jQuery('.mainslider-cn-wrapper .bx-prev').css('left', -pos + 'px');
  jQuery('.mainslider-cn-wrapper .bx-next').css('right', -pos + 'px');
}

function responsiveSearchBar() {
  var w = jQuery('.container').width(),
      delta = (jQuery(window).width() - w) / 2;
  jQuery('.header-search-box').css({
    'width': w + 'px',
    'left': delta + 'px',
    'right': delta + 'px'
  });
}

function reponsiveWindow() {
  jQuery(window).resize(responsiveSlider);
  jQuery(window).resize(responsiveSearchBar);
  responsiveSlider();
  responsiveSearchBar();
}