import { family_icon, infoWindow, gmap } from '../../inits/inits.js';

import { USER_GEOLOCATION, STRBASE64 } from '../../constants/constants.js';

export function showUserMarkerContent() {

    infoWindow.close();
    infoWindow.setContent("<span class='user-marker'><img src='" + STRBASE64 + family_icon + "' width='30px' alt='family'></span>");
    infoWindow.open(gmap, USER_GEOLOCATION.marker);
    gmap.setCenter(USER_GEOLOCATION.marker.getPosition());

}