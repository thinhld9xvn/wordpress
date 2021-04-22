import { MAP_SETTINGS } from '../../constants/constants.js';

export function addUserMarker(map, coord) {

    // Add the marker at the clicked location, and add the next-available label
    // from the array of alphabetical characters.

    const { user_geolocation } = MAP_SETTINGS;

    if ( user_geolocation.marker ) {
        user_geolocation.marker.setMap(null);
    }

    user_geolocation.marker = new google.maps.Marker({
        position: new google.maps.LatLng(coord.lat, coord.lng),
    });

    user_geolocation.marker.setMap(map);

    map.setCenter(user_geolocation.marker.getPosition());
   

}   