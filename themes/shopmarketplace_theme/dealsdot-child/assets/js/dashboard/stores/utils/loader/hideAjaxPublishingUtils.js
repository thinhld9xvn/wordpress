export function hideAjaxPublishing() {

    const $woo = jQuery('.woocommerce-MyAccount-content'),
            $woo_main = $woo.find('.woo-main-contents');

    $woo_main.removeClass('disabled');

    $woo.find('> .perform-ajax').remove();

}