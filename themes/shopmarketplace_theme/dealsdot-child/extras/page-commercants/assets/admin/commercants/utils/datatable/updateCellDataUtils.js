import { commercants_lists_data } from '../../inits/inits.js';

import { getCommercantsDtField } from '../datatable/getCommercantsDtFieldUtils.js';

export function updateCellData(id, cell_index, data) {

    const row_index = commercants_lists_data.findIndex(row => parseInt(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ID)) === id );

    commercants_lists_data[row_index][cell_index] = data;

}