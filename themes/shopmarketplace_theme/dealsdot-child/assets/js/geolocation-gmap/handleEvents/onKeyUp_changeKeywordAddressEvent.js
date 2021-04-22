import { service, setService, locationsData, setLocationsData } from '../inits/inits.js';

import { autocompleteServiceCallback } from '../utils/autocomplete/autocompleteServiceCallbackUtils.js';

import { setLocationAutoComplete } from '../utils/autocomplete/setLocationAutoCompleteUtils.js';

import { showLocationAutoCompleteResults } from '../utils/autocomplete/showLocationAutoCompleteResultsUtils.js';

import { map } from '../inits/inits.js';

export async function onKeyUp_changeKeywordAddressEvent(e) {

    const s = jQuery(this).val().toString().trim();

    const request = {

        input: s

    };
    
    setLocationsData([]);  

    if ( s ) {

        setService( new google.maps.places.AutocompleteService(map) );

        const { results, status } = await new Promise(resolve => 

            service.getPlacePredictions(
                request, 
                (results, status) => resolve({ results, status })
            )

        );            

        results && autocompleteServiceCallback(results, status); 
        
        setTimeout(function() {

            setLocationAutoComplete(locationsData);

            showLocationAutoCompleteResults();

            
        }, 1000);

    }

    //showLocationAutoCompleteResults();

}