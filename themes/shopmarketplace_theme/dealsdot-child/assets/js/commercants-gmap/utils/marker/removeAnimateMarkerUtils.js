import { MAP_SETTINGS } from '../../constants/constants.js';

export function removeAnimateMarker(i) {

    const { coordiates } = MAP_SETTINGS;

    if (coordiates[i].marker) {

        coordiates[i].marker.setAnimation(null);

    }

}