export function showMessageSucces() {

    $woo_main.append(`

        <div class="confirmation-box __success">
            ${MESSAGE_NOTIFICATIONS["thanks-for-publish-product-msg"]}
        </div>

    `);

    setTimeout(function() {

        hideMessageSuccess();

    }, 1000 * 10);

}