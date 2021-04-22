import { service, map, setService, locationsData, setLocationsData } from '../../inits/inits.js';

var currentIdx, address_name, placeId;

function placeDetailsRequestCallback(result, status) {

    const lat = result.geometry.location.lat(),
          lng = result.geometry.location.lng();    
          
   //console.log(address_name);

   locationsData.push({
        id : currentIdx,
        name : address_name,
        lat,
        lng
   });

}

export async function autocompleteServiceCallback(results, status) {               

    results.forEach(async function(item, i) {

        currentIdx = i;
        address_name = item.description;
        placeId = item.place_id;

        setService( new google.maps.places.PlacesService(map) );                   

        const { result, status } = await new Promise(resolve =>
            service.getDetails(
                {
                    placeId
                }, 
                (result, status) => resolve({ result, status })
            )
        );    

        result && placeDetailsRequestCallback(result, status);

    });     

}