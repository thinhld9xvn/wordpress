"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.reponsiveWindow = reponsiveWindow;

function responsiveMegaMenu() {
  var $megaMenu = jQuery('#menu .mega');
  $megaMenu.each(function (i, e) {
    var $elem = jQuery(e),
        $sub_menu = $elem.find('> .sub-menu'),
        left = $elem.offset().left - $sub_menu.width() / 2 + $elem.width() / 2;
    $elem.find('> .sub-menu').css('left', left + 'px');
  });
}

function responsiveShoppingCartsList() {
  var $cartsList = jQuery('.cartsListDropDown'),
      cartsListWidth = $cartsList.width();
  var left = jQuery('a.carts').offset().left - cartsListWidth / 2 - 52;

  if (jQuery(window).width() <= 1200) {
    left = jQuery('#anfa-navigation').offset().left - cartsListWidth / 1.4;
  }

  $cartsList.css('left', left + 'px');
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

function reponsiveWindow() {
  jQuery(window).resize(function () {
    responsiveMegaMenu();
    responsiveIframe();
    responsiveShoppingCartsList();
  });
  responsiveMegaMenu();
  responsiveIframe();
  responsiveShoppingCartsList();
}