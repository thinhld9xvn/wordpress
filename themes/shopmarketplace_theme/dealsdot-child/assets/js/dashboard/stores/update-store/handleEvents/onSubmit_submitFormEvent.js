import { showAjaxPublishing } from '../utils/loader/showAjaxPublishingUtils.js';

import { hideAjaxPublishing } from '../utils/loader/hideAjaxPublishingUtils.js';

import { resetForm } from '../utils/resetFormUtils.js';

export function onSubmit_submitFormEvent(e) {

    e.preventDefault();              
    
    const $form = jQuery(this);

    tinyMCE.get('txtDescription').save();

    showAjaxPublishing();

    jQuery.ajax({

        type : "POST",
        async: true,
        url : ajaxurl,
        data : {
            action : __ACTIONS_HOOKS_LIST.UNICORN_ADMIN_UPDATE_STORE_ACTION,
            params: $form.serialize()                                
        }

    }).done(function(data) {

        if ( data === 'success' ) {

            alert(MESSAGE_NOTIFICATIONS['ajax-default-success-msg']);

            resetForm($form);

        }

        else {

            alert(MESSAGE_NOTIFICATIONS['ajax-default-error-msg']);

        }

        hideAjaxPublishing();

    });                    

}