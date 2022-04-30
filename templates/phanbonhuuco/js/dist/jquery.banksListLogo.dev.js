"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupBanksListLogo = setupBanksListLogo;

function setupBanksListLogo() {
  jQuery('.logoBanksList > a').click(function (e) {
    e.preventDefault();
    jQuery(this).addClass('active').siblings().removeClass('active');
  });
}