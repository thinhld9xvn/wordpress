import { onKeyDown_checkSalesPriceEvent } from '../handleEvents/onKeyDown_checkSalesPriceEvent.js';

export function setupSalesPriceBox() {

    jQuery('#txtSalesPrice').keydown(onKeyDown_checkSalesPriceEvent);

}