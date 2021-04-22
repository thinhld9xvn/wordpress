import { openStoreDetailsPage } from '../utils/urls/openStoreDetailsPageUtils.js';

import { MAP_SETTINGS } from '../constants/constants.js';

export function onClick_chooseMarkerToopTip(e) {

    e.preventDefault();

    const { coordiates } = MAP_SETTINGS;

    const id = parseInt(jQuery(this).data('index')) + 1;

    openStoreDetailsPage(id);

}