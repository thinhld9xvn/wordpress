"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupSidebar = setupSidebar;

function setupSidebar() {
  if (jQuery(window).width() < 1020) {
    jQuery('.sidebar h2').click(function (e) {
      e.preventDefault();
      jQuery(this).parent().toggleClass('__expand');
    });
  }
}