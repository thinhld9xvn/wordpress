import { getUserPosition } from './getUserPositionUtils.js';

import { failGetUserPosition } from './failGetUserPositionUtils.js';

export function setUserLocationCoords() {

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(getUserPosition, failGetUserPosition);

    }

}