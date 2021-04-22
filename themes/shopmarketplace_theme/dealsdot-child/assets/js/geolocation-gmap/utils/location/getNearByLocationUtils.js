import { service, map, setService } from '../../inits/inits.js';

export function getNearByLocation(s, position, radius, callback) {   

    var request = { 
        radius
      };

    if ( s ) {

        request.name = s;

    }

    if ( position ) {

        request.location = position;

    }

    setService(new google.maps.places.PlacesService(map));
    
    service.nearbySearch(request, callback);

}