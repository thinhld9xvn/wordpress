import { addMarker } from './addMarkerUtils.js';

import { getLatLngAddrMapObj } from '../map/getLatLngAddrMapObjUtils.js';
import { enableMap } from '../map/enableMapUtils.js';

import { showUserMarkerContent } from './showUserMarkerContentUtils.js';

export function addVisibleMarkers(map) {

    let $brandsList = null;

    const tmr1 = setInterval(function() {

        $brandsList = jQuery('.brands-list > .brand-item:visible');

        if ($brandsList.length > 0) {

            clearInterval(tmr1);

            $brandsList.each(function(item, i) {

                let index = parseInt(jQuery(this).data('index'));

                addMarker(index, getLatLngAddrMapObj(index), map);

            });

            showUserMarkerContent();

            enableMap();

        }

    });

}