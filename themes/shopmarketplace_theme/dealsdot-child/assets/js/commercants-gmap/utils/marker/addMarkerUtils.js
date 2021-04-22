import { MAP_SETTINGS, STRBASE64 } from '../../constants/constants.js';

import { green_marker,        
         red_marker,
         idx_marker_selected } from '../../inits/inits.js';
         
import { selectMarker } from '../marker/selectMarkerUtils.js';

import { openStoreDetailsPage } from '../urls/openStoreDetailsPageUtils.js';
    
export function addMarker(i, location, map) {

    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.

    const { coordiates } = MAP_SETTINGS;

    coordiates[i].marker = new google.maps.Marker({

        position: location,
        icon: {
            url: "data:image/png;base64," + green_marker
        }

    });

    coordiates[i].marker.setMap(map);

    coordiates[i].marker.addListener("click", () => {

        selectMarker(i);
        openStoreDetailsPage(i + 1);

    });

    coordiates[i].marker.addListener("mouseover", () => {

        coordiates[i].marker.setIcon({
            url: STRBASE64 + red_marker
        });

        selectMarker(i);

    });

    coordiates[i].marker.addListener("mouseout", () => {

        if (i !== idx_marker_selected) {

            coordiates[i].marker.setIcon({
                url: STRBASE64 + green_marker
            });

        }

    });

}