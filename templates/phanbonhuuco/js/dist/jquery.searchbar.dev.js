"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupSearchBar = setupSearchBar;

function setupSearchBar() {
  var $searchbar = jQuery('#anfa-navigation .searchbar'),
      left = jQuery('#anfa-navigation').offset().left - $searchbar.width() / 2;

  var showSearchBarEvent = function showSearchBarEvent() {
    var search_button_node = jQuery('#anfa-navigation a.search')[0],
        searchbar_node = $searchbar[0];
    jQuery(document).on('mouseup', function (e) {
      var target = e.target;

      if (search_button_node && search_button_node.contains(target)) {
        if (searchbar_node && !searchbar_node.classList.contains("show")) {
          searchbar_node.classList.add("show");
        } else {
          searchbar_node && searchbar_node.classList.remove("show");
        }
      } else {
        if (searchbar_node && !searchbar_node.contains(target)) {
          if (searchbar_node.classList.contains("show")) {
            searchbar_node.classList.remove("show");
          }
        }
      }
    });
  };

  var hideSearchBarWhenScroll = function hideSearchBarWhenScroll() {
    jQuery(window).scroll(function () {
      var v_scroll = jQuery(this).scrollTop();

      if (v_scroll > 0) {
        if ($searchbar.hasClass('show')) {
          $searchbar.removeClass('show');
        }
      }
    });
  };

  $searchbar.css('left', left + 'px');
  hideSearchBarWhenScroll();
  showSearchBarEvent();
}