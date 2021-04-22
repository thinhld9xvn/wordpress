export function hideAjaxLoadingTable() {

    const $tblWrapper = jQuery('.tabbles-content.show .table-wrapper');

    $tblWrapper.removeClass('disabled');

    jQuery(this).parent().find('.spinner').remove();

}