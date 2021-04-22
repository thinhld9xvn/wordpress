import { USER_GEOLOCATION } from '../../constants/constants.js';

export function getUserPosition(position) {

    USER_GEOLOCATION.coord.lat = position.coords.latitude;
    USER_GEOLOCATION.coord.lng = position.coords.longitude;

}