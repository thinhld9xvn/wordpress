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
    $maj_filter_list.find("a[data-value=\"".concat(v, "\"]")).closest('li').addClass('hidden').siblings().removeClass('hidden'); //jQuery('#frmFilterGalleriesStyle')[0].submit();
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
    var $frm = jQuery('#frmFilterGalleriesStyle');
    var v = jQuery(this).data('value').trim(),
        text = jQuery(this).text().trim();
    $mj_selected_elem.data('value', v).text(text);
    $frm.find('input[type=hidden][name=style]').val(v);
    $frm[0].submit();
  });
}

function setupMajLightGallery() {
  jQuery('.majFilterGridLayoutElem .item a').click(function (e) {
    e.preventDefault();
    var html = '<div class="lightGallery galleriesMajLgHiddenBox">';
    jQuery('.galleriesMajFilterResultsBoxElem .item > a').each(function (i, e) {
      var $elem = jQuery(e),
          src = $elem.data('bgSrc');
      html += "<a href=\"".concat(src, "\">\n                        <img src=\"").concat(src, "\">\n                     </a>");
    });
    html += '</div>';
    jQuery('body').append(html);
    var $lightGalleries = jQuery('.lightGallery.galleriesMajLgHiddenBox');
    $lightGalleries.lightGallery({
      width: '700px',
      height: '470px',
      mode: 'lg-fade',
      addClass: 'fixed-size',
      counter: false,
      download: false,
      startClass: '',
      enableSwipe: false,
      enableDrag: false,
      speed: 500
    });
    var index = jQuery(this).closest('.item').index();
    $lightGalleries.find("a:eq(".concat(index, ")")).trigger('click'); //jQuery(`.lightGallery a:eq(${index})`).trigger('click');
  });
}

function setupFilterBar() {
  setupMajFilterBar();
  setupMajLightGallery();
}