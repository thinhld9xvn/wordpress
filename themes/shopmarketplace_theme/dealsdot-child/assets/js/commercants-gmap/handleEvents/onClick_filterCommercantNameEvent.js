import { disableMap } from '../utils/map/disableMapUtils.js';

import { clearAllCurrentMarkers } from '../utils/marker/clearAllCurrentMarkersUtils.js';

import { addVisibleMarkers } from '../utils/marker/addVisibleMarkersUtils.js';

import { createBrandsListWithFilters } from '../utils/brandLists/createBrandsListWithFiltersUtils.js';

import { gmap } from '../inits/inits.js';

export function onClick_filterCommercantName(e) {

    //e.preventDefault();

    //const value = jQuery('#txtCommercantsSearchBox').val();

    disableMap();

    setTimeout(function() {

        clearAllCurrentMarkers();

        createBrandsListWithFilters();

        addVisibleMarkers(gmap);

    }, 500);

}