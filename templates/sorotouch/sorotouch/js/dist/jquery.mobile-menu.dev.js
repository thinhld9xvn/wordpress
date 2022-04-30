"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupNavMobileMenu = setupNavMobileMenu;

function showNavMobileMenuEvent() {
  var mobile_menu_node = jQuery('#header nav.mobile-menu > ul')[0],
      mobile_button_node = jQuery('#header nav.mobile-menu button')[0];
  jQuery(document).on('mouseup', function (e) {
    var target = e.target;

    if (mobile_button_node && mobile_button_node.contains(target)) {
      if (mobile_button_node && !mobile_menu_node.classList.contains("show")) {
        mobile_menu_node.classList.add("show");
      } else {
        mobile_button_node && mobile_menu_node.classList.remove("show");
      }
    } else {
      if (mobile_menu_node && !mobile_menu_node.contains(target)) {
        if (mobile_menu_node.classList.contains("show")) {
          mobile_menu_node.classList.remove("show");
        }
      }
    }
  });
}

function hideNavMobileMenuWhenScroll() {
  var $mobile_menu = jQuery('#header nav.mobile-menu > ul');
  jQuery(window).scroll(function () {
    var v_scroll = jQuery(this).scrollTop();

    if (v_scroll > 0) {
      if ($mobile_menu.hasClass('show')) {
        $mobile_menu.removeClass('show');
      }
    }
  });
}

function expandSubMobileMenu() {
  jQuery('#header nav.mobile-menu .toggle').click(function (e) {
    e.preventDefault();
    jQuery(this).closest('li').toggleClass('expand');
  });
}

function setupNavMobileMenu() {
  showNavMobileMenuEvent();
  hideNavMobileMenuWhenScroll();
  expandSubMobileMenu();
}