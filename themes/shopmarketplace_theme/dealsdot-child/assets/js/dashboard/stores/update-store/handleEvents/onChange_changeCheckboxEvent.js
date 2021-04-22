export function onChange_changeCheckboxEvent(e) {

    e.preventDefault();

    const $this = jQuery(this), 
        id = $this.data('woo-box-binding'), 
        $woo = jQuery('#' + id),
        field_html = $woo.data('field-html');

    if ( $this.prop('checked') ) {

        $woo.length && $woo.show('fast');

        $woo.find('.field-input')
            .html(field_html);

    }

    else {

        $woo.length && $woo.hide('fast');

        $woo.find('.field-input')
            .html('');

    }

}