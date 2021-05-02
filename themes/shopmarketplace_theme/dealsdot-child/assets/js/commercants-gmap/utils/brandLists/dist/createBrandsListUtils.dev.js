"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.createBrandsList = createBrandsList;

var _createLoadingAjaxUtils = require("../loading/createLoadingAjaxUtils.js");

var _constants = require("../../constants/constants.js");

var _createBrandItemHTMLUtils = require("../brandItem/createBrandItemHTMLUtils.js");

var _selectBrandItemUtils = require("../brandItem/selectBrandItemUtils.js");

var _selectBrandNameItemUtils = require("../brandItem/selectBrandNameItemUtils.js");

var _hoverBrandItemUtils = require("../brandItem/hoverBrandItemUtils.js");

var _notHoverBrandItemUtils = require("../brandItem/notHoverBrandItemUtils.js");

var _initPaginationUtils = require("../pagination/initPaginationUtils.js");

var _removeLoadingAjaxUtils = require("../loading/removeLoadingAjaxUtils.js");

function createBrandsList(dv) {
  var coordiates = _constants.MAP_SETTINGS.coordiates;
  (0, _createLoadingAjaxUtils.createLoadingAjax)();
  jQuery('.brands-list').html('');
  jQuery("#pagin").html('');
  setTimeout(function () {
    var html = '';
    var arrResults = [];
    coordiates.map(function (item, i) {
      if (dv !== 0) {
        if (item.coord.distance <= dv) {
          arrResults.push(i);
        }
      } else {
        arrResults.push(i);
      }
    }); //console.log(html);

    jQuery('.brands-list').html(html).on('click', '.brand-item', _selectBrandItemUtils.selectBrandItem).on('click', '.brand-item h4', _selectBrandNameItemUtils.selectBrandNameItem).on('mouseover', '.brand-item', _hoverBrandItemUtils.hoverBrandItem).on('mouseout', '.brand-item', _notHoverBrandItemUtils.notHoverBrandItem);
    var items_length = jQuery('.brands-list > .brand-item').length;
    (0, _initPaginationUtils.init_pagination)(items_length, _constants.COMMERCANTS_PAGINATION.pagesize, _constants.COMMERCANTS_PAGINATION.incremslide, _constants.COMMERCANTS_PAGINATION.startpage, _constants.COMMERCANTS_PAGINATION.numberpage);
    (0, _removeLoadingAjaxUtils.removeLoadingAjax)();

    if (!window.is_map_loaded) {
      window.is_map_loaded = true;
    }
  }, 2000);
}