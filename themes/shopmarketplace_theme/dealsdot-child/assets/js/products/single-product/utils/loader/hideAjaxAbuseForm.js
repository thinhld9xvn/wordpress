export function hideAjaxAbuseForm($form) {

    $form.find('.modal-body').removeClass('disabled');
    $form.find('.modal-footer').removeClass('disabled');
    $form.find('.abuse-form-ajax').remove();

}