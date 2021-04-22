import { MAP_SETTINGS } from "../../constants/constants.js";

import { openStoreDetailsPage } from "../urls/openStoreDetailsPageUtils.js";

export function selectBrandNameItem(e) {

    e.preventDefault();

    const { coordiates } = MAP_SETTINGS;

    const id = parseInt(jQuery(this).parent().data('index')) + 1;    

    openStoreDetailsPage(id);

}