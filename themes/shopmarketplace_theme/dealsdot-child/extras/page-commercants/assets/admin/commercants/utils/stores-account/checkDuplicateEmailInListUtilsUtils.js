import { commercants_lists_data } from '../../inits/inits.js';

import { getCommercantsDtField } from '../datatable/getCommercantsDtFieldUtils.js';

export function checkDuplicateEmailInList() {

    commercants_lists_data.forEach((row, i) => {

        const email = getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE);

        const results = commercants_lists_data.filter((_row, k) => getCommercantsDtField(_row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE) === email && k !== i);

        if ( results.length > 0 ) {

            console.log(email);

        }

    });


}