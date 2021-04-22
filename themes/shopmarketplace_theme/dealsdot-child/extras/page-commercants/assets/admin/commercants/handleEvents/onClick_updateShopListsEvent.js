import { performUpdateMerchantData } from '../utils/datatable/performUpdateMerchantDataUtils.js';

export function onClick_updateShopListsEvent(e) {

    e.preventDefault();

    performUpdateMerchantData.call(this);

}