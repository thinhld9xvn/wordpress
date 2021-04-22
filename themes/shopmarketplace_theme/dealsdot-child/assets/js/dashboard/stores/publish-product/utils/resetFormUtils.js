import { scrollTopForm } from './scrollTopFormUtils.js';

export function resetForm(e) {

    if (e) e.preventDefault();

    if ( jQuery('#frmPublishProduct').length ) {

        jQuery('#txtProductName').val('');
        tinymce.get('product_description').setContent('');

        $form.find('input[type=hidden]').each(function(i, elem) {

            const $elem = jQuery(elem);                   

            if ($elem.attr('id') === 'txtHidShopName' ||
                $elem.attr('id') === 'txtHidProductCat') {
            }

            else {

                $elem.val('');

            }

            jQuery('.galleries > .item img').attr('src', '');

        });

    }

    scrollTopForm();

}