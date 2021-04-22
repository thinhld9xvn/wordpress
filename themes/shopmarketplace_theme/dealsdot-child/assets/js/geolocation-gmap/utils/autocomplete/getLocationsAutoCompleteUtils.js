import { getAsyncAddressLocation } from '../location/getAsyncAddressLocationUtils.js';

export async function getLocationsAutoComplete(s) {

    const data = await getAsyncAddressLocation(s);

    return data.results;
    
}