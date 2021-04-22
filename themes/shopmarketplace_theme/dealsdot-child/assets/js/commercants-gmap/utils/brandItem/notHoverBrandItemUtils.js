import { MAP_SETTINGS } from '../../constants/constants.js';

import { removeAnimateMarker } from '../marker/removeAnimateMarkerUtils.js';

export function notHoverBrandItem(e) {

    const { coordiates } = MAP_SETTINGS;

    coordiates.map((item, i) => {

        removeAnimateMarker(i);

    });

}
