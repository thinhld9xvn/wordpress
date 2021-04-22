import { performFilterCatBasedQuery } from './performFilterCatBasedQueryUtils.js';

import { getParamFromURL } from '../urls/getParamFromUrlUtils.js';

export function performFilterBasedQuery() {

    let shop_cat = getParamFromURL('shop_cat');

    if (shop_cat) {

        performFilterCatBasedQuery(shop_cat);

    }

}