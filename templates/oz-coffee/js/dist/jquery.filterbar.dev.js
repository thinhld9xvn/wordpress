"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupFilterBar = setupFilterBar;

function setupMajFilterBar() {
  var parent_node = jQuery('.majFilterContainerElem')[0],
      $maj_filter_list = jQuery('.majFilterContainerElem > ul'),
      $mj_selected_elem = jQuery('.majFilterContainerElem > span.mjFilterValSelected'),
      dropdown_node = $mj_selected_elem[0],
      onShowFilterListCallback = function onShowFilterListCallback() {
    var v = $mj_selected_elem.data('value');
    $maj_filter_list.find("a[data-value=\"".concat(v, "\"]")).closest('li').addClass('hidden').siblings().removeClass('hidden');
  };

  jQuery(document).on('mouseup', function (e) {
    var target = e.target;

    if (dropdown_node && dropdown_node.contains(target)) {
      if (parent_node && !parent_node.classList.contains("show")) {
        parent_node.classList.add("show");
        onShowFilterListCallback();
      } else {
        parent_node && parent_node.classList.remove("show");
      }
    } else {
      /*if ( ! maj_filter_list_node.contains(target) ) {
            if ( parent_node.classList.contains("show") ) {
                parent_node.classList.remove("show");
            }
        }*/
      if (parent_node && parent_node.classList.contains("show")) {
        parent_node.classList.remove("show");
      }
    }
  });
  jQuery('.majFilterContainerElem a').click(function (e) {
    e.preventDefault();
    var v = jQuery(this).data('value'),
        text = jQuery(this).text().trim();
    $mj_selected_elem.data('value', v).text(text);
  });
}

function setupMajLightGallery() {
  jQuery('.majFilterGridLayoutElem .item a').click(function (e) {
    e.preventDefault();
    var index = jQuery(this).closest('.item').index();
    jQuery(".lightGallery a:eq(".concat(index, ")")).trigger('click');
  });
}

function setupFilterBar() {
  setupMajFilterBar();
  setupMajLightGallery();
}