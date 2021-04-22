import { resetDtInstance } from './resetDtInstanceUtils.js';

import { dtTableOptions, dtTableInstants } from '../../inits/inits.js';

import { hideAjaxLoadingTable } from '../loader/hideAjaxLoadingTableUtils.js';

export function setDtAfterAjaxLoad(index, dtSource) {

    const mySelfInstance = this;

    const $tblCommercants = jQuery('#tblCommercants'),
          $tblProductCategories = jQuery('#tblProductCategories'),

        $tblInst = index === 0 ? $tblCommercants : $tblProductCategories;

    resetDtInstance(index);

    //$tblInst.find('tbody').html(html);

    dtTableOptions[index]['data'] = dtSource;

    setTimeout(function() {

        dtTableInstants[index] = $tblInst.dataTable(dtTableOptions[index]);

        hideAjaxLoadingTable.call(mySelfInstance);

    }, 2000);

}