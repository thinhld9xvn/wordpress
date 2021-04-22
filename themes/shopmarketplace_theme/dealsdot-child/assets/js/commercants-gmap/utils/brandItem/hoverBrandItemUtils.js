import { MAP_SETTINGS, STRBASE64 } from '../../constants/constants.js';

import { idx_marker_selected, green_marker, infoWindow } from '../../inits/inits.js';

import { setAnimateMarker } from '../marker/setAnimateMarkerUtils.js';

import { removeAnimateMarker } from '../marker/removeAnimateMarkerUtils.js';

export function hoverBrandItem(e) {

    e.preventDefault();

    const { coordiates } = MAP_SETTINGS;

    const target = e.currentTarget,
        index = parseInt(jQuery(this).data('index'));

    if ( infoWindow ) {

        infoWindow.close();
        //infoWindow.open(map, MAP_SETTINGS.coordiates[index].marker);

    }

    if (idx_marker_selected !== -1 && 
            coordiates[idx_marker_selected].marker) {

        coordiates[idx_marker_selected].marker.setIcon({
            url: STRBASE64 + green_marker
        });

    }

    setAnimateMarker(index);

    coordiates.map((item, i) => {

        //console.log(i);

        if (i !== index) {

            removeAnimateMarker(i);

        }

    });

}