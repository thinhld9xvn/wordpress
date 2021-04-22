export function validatePassword() {

    const currentPass = jQuery('#txtAccountCurrentPass').val(),
            newPass = jQuery('#txtAccountNewPass').val(),
            confirmPass = jQuery('#txtAccountConfirmPass').val();

    return newPass === confirmPass;

}