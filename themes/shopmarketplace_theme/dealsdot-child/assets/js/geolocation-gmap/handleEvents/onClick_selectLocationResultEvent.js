import { updateNewUserCoord } from '../utils/userLocation/updateNewUserCoordUtils.js';

import { addUserMarker } from '../utils/marker/addUserMarkerUtils.js';

import { getNearByLocation } from '../utils/location/getNearByLocationUtils.js';

import { map } from '../inits/inits.js';

import { MAP_SETTINGS } from '../constants/constants.js';

import { hideLocationAutoCompleteResults } from '../utils/autocomplete/hideLocationAutoCompleteResultsUtils.js';

import { nearByResultsCallback } from '../utils/location/nearByResultsCallbackUtils.js';

export function onClick_selectLocationResultEvent(e) {

    e.preventDefault();

    const { myPosRadius } = MAP_SETTINGS;

    const $this = jQuery(this),
        coord = {
            location : $this.text().trim(),
            lat : parseFloat($this.data('lat')),
            lng : parseFloat($this.data('lng'))
        }; 
            
    updateNewUserCoord(coord);       
        
    addUserMarker(map, coord); 

    getNearByLocation(null, 
                        new google.maps.LatLng(coord.lat, coord.lng), 
                        myPosRadius, 
                        nearByResultsCallback); 
    
    hideLocationAutoCompleteResults();

}