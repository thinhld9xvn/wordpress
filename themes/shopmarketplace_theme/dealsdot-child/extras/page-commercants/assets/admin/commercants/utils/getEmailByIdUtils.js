import { commercants_lists_data } from '../inits/inits.js';

import { getCommercantsDtField } from '../utils/datatable/getCommercantsDtFieldUtils.js';

export function getEmailById(id) {

    const data = commercants_lists_data.filter( row => parseInt( getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ID) ) === parseInt( id )  )[0];

    return getCommercantsDtField(data, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE);

}