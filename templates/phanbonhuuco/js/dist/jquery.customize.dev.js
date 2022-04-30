"use strict";

var _jquerySlider = require("./jquery.slider.js");

var _jqueryResponsive = require("./jquery.responsive.js");

var _jqueryMobileMenu = require("./jquery.mobile-menu.js");

var _jqueryTabslist = require("./jquery.tabslist.js");

var _jquerySearchbar = require("./jquery.searchbar.js");

var _jqueryShoppingcart = require("./jquery.shoppingcart.js");

var _jqueryBanksListLogo = require("./jquery.banksListLogo.js");

var _jqueryModal = require("./jquery.modal.js");

_jquerySlider.slider.ready();

_jqueryTabslist.tabsList.ready();

(0, _jqueryResponsive.reponsiveWindow)();
(0, _jqueryMobileMenu.setupNavMobileMenu)();
(0, _jquerySearchbar.setupSearchBar)();
(0, _jqueryShoppingcart.setupShoppingCarts)();
(0, _jqueryBanksListLogo.setupBanksListLogo)();
(0, _jqueryModal.setupPopupMarker)();