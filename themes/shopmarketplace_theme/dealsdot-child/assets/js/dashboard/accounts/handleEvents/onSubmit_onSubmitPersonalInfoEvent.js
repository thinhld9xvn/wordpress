import { showAjaxPublishing } from '../utils/loader/showAjaxPublishingUtils.js';

import { hideAjaxPublishing } from '../utils/loader/hideAjaxPublishingUtils.js';

import { validatePassword } from '../utils/validatePasswordUtils.js';

export function onSubmit_onSubmitPersonalInfoEvent(e) {

    e.preventDefault();

    const $form = jQuery('#frmPersonalInfo');

    if ( ! validatePassword() ) {

        alert(MESSAGE_NOTIFICATIONS['enter-required-fields-msg']);

        return false;

    }

    showAjaxPublishing();

    jQuery.ajax({

        method: "POST",
        url: $form.attr('action'),
        data: {

            action: __ACTIONS_HOOKS_LIST.UNICORN_UPDATE_PROFILE_INFORMATION_ACTION,
            params: $form.serialize()

        }

    }).done(function(data) {

        if (data === 'success') {

            alert(MESSAGE_NOTIFICATIONS['ajax-default-success-msg']);

            $form[0].reset();

        } else {

            alert(MESSAGE_NOTIFICATIONS['ajax-default-error-msg']);

        }

        hideAjaxPublishing();

    });

}