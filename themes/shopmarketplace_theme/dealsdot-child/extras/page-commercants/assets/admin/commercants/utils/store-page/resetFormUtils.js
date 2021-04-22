import { getFormAction } from './getFormActionUtils.js';

export function resetForm(form) {

    form.reset(); 
    
    if ( getFormAction() !== 'update' ) {

        jQuery('.galleries .item img').attr('src', '');

    }

    jQuery('#slSelectionnezVotreEnseigne').prop('disabled', false);

}