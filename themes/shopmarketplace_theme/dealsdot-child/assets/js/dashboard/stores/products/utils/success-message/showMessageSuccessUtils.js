import { hideMessageSuccess } from './hideMessageSuccessUtils.js';

export function showMessageSucces() {

    const $woo = jQuery('.woocommerce-MyAccount-content'),
        $woo_main = $woo.find('.woo-main-contents');

    $woo_main.append(`

        <div class="confirmation-box __success">
            ${MESSAGE_NOTIFICATIONS["thanks-for-publish-product-msg"]}
        </div>

    `);

    setTimeout(function() {

        hideMessageSuccess();

    }, 1000 * 10);

}