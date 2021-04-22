import { getGeoCodeAddress } from '../utils/location/getGeoCodeAddressUtils.js';

import { updateNewUserCoord } from '../utils/userLocation/updateNewUserCoordUtils.js';

import { addUserMarker } from '../utils/marker/addUserMarkerUtils.js';

import { getNearByLocation } from '../utils/location/getNearByLocationUtils.js';

import { MAP_SETTINGS } from '../constants/constants.js';

import { map } from '../inits/inits.js';

import { nearByResultsCallback } from '../utils/location/nearByResultsCallbackUtils.js';

export async function onClick_clickOnMapEvent(e) {

    const { myPosRadius } = MAP_SETTINGS;

    const coord = {

        location : '',
        lat : e.latLng.lat(), 
        lng : e.latLng.lng()

    } 
    
    const formatted_address = await getGeoCodeAddress(coord);  
    
    coord.location = formatted_address;    
    
    updateNewUserCoord(coord);
 
    addUserMarker(map, coord); 
    
    getNearByLocation(null, new google.maps.LatLng(coord.lat, coord.lng), 
                        myPosRadius, nearByResultsCallback);



}