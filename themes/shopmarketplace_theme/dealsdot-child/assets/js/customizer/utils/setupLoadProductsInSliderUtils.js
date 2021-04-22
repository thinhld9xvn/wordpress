import { onClick_loadAjaxProductsListEvent } from '../handleEvents/onClick_loadAjaxProductsListEvent.js';

import { onSelect2_loadAjaxProductsListEvent } from '../handleEvents/onSelect2_loadAjaxProductsListEvent.js';

export function setupLoadProductsInSlider() {  

    const $slNavProductSlideShow = jQuery('#slNavProductSlideShow');

    jQuery('#product-tabs-slider ul.nav-tabs li > a').click(onClick_loadAjaxProductsListEvent);    

    $slNavProductSlideShow.select2()
        .on('select2:select', onSelect2_loadAjaxProductsListEvent);

}