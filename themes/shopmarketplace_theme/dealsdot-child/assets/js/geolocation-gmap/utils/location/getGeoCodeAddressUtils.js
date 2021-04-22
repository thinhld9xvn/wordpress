import { getAsyncGeoCodeLocation } from '../location/getAsyncGeoCodeLocationUtils.js';

export async function getGeoCodeAddress(coord) {

    const data = await getAsyncGeoCodeLocation(coord);
    const result = data.results[0];       

    return result.formatted_address;

}