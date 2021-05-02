export function hideMessageSuccess() {

    const $woo = jQuery('.woocommerce-MyAccount-content'),
        $woo_main = $woo.find('.woo-main-contents');

    $woo_main.find('.confirmation-box').remove();
    
}