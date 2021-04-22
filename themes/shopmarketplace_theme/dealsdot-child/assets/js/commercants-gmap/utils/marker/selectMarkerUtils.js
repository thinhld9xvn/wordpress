import { MAP_SETTINGS, STRBASE64 } from '../../constants/constants.js';

import { infoWindow, green_marker, red_marker, setIndexMarkerSelected } from '../../inits/inits.js';

export function selectMarker(index) {

    const { coordiates } = MAP_SETTINGS;

    const marker_name = `<p class="marker-title tcenter">${coordiates[index].enseigne}</p>`,
        marker_secteur = `<p class="marker-secteur tcenter">${coordiates[index].secteur_activity}</p>`,
        marker_addr = `<p class="marker-address tcenter">${coordiates[index].address}</p>`,
        marker_phone = `<p class="marker-phone tcenter">${coordiates[index].telephone_commerce}</p>`,
        html = `<div class="marker-tooltip" data-index="${index}">${marker_name}${marker_secteur}${marker_addr}${marker_phone}</div>`;

    infoWindow.close();
    infoWindow.setContent(html);
    infoWindow.open(map, coordiates[index].marker);

    coordiates[index].marker.setIcon({
        url: STRBASE64 + red_marker
    });

    coordiates.map((e, k) => {

        // reset to default icon marker
        if (k !== index) {

            if (coordiates[k].marker) {

                coordiates[k].marker.setIcon({
                    url: STRBASE64 + green_marker
                });

            }

        }

    });

    setIndexMarkerSelected( index );
}