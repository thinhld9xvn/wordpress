export function checkValidatePassword() {

    const  $txtPass = jQuery('#txtMotDePasse'),
           $txtRePass = jQuery('#txtEntrerLeMotDePasse'), 

           boolValidate = $txtPass.val() === $txtRePass.val();

    if ( ! boolValidate ) {

        alert(MESSAGE_NOTIFICATIONS['inccorect-same-password-error-msg']);

        return false;

    }

    return true;

}