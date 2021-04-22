import { USER_GEOLOCATION } from '../../constants/constants.js';

export function failGetUserPosition() {

    USER_GEOLOCATION.coord.lat = 43.5785489;
    USER_GEOLOCATION.coord.lng = 7.1175527;

}
