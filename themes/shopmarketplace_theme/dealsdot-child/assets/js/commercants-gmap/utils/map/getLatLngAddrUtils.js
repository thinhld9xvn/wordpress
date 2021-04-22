import { MAP_SETTINGS } from '../../constants/constants.js';

export function getLatLngAddr(i) {

    const { coordiates } = MAP_SETTINGS;

    return {
        lat: coordiates[i].coord.lat,
        lng: coordiates[i].coord.lng
    };

}