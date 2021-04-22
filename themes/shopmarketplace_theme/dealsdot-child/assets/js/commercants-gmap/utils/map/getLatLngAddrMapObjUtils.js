import { getLatLngAddr } from './getLatLngAddrUtils.js';

export function getLatLngAddrMapObj(i) {

    const o = getLatLngAddr(i);

    return new google.maps.LatLng(o.lat, o.lng);

}