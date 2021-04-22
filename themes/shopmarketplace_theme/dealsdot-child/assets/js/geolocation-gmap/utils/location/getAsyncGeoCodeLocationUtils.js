export async function getAsyncGeoCodeLocation(coord) {

    const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${coord.lat},${coord.lng}&key=${gmap_api_key}`;

    return await jQuery.ajax({
        type: 'GET',
        dataType: 'json',
        url
    });                

}