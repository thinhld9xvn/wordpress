import { rows_selected_uids } from '../../inits/inits.js';

export function setStateOfRemoveRowButton() {

     //console.log(rows_selected_uids);

     if (rows_selected_uids.length) {

        jQuery('#btnRemoveStores').removeClass('none');

    }

    else {

        jQuery('#btnRemoveStores').addClass('none');

    }

}