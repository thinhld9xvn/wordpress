import { initAutoCompleteUI } from '../initAutoCompleteUIUtils.js';

import { initGeoLocation } from '../initGeoLocationUtils.js';

import { initialize } from '../initializeUtils.js';

import { tmrRenderGmap, setTimerRenderGoogleMap } from '../../inits/inits.js';

export function renderGmapWhenViewDetailsStore() {

    setTimerRenderGoogleMap(setInterval(function() {

        if ( window.localLoadAjaxSuccess && 
                window.localLoadAjaxSuccess === 'true' ) {                

            const $modal = jQuery('.modal.show');
            
            window.localModalObjects = {

                gmap_element : $modal.find('#gmap')[0],
                jquery_gmap_nearby_element : $modal.find('#gmap-nearby'),
                jquery_modal_element : $modal,
                jquery_txtGmapNearByAutocomplete_element : $modal.find('#txtGmapNearByAutocomplete'),
                jquery_locationQueryResults_element : $modal.find('#locationQueryResults'),
                jquery_coord_latitude_element : $modal.find('#coord-latitude'),
                jquery_coord_longitude_element : $modal.find('#coord-longitude')

            }

            initAutoCompleteUI();

            initGeoLocation();

            initialize();

            delete window.localLoadAjaxSuccess;

        }     
        
        else if ( window.localLoadNewStore === 'true' ) {    
            
            //console.log(window.localLoadNewStore);

            initAutoCompleteUI();

            initGeoLocation();

            initialize();

            delete window.localLoadNewStore;

        }

    }, 200));

}