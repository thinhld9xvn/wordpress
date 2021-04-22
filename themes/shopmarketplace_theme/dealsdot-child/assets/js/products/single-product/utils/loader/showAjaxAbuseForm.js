export function showAjaxAbuseForm($form) {

    $form.find('.modal-body').addClass('disabled');
    $form.find('.modal-footer').addClass('disabled');

    $form.find('.modal-content')
        .append(`

    <div class="perform-ajax abuse-form-ajax">
    <span class="fa fa-circle-o-notch fa-spin"></span>
    <span class="caption">Sending feedback, please wait ...</span>
    </div>

`);

}