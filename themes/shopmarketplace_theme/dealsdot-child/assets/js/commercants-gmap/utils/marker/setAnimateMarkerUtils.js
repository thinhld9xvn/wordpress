import { MAP_SETTINGS } from '../../constants/constants.js';

import { gmap } from '../../inits/inits.js';

export  function setAnimateMarker(i) {

    const { coordiates } = MAP_SETTINGS;

    if ( coordiates[i].marker ) {

        coordiates[i].marker.setMap(gmap);

        coordiates[i].marker.setAnimation(google.maps.Animation.BOUNCE);

    }

    gmap.setCenter(coordiates[i].marker.getPosition());

}