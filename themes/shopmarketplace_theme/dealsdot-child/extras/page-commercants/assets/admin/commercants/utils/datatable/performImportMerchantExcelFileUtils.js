import { showAjaxLoadingTable } from '../loader/showAjaxLoadingTableUtils.js';

import { categories_list_data, setCategoriesListData } from '../../inits/inits.js';

import { setDtAfterAjaxLoad } from '../datatable/setDtAfterAjaxLoadUtils.js';

export function performImportMerchantExcelFile(file_url) {

    const $this = jQuery(this);

    showAjaxLoadingTable.call($this);

    jQuery.ajax({

        method: "POST",
        url: ajaxurl,
        data: {

            action: __ACTIONS_HOOKS_LIST.UNICORN_COMMERCANTS_IMPORT_MERCHANT_DATA_ACTION,
            file_excel_url: file_url

        }

    }).done(function(data) {

        if (data === 'error') {

            alert('Import error !!!');

        } else {

            setCategoriesListData( JSON.parse(JSON.stringify(data)) );

            setDtAfterAjaxLoad.call($this, 0, data);

        }

    });

}