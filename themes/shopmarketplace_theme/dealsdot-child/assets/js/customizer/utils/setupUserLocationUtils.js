import { getUserPosition } from './user-location/getUserPositionUtils.js';

export function setupUserLocation() {

    const $txtUserLocationLat = jQuery('#txtUserLocationLat'),
          $txtUserLocationLng = jQuery('#txtUserLocationLng');
    
    if ($txtUserLocationLat.length > 0 && $txtUserLocationLng.length > 0) {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getUserPosition);
        }
    }

}