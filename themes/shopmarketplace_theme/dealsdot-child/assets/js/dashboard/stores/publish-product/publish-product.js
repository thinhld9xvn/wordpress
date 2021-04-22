import { onClick_showFieldHiddenEvent } from './handleEvents/onClick_showFieldHiddenEvent.js';

import { onSubmit_submitFormEvent } from './handleEvents/onSubmit_submitFormEvent.js';

import { onTimer_changeLabelInMediaDialog } from './handleEvents/onTimer_changeLabelInMediaDialogUtils.js';

import { onClick_resetFormEvent } from './handleEvents/onClick_resetFormEvent.js';

import { onClick_chooseMediaThumbnailProduct } from './handleEvents/onClick_chooseMediaThumbnailProduct.js'

/*import { getFormAction } from './utils/getFormActionUtils.js';
import { isNewAction, isUpdateAction } from './utils/checkFormActionUtils.js';*/

const $woo = jQuery('.woocommerce-MyAccount-content'),              
        $form = ($woo.length && $woo.find('.frmAdminUpdateProduct')) || [],
        $checkboxes = ($form.length && $form.find('input[type=checkbox]')) || [],
        $select2 = ($form.length && $form.find('.js-select2-dropdown-simple')) || [],
        $select2_shopListName = ($select2.length && $select2.filter('#slShopListsName')) || [],
        $btnResetForm = ($form.length && $form.find('#btnResetPPForm')) || [],
        $galleriesItem = ($form.length && $form.find('.galleries .item')) || [];
        //form_action = getFormAction($form);

$checkboxes.length && 
    $checkboxes.click(onClick_showFieldHiddenEvent);

$select2.length && 
    $select2.select2();

$select2_shopListName.length &&
    $select2_shopListName.prop('disabled', true);

$form.length && 
    $form.submit(onSubmit_submitFormEvent);       

$btnResetForm.length && 
    $btnResetForm.click(onClick_resetFormEvent);

$galleriesItem.length && 
    $galleriesItem.click(onClick_chooseMediaThumbnailProduct);

jQuery(window).load(function() {

    onTimer_changeLabelInMediaDialog();

});