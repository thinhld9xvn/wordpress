import { addUserMarker } from './marker/addUserMarkerUtils.js';
import { addVisibleMarkers } from './marker/addVisibleMarkersUtils.js';
import { performFilterBasedQuery } from './query/performFilterBasedQueryUtils.js';

import { gmap, setGmap, setInfoWindow } from '../inits/inits.js';

import { MAP_SETTINGS, USER_GEOLOCATION } from '../constants/constants.js';

export function init_google_map() {

    const tmrLoaded = setInterval(function() {

        if (window.is_map_loaded) {

            clearInterval(tmrLoaded);

            var centerPosition = new google.maps.LatLng(USER_GEOLOCATION.coord.lat, USER_GEOLOCATION.coord.lng);

            var myStyles = [{

                featureType: "poi",
                elementType: "labels",
                stylers: [
                    { visibility: "off" }
                ]

            }];

            var options = {
                zoom: MAP_SETTINGS.zoom,
                center: centerPosition,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    mapTypeIds: [
                        google.maps.MapTypeId.ROADMAP,
                        google.maps.MapTypeId.SATELLITE
                    ]
                },
                styles: myStyles
            };

            setGmap( new google.maps.Map(document.getElementById('map'), options) );
            setInfoWindow( new google.maps.InfoWindow() );

            addUserMarker(gmap);

            addVisibleMarkers(gmap);

            window.is_map_loaded = false;

            performFilterBasedQuery();

        }

    }, 100);


}   