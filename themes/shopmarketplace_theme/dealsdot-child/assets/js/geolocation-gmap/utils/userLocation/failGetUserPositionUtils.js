import { getGeoCodeAddress } from '../location/getGeoCodeAddressUtils.js';

import { MAP_SETTINGS } from '../../constants/constants.js';

export async function failGetUserPosition() {

    const { user_geolocation } = MAP_SETTINGS;

    const coord = {

        lat : 43.5785489, 
        lng : 7.1175527

    };

    user_geolocation.coord.location = await getGeoCodeAddress(coord);
    user_geolocation.coord.lat = coord.lat;
    user_geolocation.coord.lng = coord.lng;

}