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

function responsiveKtCategories() {
  var $thumbnails = jQuery('.catlog .thumbnail');
  $thumbnails.each(function (i, e) {
    var $thumbnail = jQuery(e),
        w = $thumbnail.outerWidth(),
        w1 = $thumbnail.find('img').width(),
        paddingLeft = (w - w1) / 2;
    $thumbnail.closest('.catlog').find('h3').css('padding-left', paddingLeft + 'px');
  });
}

function responsiveArticlesList() {
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

  var performRespArticlesList = function performRespArticlesList() {
    var $articles = jQuery('.articlesList article');
    $articles.each(function (i, e) {
      var $article = jQuery(e),
          $contents = $article.find('.contents');
      var $img = $article.find('.thumbnail img'),
          img_width = $img.width();

      if ($img.length === 1 && jQuery(window).width() < 768) {
        $contents.css('width', img_width + 'px');
      } else {
        $contents.css('width', '');
      }
    });
  };

  var performRespArticlesListT2 = function performRespArticlesListT2() {
    var $articles = jQuery('.grid-articles-list article');
    $articles.each(function (i, e) {
      var $article = jQuery(e),
          container_width = $article.width(),
          $contents = $article.find('.contents'),
          $h3 = $article.find('h3');
      var $background = $article.find('.thumbnail'),
          background_offset_height = $background.height();
      var results = getBackgroundImageSize($background);
      results.then(function (sizes) {
        var width = sizes.width,
            height = sizes.height,
            ratio = width / height;
        var background_offset_width = background_offset_height * ratio;

        if (background_offset_width < container_width) {
          if ($contents.length > 0) {
            $contents.css('width', background_offset_width + 'px');
          } else {
            if ($h3.length > 0) {
              $h3.css('width', background_offset_width + 'px');
            }
          }
        } else {
          $contents.length > 0 && $contents.css('width', '');
          $h3.length > 0 && $h3.css('width', '');
        }
      });
    });
  };

  performRespArticlesList();
  performRespArticlesListT2();
}

function reponsiveWindow() {
  jQuery(window).resize(function () {
    responsiveMegaMenu();
    responsiveIframe();
    responsiveShoppingCartsList();
    responsiveKtCategories();
    responsiveArticlesList();
  });
  responsiveMegaMenu();
  responsiveIframe();
  responsiveShoppingCartsList();
  responsiveKtCategories();
  responsiveArticlesList();
}