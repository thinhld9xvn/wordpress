export function checkValidatePassword() {

    const $txtPass = jQuery('#user_new_password'),
            $txtRePass = jQuery('#user_confirm_password');

    const boolValidate = $txtPass.val() === $txtRePass.val();

    if ( ! boolValidate ) {

        alert(MESSAGE_NOTIFICATIONS["inccorect-same-password-error-msg"]);

        return false;

    }

    return true;

}