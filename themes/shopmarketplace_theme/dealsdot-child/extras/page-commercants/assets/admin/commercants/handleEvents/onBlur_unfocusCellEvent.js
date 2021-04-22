import { updateCellData } from '../utils/datatable/updateCellDataUtils.js';

export function onBlur_unfocusCellEvent(e) {

    const $cell = jQuery(this),
        id_idx = parseInt( DT_COMMERCANTS_COLUMNS.ID_IDX ) + 1,
        id = parseInt( $cell.closest('tr').find('td:nth-child(' + id_idx + ')').text().trim() ),
        cell_index = $cell.index(),
        data = $cell.text().trim();

    $cell.removeAttr('contenteditable');

    updateCellData(id, cell_index, data);

}