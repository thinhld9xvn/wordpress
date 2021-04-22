import { GMAP_API_KEY } from '../constants/constants.js';

export  async function getCoordAddr(addr) {

    let url = 'https://maps.googleapis.com/maps/api/geocode/json?address={$1}&key={$2}';

    url = url.replace('{$1}', addr)
        .replace('{$2}', GMAP_API_KEY);

    url = encodeURI(url).replace(/%20/g, "+");

    return await jQuery.ajax({
        method: 'GET',
        dataType: 'json',
        url
    });

}