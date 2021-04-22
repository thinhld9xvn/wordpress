import { MAP_SETTINGS } from '../constants/constants.js'; 

import { initializeGoogleMap } from '../utils/map/initializeGoogleMapUtils.js';

export function initialize() { 

    const { user_geolocation } = MAP_SETTINGS;

    const t = setInterval(function() {

        if ( user_geolocation.coord.lat !== -1 &&  
                user_geolocation.coord.lng !== -1 ) {

            initializeGoogleMap();

            clearInterval(t);

        }

    }, 200);       
    

}