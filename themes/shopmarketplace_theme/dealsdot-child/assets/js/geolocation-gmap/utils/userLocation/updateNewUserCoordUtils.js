import { MAP_SETTINGS } from '../../constants/constants.js';

export async function updateNewUserCoord(coord) {
    
    const { user_geolocation } = MAP_SETTINGS;

    user_geolocation.coord.lat = coord.lat;
    user_geolocation.coord.lng = coord.lng;

    var $txtGmapNearByAutocomplete = jQuery('#txtGmapNearByAutocomplete'),
        $coord_latitude = jQuery('#coord-latitude'),
        $coord_longitude = jQuery('#coord-longitude');

    if ( window.localModalObjects && window.localModalObjects.jquery_txtGmapNearByAutocomplete_element ) {

        $txtGmapNearByAutocomplete = window.localModalObjects.jquery_txtGmapNearByAutocomplete_element;

    }

    if ( window.localModalObjects && window.localModalObjects.jquery_coord_latitude_element && window.localModalObjects.jquery_coord_longitude_element ) {

        $coord_latitude = window.localModalObjects.jquery_coord_latitude_element;
        $coord_longitude = window.localModalObjects.jquery_coord_longitude_element;

    }

    $txtGmapNearByAutocomplete.val(coord.location);

    $coord_latitude.val(coord.lat);
    $coord_longitude.val(coord.lng);

}