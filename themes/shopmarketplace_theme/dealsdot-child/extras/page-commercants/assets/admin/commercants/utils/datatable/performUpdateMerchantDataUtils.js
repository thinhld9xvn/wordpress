import { commercants_lists_data } from '../../inits/inits.js';

import { showAjaxLoadingTable } from '../loader/showAjaxLoadingTableUtils.js';

import { getCoordiateAsync } from '../getCoordiatesAsyncUtils.js';

import { modifyRecentUpdate } from '../datatable/modifyRecentUpdateUtils.js';

import { hideAjaxLoadingTable } from '../loader/hideAjaxLoadingTableUtils.js';

export async function performUpdateMerchantData() {

    const mySelfInstance = this,
        performUpdate = async function() {

            const fd = new FormData();

            fd.append('action', __ACTIONS_HOOKS_LIST.UNICORN_COMMERCANTS_UPDATE_MERCHANT_DATA_ACTION);
            fd.append('commercants_lists', JSON.stringify(commercants_lists_data));

            return await jQuery.ajax({

                method: "POST",
                url: ajaxurl,
                processData: false,
                contentType: false,
                data: fd

            });

        }

    if (commercants_lists_data.length > 0) {

        showAjaxLoadingTable.call(mySelfInstance);

        const data = await performUpdate();

        if (data === 'error') {

            alert('Import error !!!');

        } else {

            const coords_data = await getCoordiateAsync();

            if (coords_data !== 'error') {

                modifyRecentUpdate(data);

            } else {

                alert('Get coordates error !!!');

            }

        }

        hideAjaxLoadingTable.call(mySelfInstance);

    }

}