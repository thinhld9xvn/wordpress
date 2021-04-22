import { locationsData, map,
            setLocationsData, 
            setMap, 
            setInfoWindow } from '../../inits/inits.js';

import { MAP_SETTINGS } from '../../constants/constants.js';

import { onClick_clickOnMapEvent } from '../../handleEvents/onClick_clickOnMapEvent.js';

import { updateNewUserCoord } from '../../utils/userLocation/updateNewUserCoordUtils.js';
import { addUserMarker } from '../marker/addUserMarkerUtils.js';

import { getNearByLocation } from '../location/getNearByLocationUtils.js';

import { onKeyUp_changeKeywordAddressEvent } from '../../handleEvents/onKeyUp_changeKeywordAddressEvent.js';

import { onClick_setUserLocationCenteredEvent } from '../../handleEvents/onClick_setUserLocationCenteredEvent.js';

import { nearByResultsCallback } from '../location/nearByResultsCallbackUtils.js';
 
export async function initializeGoogleMap() {  

    setLocationsData([]);
    
    const { user_geolocation, mzoom, myPosRadius } = MAP_SETTINGS;

    var centerPosition = new google.maps.LatLng(user_geolocation.coord.lat, 
                                                    user_geolocation.coord.lng);

    var myStyles = [{
        featureType: "poi",
        elementType: "labels",
        stylers: [
            { visibility: "off" }
        ]
    }];

    var options = {
        zoom: mzoom,
        center: centerPosition,
        mapTypeControl: true,
        mapTypeControlOptions: {
            mapTypeIds: []
        }                
    };

    var gmap_element = window.localModalObjects && 
                            window.localModalObjects.gmap_element ? window.localModalObjects.gmap_element : 
                                                                    document.getElementById('gmap');
    
    setMap( new google.maps.Map(gmap_element, options) );
    
    setInfoWindow( new google.maps.InfoWindow() );

    map.addListener('click', onClick_clickOnMapEvent);

    updateNewUserCoord(user_geolocation.coord);  
            
    addUserMarker(map, user_geolocation.coord);     

    getNearByLocation(null, 
                        centerPosition, 
                        myPosRadius, 
                        nearByResultsCallback);               

    var $txtGmapNearByAutocomplete = window.localModalObjects && 
                                            window.localModalObjects.jquery_txtGmapNearByAutocomplete_element ? 
                                                    window.localModalObjects.jquery_txtGmapNearByAutocomplete_element : 
                                                        jQuery('#txtGmapNearByAutocomplete');
        
    $txtGmapNearByAutocomplete.unbind('keyup')
                              .bind('keyup', onKeyUp_changeKeywordAddressEvent);

    jQuery('.gts-location').unbind('click')
                      .bind('click', onClick_setUserLocationCenteredEvent);

}