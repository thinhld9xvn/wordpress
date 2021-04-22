export function onChange_changeCheckBoxesStateEvent(e) {

    e.preventDefault();

        const $this = jQuery(this), 
            id = $this.data('woo-box-binding'), 
            select2_id = $this.data('woo-select2-binding'),
            $woo = jQuery('#' + id),
            $sl_select2 = jQuery('#' + select2_id),
            field_html = $woo.data('field-html');

        if ( $this.prop('checked') ) {

            $woo.length && $woo.show('fast');

            $woo.find('.field-input')
                .html(field_html);

            $sl_select2.prop('disabled', true);

        }

        else {

            $woo.length && $woo.hide('fast');

            $woo.find('.field-input')
                .html('');

            $sl_select2.prop('disabled', false);

        }

}