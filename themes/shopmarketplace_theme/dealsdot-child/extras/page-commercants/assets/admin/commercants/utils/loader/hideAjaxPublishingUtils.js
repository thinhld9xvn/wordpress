export function hideAjaxPublishing() {

    jQuery('.modal.show .field-input.submit').find('.spinner').remove();

    jQuery('#frmDetailsStore').removeClass('disabled');

}