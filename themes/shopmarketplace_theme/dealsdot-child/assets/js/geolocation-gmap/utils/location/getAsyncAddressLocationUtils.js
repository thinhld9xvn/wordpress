export async function getAsyncAddressLocation(s) {

    const url = `https://maps.googleapis.com/maps/api/place/autocomplete/json?input=${s}&key=${gmap_api_key}`;

    return await jQuery.ajax({
        type: 'GET',
        dataType: 'json',
        url
    });

}