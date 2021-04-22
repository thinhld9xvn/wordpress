import { initializeModal } from '../utils/store-details/initializeModalUtils.js';

import { showLoading } from '../utils/store-details/loader/showLoadingUtils.js';

import { hideLoading } from '../utils/store-details/loader/hideLoadingUtils.js';

import { checkUserEmailExists } from '../utils/checkUserEmailExistsUtils.js';

import { getEmailById } from '../utils/getEmailByIdUtils.js';

import { getDetailsFromStore } from '../utils/getDetailsFromStoreUtils.js';

import { setDataDetailsFormStore } from '../utils/store-details/inits/inits.js';

export async function onClick_showStoreDetailsEvent(e) {

    e.preventDefault();    

    showLoading();
    
    const $row = jQuery(this).closest('tr'), 
            id_idx = parseInt( DT_COMMERCANTS_COLUMNS.ID_IDX ) + 1,             
            id = parseInt( $row.find('td:nth-child(' + id_idx + ')').text().trim() ),
            email = getEmailById(id);

    const result = await checkUserEmailExists(email);

    if ( result === 'true' ) {

        setDataDetailsFormStore( await getDetailsFromStore(email) );            

        jQuery('#detailsStoreModal').modal({

            show: true

        }); 

        setTimeout(function() {
        
            initializeModal();

            hideLoading();

        }, 1000);           

    }

    else {

        hideLoading();

        alert('Sorry, no data in the system !!!');

    }        


}