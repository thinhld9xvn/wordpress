import { updateCoordiatesStatusHtml } from '../utils/updateCoordiatesStatusHtmlUtils.js';

import { getCoordAddr } from '../utils/getCoordAddrUtils.js';

import { sleep } from '../utils/sleepUtils.js';

export async function performGetCoordiates(addrLists, i, length) {

    let coordiates_data = '';

    updateCoordiatesStatusHtml(i, length);

    const geometa = await getCoordAddr(addrLists[i]);

    //console.log(addrLists[i]);
    //console.log(i);

    const geometry = geometa.results[0].geometry;

    coordiates_data += 'lat: ' + geometry.location.lat + '\r\nlong: ' + geometry.location.lng + '\r\n';
    coordiates_data += '--- ;;; ---\r\n';

    return coordiates_data;


}