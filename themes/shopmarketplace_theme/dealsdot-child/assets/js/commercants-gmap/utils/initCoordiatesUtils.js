import { setUserLocationCoords } from './userLocation/setUserLocationCoordsUtils.js';

import { USER_GEOLOCATION, MAP_SETTINGS } from '../constants/constants.js';

import { calcDistance } from './calcDistanceUtils.js';

import { createBrandsList } from './brandLists/createBrandsListUtils.js';

import { distance_value } from '../inits/inits.js';

export function init_coordiates() {

    const { coordiates } = MAP_SETTINGS;

    window.is_map_loaded = false;

    setUserLocationCoords();

    let t = setInterval(function() {

        if (USER_GEOLOCATION.coord.lat !== -1 && 
                USER_GEOLOCATION.coord.lng !== -1) {

            clearInterval(t);

            const user_location = {

                lat: USER_GEOLOCATION.coord.lat,
                lng: USER_GEOLOCATION.coord.lng,

            };

            _brands_lists_info.forEach((elem, i) => {

                // init obj
                coordiates.push({

                    address: elem.address,
                    enseigne: elem.enseigne,
                    telephone_commerce: elem.telephone_commerce,
                    secteur_activity: elem.secteur_activity,
                    coord: {
                        lat: _coords_lists_info[i].lat,
                        lng: _coords_lists_info[i].lng,
                        distance: calcDistance(user_location, _coords_lists_info[i])
                    },
                    marker: null

                });

            });

            createBrandsList(distance_value);

        }

    }, 200);


    //console.log(COORDIATES);

}    