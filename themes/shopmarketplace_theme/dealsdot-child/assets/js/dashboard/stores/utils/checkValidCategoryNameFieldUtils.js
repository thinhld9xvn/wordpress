export function checkValidCategoryNameField() {

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