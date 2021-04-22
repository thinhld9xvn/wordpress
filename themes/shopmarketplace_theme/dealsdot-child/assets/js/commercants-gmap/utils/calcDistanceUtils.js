export function calcDistance(location1, location2) {

    const _source_coord = new google.maps.LatLng(location1.lat, location1.lng);

    const _dest_coord = new google.maps.LatLng(location2.lat, location2.lng),
        _distance_km = google.maps.geometry.spherical.computeDistanceBetween(_source_coord, _dest_coord) / 1000;

    return _distance_km;

    //console.log(COORDIATES);

}