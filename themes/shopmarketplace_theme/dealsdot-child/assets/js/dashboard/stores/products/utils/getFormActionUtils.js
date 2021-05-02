export function getFormAction($form) {

    const $obj = $form.find('input[type=hidden][name=action]');

    return $obj.length && $obj.val() || '';

}