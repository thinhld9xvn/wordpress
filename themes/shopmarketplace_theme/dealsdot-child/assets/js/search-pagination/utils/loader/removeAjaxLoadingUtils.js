export function removeAjaxLoading() {

    jQuery('#results').find('.perform-ajax').remove();

    jQuery('#results').removeClass('disabled');

}