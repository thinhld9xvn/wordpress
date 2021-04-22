import { dtTableInstants, rows_selected_uids, setRowsSelectedUids, commercants_lists_data } from '../inits/inits.js';

import { showAjaxLoadingTable } from '../utils/loader/showAjaxLoadingTableUtils.js';

import { performRemoveSelectedStores } from '../utils/datatable/performRemoveSelectedStoresUtils.js';

import { getCommercantsDtField } from '../utils/datatable/getCommercantsDtFieldUtils.js';

import { setStateOfRemoveRowButton } from '../utils/datatable/setStateOfRemoveRowButtonUtils.js';

import { hideAjaxLoadingTable } from '../utils/loader/hideAjaxLoadingTableUtils.js';

export async function onClick_removeSelectedRowsEvent(e) {

    e.preventDefault();

    const dt = dtTableInstants[0],
          $rows = jQuery('#tblCommercants').find('tbody tr.selected'),
          $this = jQuery(this);

    showAjaxLoadingTable.call($this);

    if ( dt.api ) {

        dt.api().rows($rows).remove().draw(false);

    }

    else {

        dt.rows($rows).remove().draw(false);
        
    }        

    const results = await performRemoveSelectedStores(rows_selected_uids);

    rows_selected_uids.map(id => {

        const index = commercants_lists_data.findIndex(row => parseInt( getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ID) ) === parseInt( id ) );                     

        if ( index !== -1 ) {

            commercants_lists_data.splice(index, 1);

        }

    });

    setRowsSelectedUids([]);  

    setStateOfRemoveRowButton();

    hideAjaxLoadingTable.call($this);

}