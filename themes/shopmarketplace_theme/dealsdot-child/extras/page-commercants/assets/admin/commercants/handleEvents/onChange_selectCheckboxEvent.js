import { setStateOfRow } from '../utils/datatable/setStateOfRowUtils.js';

import { saveSelectedRowsUids } from '../utils/datatable/saveSelectedRowsUidsUtils.js';

import { setStateOfRemoveRowButton } from '../utils/datatable/setStateOfRemoveRowButtonUtils.js';

export function onChange_selectCheckboxEvent(e) {

    e.preventDefault();

    const $checkbox = jQuery(this),
          $row = $checkbox.closest('tr'),
          id_idx = parseInt( DT_COMMERCANTS_COLUMNS.ID_IDX ) + 1,
          row_index = parseInt( $row.find('td:nth-child(' + id_idx + ')').text().trim() ),
          checked = $checkbox.prop('checked'); 
          
    $checkbox.prop('checked', checked);
          
    setStateOfRow($row, checked);

    saveSelectedRowsUids(row_index, checked);

    setStateOfRemoveRowButton();

    //console.log(rows_selected_uids);

}