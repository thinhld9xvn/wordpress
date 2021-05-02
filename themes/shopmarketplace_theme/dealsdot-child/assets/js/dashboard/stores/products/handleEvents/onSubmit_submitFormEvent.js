import { checkValidBasicField } from '../utils/form-validate/checkValidBasicFieldUtils.js';

import { checkValidProductGalleries } from '../utils/form-validate/checkValidProductGalleriesUtils.js';

import { showAjaxPublishing } from '../utils/loader/showAjaxPublishingUtils.js';
import { hideAjaxPublishing } from '../utils/loader/hideAjaxPublishingUtils.js';

import { showMessageSucces } from '../utils/success-message/showMessageSuccessUtils.js';
//import { hideMessageSuccess } from '../utils/success-message/hideMessageSuccessUtils.js';

import { checkValidCategoryName } from '../utils/form-validate/checkValidCategoryNameUtils.js';

import { resetForm } from '../utils/resetFormUtils.js';

import { getFormAction } from '../utils/getFormActionUtils.js';

export function onSubmit_submitFormEvent(e) {

    e.preventDefault();

    const $form = jQuery(this), 
        product_name = jQuery('#txtProductName').val().trim(),
        product_des = tinymce.get('product_description').getContent().trim(),

        /*cust_shop_name = jQuery('#txtCustomShopName').val().trim(),*/
        //shop_name = jQuery('#txtHidShopName').val().trim(),

        cust_cat_name = jQuery('#txtCustomCategoryName').val().trim(),
        cat_name = jQuery('#txtHidProductCat').val().trim(),

        //$chkNotInShopListsName = jQuery('#chkNotInShopListsName'),
        $chkNotInShopCategories = jQuery('#chkNotInShopCategories'),
        //$chkFromPrice = jQuery('#chkFromPrice'),

        $txtProductGalleries = jQuery('.txtHidProductGalleries'),
        form_action = getFormAction($form);

    let boolValidate = true;

    //
    boolValidate = checkValidBasicField({

        product_name,
        product_des

    });

    if (!boolValidate) return;    

    //
    boolValidate = checkValidCategoryName({

        cust_cat_name,
        cat_name,
        $chkNotInShopCategories

    });

    if (!boolValidate) return;

    //
    boolValidate = checkValidProductGalleries($txtProductGalleries);

    if (!boolValidate) return;

    //
    jQuery('#txtHidProductDes').val(product_des);

    showAjaxPublishing();

    const data = jQuery(this).serialize();

    jQuery.ajax({

        method: "POST",
        url: ajaxurl,
        data: {
            action: __ACTIONS_HOOKS_LIST.UNICORN_UPDATE_PRODUCT_ACTION,
            params: data
        }

    }).done(function(data) {

        if (data === 'success') {

            showMessageSucces();

            if ( form_action === 'new' ) {

                resetForm();

            }

        } else {

            alert(MESSAGE_NOTIFICATIONS['ajax-default-error-msg']);

        }


        hideAjaxPublishing();

    });

}