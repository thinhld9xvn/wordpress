import { onChange_filterBySortOptionEvent } from '../handleEvents/onChange_filterBySortOptionEvent.js';

export function setupProductsFilterBar() {
    
    const $frmProductsListFilter = jQuery('#frmProductsListFilter'),
        $slSortBy = jQuery('#slSortBy');

    if ($frmProductsListFilter.length > 0) {

        if (jQuery('#txtHidSortBy').length === 0) {

            $frmProductsListFilter.append("<input type='hidden' id='txtHidSortBy' name='sort_by' value='default' />");

        }

    }

    $slSortBy.change(onChange_filterBySortOptionEvent);

}