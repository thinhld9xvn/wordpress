import { scrollTopForm } from '../scrollTopFormUtils.js';

export function checkValidCategoryName(data) {

    const { cust_cat_name, cat_name, $chkNotInShopCategories } = data;

    if ($chkNotInShopCategories.prop('checked')) {

        if (cust_cat_name === '') {

            alert(MESSAGE_NOTIFICATIONS['enter-my-category-name-msg']);

            scrollTopForm();

            return false;

        }

    } else {

        if (cat_name === '-1') {

            alert(MESSAGE_NOTIFICATIONS['choose-a-product-category-msg']);

            scrollTopForm();

            return false;

        }

    }

    return true;

}