export function scrollTopForm() {

    const $woo = jQuery('.woocommerce-MyAccount-content');

    jQuery('html, body').animate({

        scrollTop: $woo.offset().top
        
    }, 200);

}