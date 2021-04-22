import { setLocationAutoComplete } from '../autocomplete/setLocationAutoCompleteUtils.js';

import { locationsData } from '../../inits/inits.js';

export function nearByResultsCallback(results, status) {             

    results.forEach(function(item, i) {

        if ( i === 0 ) return false;

        const name = item.vicinity,
              lat = item.geometry.location.lat(),
              lng = item.geometry.location.lng();

       locationsData.push({
            id : i + 1,
            name,
            lat,
            lng
       });

    });        

    const arrIds = [];

    //console.log(locationsData);

    locationsData.forEach(function(location, i) {

        //if ( i === 0 ) return false;

        const results = locationsData.filter((e, k) => arrIds.indexOf(e.id) === -1 && e.lat === location.lat && e.lng === location.lng && k !== i );

        //console.log(results);

        if ( results.length ) {

            arrIds.push(location.id);

        }        

    });

    arrIds.forEach(function(id, i) {

        const index = locationsData.findIndex(item => item.id === id);

        if ( index !== -1 ) {

            locationsData.splice(index, 1);

        }


    });

    setLocationAutoComplete(locationsData);
    
}