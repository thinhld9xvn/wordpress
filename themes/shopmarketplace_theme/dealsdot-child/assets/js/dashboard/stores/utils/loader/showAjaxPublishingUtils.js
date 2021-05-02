export function showAjaxPublishing() {

    const $woo = jQuery('.woocommerce-MyAccount-content'),
    $woo_main = $woo.find('.woo-main-contents');

    $woo_main.addClass('disabled');

    $woo.append(
        `
        <div class="perform-ajax">
            <span class="fa fa-circle-o-notch fa-spin"></span>
            <span class="caption">${MESSAGE_NOTIFICATIONS['publishing-product-msg']}</span>
        </div>
    `
    );

}