"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.initialize = initialize;

var _onKeyUp_commercantsSearchBoxEvent = require("../handleEvents/onKeyUp_commercantsSearchBoxEvent.js");

var _onClick_filterDistanceGmapEvent = require("../handleEvents/onClick_filterDistanceGmapEvent.js");

var _onClick_filterStoresWithCategoriesEvent = require("../handleEvents/onClick_filterStoresWithCategoriesEvent.js");

var _onClick_filterCommercantNameEvent = require("../handleEvents/onClick_filterCommercantNameEvent.js");

var _onClick_resetFilterEvent = require("../handleEvents/onClick_resetFilterEvent.js");

var _onClick_chooseMarkerToopTipEvent = require("../handleEvents/onClick_chooseMarkerToopTipEvent.js");

var _getBase64ImageUtils = require("./getBase64ImageUtils.js");

var _constants = require("../constants/constants.js");

var _initCoordiatesUtils = require("./initCoordiatesUtils.js");

var _initGmapUtils = require("./initGmapUtils.js");

function initialize() {
  jQuery('#btnFilterDistance').click(_onClick_filterDistanceGmapEvent.onClick_filterDistanceGmap);
  jQuery('#txtCommercantsSearchBox').keyup(_onKeyUp_commercantsSearchBoxEvent.onKeyUp_commercantsSearchBoxKeyUp);
  jQuery('.widget-categories-box li a[data-name]').click(_onClick_filterStoresWithCategoriesEvent.onClick_filterStoresWithCategories); // search commercants name

  jQuery('#btnCommercantsSearch').click(_onClick_filterCommercantNameEvent.onClick_filterCommercantName);
  jQuery('#btnResetFilter').click(_onClick_resetFilterEvent.onClick_resetFilter);
  jQuery(document).on('click', '.marker-tooltip', _onClick_chooseMarkerToopTipEvent.onClick_chooseMarkerToopTip);
  (0, _getBase64ImageUtils.getBase64Image)(_constants.MARKER_ICONS.green_marker);
  (0, _getBase64ImageUtils.getBase64Image)(_constants.MARKER_ICONS.red_marker);
  (0, _getBase64ImageUtils.getBase64Image)(_constants.MARKER_ICONS.user_marker);
  (0, _getBase64ImageUtils.getBase64Image)(_constants.MARKER_ICONS.family_icon);
  var tmrLoadingImage = setInterval(function () {
    if (_constants.MARKER_ICONS.green_marker && _constants.MARKER_ICONS.red_marker && _constants.MARKER_ICONS.family_icon && _constants.MARKER_ICONS.user_marker) {
      clearInterval(tmrLoadingImage);
      (0, _initCoordiatesUtils.init_coordiates)();
    }
  }, 100);
  google.maps.event.addDomListener(window, 'load', _initGmapUtils.init_google_map);
  /*if (jQuery(window).width() > 992) {
        onBindingFixedMap();
    }*/
}