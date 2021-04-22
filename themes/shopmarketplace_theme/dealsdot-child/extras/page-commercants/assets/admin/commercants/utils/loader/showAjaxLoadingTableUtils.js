export function showAjaxLoadingTable() {

    const $tblWrapper = jQuery('.tabbles-content.show .table-wrapper');

    $tblWrapper.addClass('disabled');
    jQuery(this).parent().prepend('<span class="spinner show"></span>');

}