import { isJQueryElementExist } from './meta-menu/checkElementExistUtils.js';

import { isElementContains } from './meta-menu/checkElementContainsUtils.js';

import { toggleMenuCat } from './meta-menu/toggleMenuCatUtils.js';

import { hideMegaCatMenu } from './meta-menu/hideMegaCatMenuUtils.js';

export function setupMegaMenuCategories() {
  
    const $btnMegaMenuCatLists = jQuery('#btnMegaMenuCatLists');

    jQuery(document).on('mouseup', function(e) {

        let target = e.target;

        if (isJQueryElementExist($btnMegaMenuCatLists) && 
                isElementContains($btnMegaMenuCatLists[0], target)) {

            toggleMenuCat();

        } else {

            hideMegaCatMenu();

        }

    });
}