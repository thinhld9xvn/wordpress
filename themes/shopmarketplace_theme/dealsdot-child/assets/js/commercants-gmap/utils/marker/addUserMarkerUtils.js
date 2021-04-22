import { USER_GEOLOCATION, STRBASE64 } from '../../constants/constants.js';

import { user_marker } from '../../inits/inits.js';

import { showUserMarkerContent } from '../marker/showUserMarkerContentUtils.js';

import { navigUserMapLocation } from '../userLocation/navigUserMapLocationUtils.js';

export function addUserMarker(map) {

    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.

    USER_GEOLOCATION.marker = new google.maps.Marker({
        position: new google.maps.LatLng(USER_GEOLOCATION.coord.lat, 
                                            USER_GEOLOCATION.coord.lng),
        icon: {
            url: STRBASE64 + user_marker
        }
    });

    USER_GEOLOCATION.marker.setMap(map);

    USER_GEOLOCATION.marker.setAnimation(google.maps.Animation.BOUNCE);

    showUserMarkerContent();

    jQuery('#map').append(`<button id="btnUserMapLocation" class="btnMapLocation">
                        <span class="fa fa-map-marker"></span>
                    </button>`);

    jQuery('#btnUserMapLocation').click(navigUserMapLocation);

}