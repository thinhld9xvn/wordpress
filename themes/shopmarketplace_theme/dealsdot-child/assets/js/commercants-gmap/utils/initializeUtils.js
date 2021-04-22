import { onKeyUp_commercantsSearchBoxKeyUp } from '../handleEvents/onKeyUp_commercantsSearchBoxEvent.js';

import { onClick_filterDistanceGmap } from '../handleEvents/onClick_filterDistanceGmapEvent.js';

import { onClick_filterStoresWithCategories } from '../handleEvents/onClick_filterStoresWithCategoriesEvent.js';

import { onClick_filterCommercantName } from '../handleEvents/onClick_filterCommercantNameEvent.js';

import { onClick_resetFilter } from '../handleEvents/onClick_resetFilterEvent.js';

import { onClick_chooseMarkerToopTip } from '../handleEvents/onClick_chooseMarkerToopTipEvent.js';

import { getBase64Image } from './getBase64ImageUtils.js';

import { MARKER_ICONS } from '../constants/constants.js';

import { init_coordiates } from './initCoordiatesUtils.js';

import { init_google_map } from './initGmapUtils.js';

export function initialize() {

    jQuery('#btnFilterDistance').click(onClick_filterDistanceGmap);

    jQuery('#txtCommercantsSearchBox').keyup(onKeyUp_commercantsSearchBoxKeyUp);

    jQuery('.widget-categories-box li a[data-name]').click(onClick_filterStoresWithCategories);

    // search commercants name
    jQuery('#btnCommercantsSearch').click(onClick_filterCommercantName);

    jQuery('#btnResetFilter').click(onClick_resetFilter);

    jQuery(document).on('click', '.marker-tooltip', onClick_chooseMarkerToopTip);

    getBase64Image(MARKER_ICONS.green_marker);
    getBase64Image(MARKER_ICONS.red_marker);
    getBase64Image(MARKER_ICONS.user_marker);
    getBase64Image(MARKER_ICONS.family_icon);

    const tmrLoadingImage = setInterval(function() {

        if (MARKER_ICONS.green_marker && 
            MARKER_ICONS.red_marker && 
            MARKER_ICONS.family_icon && 
            MARKER_ICONS.user_marker) {

            clearInterval(tmrLoadingImage);

            init_coordiates();

        }

    }, 100);

    google.maps.event.addDomListener(window, 'load', init_google_map);

    /*if (jQuery(window).width() > 992) {

        onBindingFixedMap();

    }*/

}    