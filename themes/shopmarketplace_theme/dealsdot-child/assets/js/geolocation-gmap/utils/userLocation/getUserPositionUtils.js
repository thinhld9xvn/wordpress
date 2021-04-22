import { getGeoCodeAddress } from '../location/getGeoCodeAddressUtils.js';

import { MAP_SETTINGS } from '../../constants/constants.js';

export async function getUserPosition(position) {

    const { user_geolocation } = MAP_SETTINGS;

    const coord = {

        lat : position.coords.latitude, 
        lng : position.coords.longitude

    };

    user_geolocation.coord.location = await getGeoCodeAddress(coord);
    user_geolocation.coord.lat = position.coords.latitude;
    user_geolocation.coord.lng = position.coords.longitude;

}