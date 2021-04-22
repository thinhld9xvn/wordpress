import { MAP_SETTINGS } from '../../constants/constants.js';

export  function clearAllCurrentMarkers() {

    const { coordiates } = MAP_SETTINGS;

    coordiates.map(item => {

        if (item.marker) {

            item.marker.setMap(null);
            item.marker = null;

        }

    });

}