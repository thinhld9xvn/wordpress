import { showAjaxLoadingTable } from '../loader/showAjaxLoadingTableUtils.js';

import { hideAjaxLoadingTable } from '../loader/hideAjaxLoadingTableUtils.js';

import { categories_list_data, setCategoriesListData } from '../../inits/inits.js';

import { modifyRecentUpdate } from '../datatable/modifyRecentUpdateUtils.js';

export async function performUpdateCategoriesListData() {

    const mySelfInstance = this,
        performUpdate = async function() {

            const fd = new FormData();

            fd.append('action', __ACTIONS_HOOKS_LIST.UNICORN_COMMERCANTS_UPDATE_CATEGORIES_DATA_ACTION);
            fd.append('categories_list', JSON.stringify(categories_list_data));

            return await jQuery.ajax({

                method: "POST",
                url: ajaxurl,
                processData: false,
                contentType: false,
                data: fd

            });

        };

    if (categories_list_data.length > 0) {

        showAjaxLoadingTable.call(mySelfInstance);

        const data = await performUpdate();

        if (data === 'error') {

            alert('Import error !!!');

        } else {

            modifyRecentUpdate(data);

        }

        hideAjaxLoadingTable.call(mySelfInstance);

    }

}