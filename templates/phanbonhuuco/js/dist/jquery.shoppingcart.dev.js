"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupShoppingCarts = setupShoppingCarts;

function toggleStateShoppingCartsListEvent() {
  jQuery('#anfa-navigation > .carts').on('mouseover', function (e) {
    jQuery(this).siblings('.cartsListDropDown').addClass('show');
  }).on('mouseout', function (e) {
    jQuery(this).siblings('.cartsListDropDown').removeClass('show');
  });
  jQuery('#anfa-navigation > .cartsListDropDown').on('mouseover', function (e) {
    jQuery(this).addClass('show');
  }).on('mouseout', function (e) {
    jQuery(this).removeClass('show');
  });
}

function setupShoppingCarts() {
  toggleStateShoppingCartsListEvent();
}