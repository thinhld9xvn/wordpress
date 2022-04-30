"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupWidget = setupWidget;

function setupWidget() {
  if ($(window).width() < 768) {
    jQuery('.widget > h4').click(function () {
      jQuery(this).parent().toggleClass('__expand');
    });
  }
}