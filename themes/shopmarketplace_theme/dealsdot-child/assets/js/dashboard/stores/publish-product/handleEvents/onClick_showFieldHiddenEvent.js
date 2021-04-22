export function onClick_showFieldHiddenEvent(e) {    

    const $target = jQuery(this),
        $parent = $target.closest('label'),
        $metaField = $parent ? $parent.siblings('.input-field') : null,
        $select = jQuery('#' + $target.data('field-id-binding'));

    if ($target.prop('checked')) {

        if ($metaField && $metaField.hasClass('hidden')) {

            $metaField.removeClass('hidden');

        }

        $select.prop("disabled", true);

    } else {

        if ($metaField && !$metaField.hasClass('hidden')) {

            $metaField.addClass('hidden');

        }

        $select.prop("disabled", false);

    }

    $target.val($target.prop('checked') ? '1' : '0');

}