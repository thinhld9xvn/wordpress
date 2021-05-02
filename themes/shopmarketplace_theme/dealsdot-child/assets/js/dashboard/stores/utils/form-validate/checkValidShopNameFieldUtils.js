import { scrollTopForm } from '../scrollTopFormUtils.js';

export function checkValidShopNameField() {

    if ($chkNotInShopListsName.prop('checked')) {

        if (cust_shop_name === '') {

            alert(MESSAGE_NOTIFICATIONS['enter-my-shop-name-msg']);

            scrollTopForm();

            return false;

        }

    } else {

        if (shop_name === '-1') {

            alert(MESSAGE_NOTIFICATIONS['choose-shop-name-in-the-list-msg']);

            scrollTopForm();

            return false;

        }

    }

    return true;

}