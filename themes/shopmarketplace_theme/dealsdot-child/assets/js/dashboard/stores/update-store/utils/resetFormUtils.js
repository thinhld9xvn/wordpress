export function resetForm($form) {

    if ( jQuery('#frmNewStore').length ) {

        $form[0].reset();                        

        jQuery('.galleries .item img').attr('src', '');     
        
    }

}