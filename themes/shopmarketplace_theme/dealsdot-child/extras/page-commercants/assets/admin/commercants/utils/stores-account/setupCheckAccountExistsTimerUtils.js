import { getCommercantsDtField } from '../datatable/getCommercantsDtFieldUtils.js';

import { checkUserEmailExists } from '../checkUserEmailExistsUtils.js';

import { commercants_lists_data } from '../../inits/inits.js';

import { dataLists } from '../stores-account/inits/inits.js';

import { setupCreateAccountTimer } from './setupCreateAccountTimer.js';

export function setupCheckAccountExistsTimer() {

    const $lblAjaxCaption = jQuery('#lblAjaxCaption'),
          mySelfInstance = this;

    let length = commercants_lists_data.length,
        current_idx = 0;
        boolNextStep = true;

    $lblAjaxCaption.find('.msg').text('Checking stores account');
    $lblAjaxCaption.find('.length').text(length);
    $lblAjaxCaption.find('.current').text(current_idx);   

    const tmrCheckStore = setInterval(async function() {

        if ( boolNextStep && current_idx < length ) {

            boolNextStep = false;

            const row = commercants_lists_data[current_idx],
                email = getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE);

            if ( email !== '' && email !== 'non' ) {
            
                const result = await checkUserEmailExists(email);  
                
                if ( result !== 'true' ) {

                    dataLists.push({
                        row,
                        email
                    });

                }                    

            }    
            
            current_idx++;

            boolNextStep = true;

            $lblAjaxCaption.find('.current').text(current_idx);

        }

        else {

            if ( current_idx >= length ) {
                
                clearInterval(tmrCheckStore);

                setupCreateAccountTimer.call(mySelfInstance);

            }

        }

    }, 100);  

}