export function getUserPosition(position) {

    const $txtUserLocationLat = jQuery('#txtUserLocationLat'),
          $txtUserLocationLng = jQuery('#txtUserLocationLng');

    $txtUserLocationLat.val(position.coords.latitude);
    $txtUserLocationLng.val(position.coords.longitude);

}