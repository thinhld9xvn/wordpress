import { map } from '../inits/inits.js';

import { MAP_SETTINGS } from '../constants/constants.js';

export function onClick_setUserLocationCenteredEvent(e) {

    e.preventDefault();

    const { user_geolocation } = MAP_SETTINGS;

    map.setCenter(user_geolocation.marker.getPosition());

}