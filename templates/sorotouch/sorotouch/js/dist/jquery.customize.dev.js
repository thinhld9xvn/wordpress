"use strict";

var _jquerySlider = require("./jquery.slider.js");

var _jqueryResponsive = require("./jquery.responsive.js");

var _jqueryMobileMenu = require("./jquery.mobile-menu.js");

var _jqueryTabslist = require("./jquery.tabslist.js");

var _jqueryVideo = require("./jquery.video.js");

var _jquerySidebar = require("./jquery.sidebar.js");

var _jqueryFaqs = require("./jquery.faqs.js");

(0, _jqueryResponsive.reponsiveWindow)();
(0, _jqueryMobileMenu.setupNavMobileMenu)();
(0, _jqueryVideo.setupVideo)();
(0, _jquerySidebar.setupSidebar)();
(0, _jqueryFaqs.setupFaqs)();
jQuery(window).load(function () {
  _jquerySlider.slider.ready();
});

_jqueryTabslist.tabsList.ready();