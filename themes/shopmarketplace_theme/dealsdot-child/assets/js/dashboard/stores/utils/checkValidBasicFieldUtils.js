export function checkValidBasicField(data) {

    const { product_name, product_des } = data;

    if (product_name === '' || product_des === '') {

        alert(MESSAGE_NOTIFICATIONS['enter-required-fields-msg']);

        scrollTopForm();

        return false;

    }

    return true;

}