import { setCategoryIdsSelected, gmap } from '../inits/inits.js';

import { createBrandsListWithFilters } from '../utils/brandLists/createBrandsListWithFiltersUtils.js';

import { disableMap } from '../utils/map/disableMapUtils.js';

import { clearAllCurrentMarkers } from '../utils/marker/clearAllCurrentMarkersUtils.js';

import { addVisibleMarkers } from '../utils/marker/addVisibleMarkersUtils.js';

export function onClick_filterStoresWithCategories(e) {

    e.preventDefault();

    const $this = jQuery(this);

    const __performAction = function() {

        const name = $this.data('name').toString().trim().toLowerCase();
        
            //shop_lists = [];

        let category_ids_selected = [];

        if ( name !== 'all' ) {

            _brands_lists_info.map((item, i) => {               

                const secteur = item.secteur_activity.trim().toLowerCase();

                if (name === secteur) {

                    //shop_lists.push(i);
                    category_ids_selected.push(i);

                }

            });

        }

        else {

            category_ids_selected = [];

        }

        setCategoryIdsSelected(category_ids_selected);

        $this.parent().addClass('active')
            .siblings()
            .removeClass('active');

        createBrandsListWithFilters();

    };

    disableMap();

    setTimeout(function() {

        clearAllCurrentMarkers();

        __performAction();

        addVisibleMarkers(gmap);

    }, 500);



}