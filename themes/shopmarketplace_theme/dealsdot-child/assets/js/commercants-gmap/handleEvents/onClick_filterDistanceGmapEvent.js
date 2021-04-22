import { disableMap } from '../utils/map/disableMapUtils.js';

import { clearAllCurrentMarkers } from '../utils/marker/clearAllCurrentMarkersUtils.js';

import { createBrandsListWithFilters } from '../utils/brandLists/createBrandsListWithFiltersUtils.js';

import { addVisibleMarkers } from '../utils/marker/addVisibleMarkersUtils.js';

import { setDistanceValue, gmap } from '../inits/inits.js';

export function onClick_filterDistanceGmap(e) {

    e.preventDefault();

    setDistanceValue( parseInt(jQuery('.slider-range-distance .value').text().trim()) ); 

    disableMap();

    setTimeout(function() {

        clearAllCurrentMarkers();

        createBrandsListWithFilters();

        addVisibleMarkers(gmap);

    }, 500);

}   