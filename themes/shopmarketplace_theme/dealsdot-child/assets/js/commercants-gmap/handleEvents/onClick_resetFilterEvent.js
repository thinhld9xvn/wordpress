import { resetDefFilterValues } from '../utils/resetDefFilterValuesUtils.js';

import { resetFilterSearchText } from '../utils/resetFilterSearchTextUtils.js';

import { resetFilterDistanceBar } from '../utils/resetFilterDistanceBarUtils.js';

import { resetFilterCategoryBox } from '../utils/resetFilterCategoryBoxUtils.js';

import { disableMap } from '../utils/map/disableMapUtils.js';

import { clearAllCurrentMarkers } from '../utils/marker/clearAllCurrentMarkersUtils.js';

import { createBrandsListWithFilters } from '../utils/brandLists/createBrandsListWithFiltersUtils.js';

import { addVisibleMarkers } from '../utils/marker/addVisibleMarkersUtils.js';

import { gmap } from '../inits/inits.js';

export function onClick_resetFilter(e) {

    e.preventDefault();

    resetDefFilterValues();

    resetFilterSearchText();

    resetFilterDistanceBar();

    resetFilterCategoryBox();
    
    disableMap();

    setTimeout(function() {

        clearAllCurrentMarkers();

        createBrandsListWithFilters();

        addVisibleMarkers(gmap);

    }, 500);

}