import { showAjaxAbuseForm } from '../utils/loader/showAjaxAbuseForm.js';

import { hideAjaxAbuseForm } from '../utils/loader/hideAjaxAbuseForm.js';

export function onSubmit_submitPAbuseFormEvent(e) {

    e.preventDefault();
    //e.stopPropagation();

    showAjaxAbuseForm();

    jQuery.ajax({

        method: "POST",
        url: $abuseForm.attr('action'),
        data: {

            action: __ACTIONS_HOOKS_LIST.UNICORN_SHOP_FEEDBACK_ABUSE_PRODUCT_ACTION,
            params: $abuseForm.serialize()

        }

    }).done(function(data) {

        if (data === 'success') {

            hideAjaxAbuseForm();

            $abuseForm[0].reset();

            alert(MESSAGE_NOTIFICATIONS['ajax-default-success-msg']);

        } else {

            alert(MESSAGE_NOTIFICATIONS['ajax-default-error-msg']);

            hideAjaxAbuseForm();

            $abuseForm[0].reset();


        }


    });

}