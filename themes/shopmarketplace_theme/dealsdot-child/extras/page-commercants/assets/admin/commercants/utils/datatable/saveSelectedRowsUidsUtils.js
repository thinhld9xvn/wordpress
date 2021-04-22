import { rows_selected_uids } from '../../inits/inits.js';

export function saveSelectedRowsUids(row_index, checked) {

    const idx = rows_selected_uids.findIndex(index => index === row_index);
        
    if ( checked ) {

        idx === -1 && rows_selected_uids.push(row_index);

    }

    else {            

        idx !== -1 && rows_selected_uids.splice(idx, 1);

    }

}