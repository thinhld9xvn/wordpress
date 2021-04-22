export function onChange_filterBySortOptionEvent(e) {

    const $frmProductsListFilter = jQuery('#frmProductsListFilter');

    jQuery('#txtHidSortBy').val(jQuery(this).val());

    const data_trigger = $frmProductsListFilter.data('trigger-submit');

    $frmProductsListFilter.trigger('submit');

}