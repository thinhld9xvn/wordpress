import { MAP_SETTINGS } from '../constants/constants.js';
import { setUserLocationCoords } from '../utils/userLocation/setUserLocationCoordsUtils.js';

export function initGeoLocation() {

    //console.log(store_geolocation);

    const { user_geolocation } = MAP_SETTINGS;

    if ( window.localLoadNewStore === 'true' ) {

        store_geolocation = null;

    }

    if ( store_geolocation ) {

        user_geolocation.coord.location = store_geolocation.location;
        user_geolocation.coord.lat = store_geolocation.lat;
        user_geolocation.coord.lng = store_geolocation.lng;

    }

    else {

        setUserLocationCoords(); 

    }

}