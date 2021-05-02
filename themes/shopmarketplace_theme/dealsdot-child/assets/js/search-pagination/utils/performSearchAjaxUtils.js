import { createAjaxLoading } from '../utils/loader/createAjaxLoadingUtils.js';

import { removeAjaxLoading } from '../utils/loader/removeAjaxLoadingUtils.js';

import { initPagination, selectPage } from '../utils/initPaginationUtils.js';

import { printSearchResultsCallback } from '../utils/printSearchResultsCallbackUtils.js';

import { onClick_selectPaginationItemEvent } from '../handleEvents/onClick_selectPaginationItemEvent.js';

import { $searchPagination, pagInst, setPaginationInstance } from '../inits/inits.js';

export function performSearchAjax(paged = 1) {

    const $frmSubmitForm = jQuery('#frmProductsListFilter');
    
    createAjaxLoading();

    const fd = new FormData();

    fd.append('action', 'sb_unicorn_get_searched_products');
    fd.append('params', $frmSubmitForm.serialize());
    fd.append('paged', paged);
    fd.append('posts_per_page', __PAGINATION.posts_per_page);

    jQuery.ajax({

        method: "POST",
        url: '/wp-admin/admin-ajax.php',
        processData: false,
        contentType: false,
        data: fd

    }).done(function(data) {

        if (data !== 'error') {

            printSearchResultsCallback(data["data"]);
            
            if ( pagInst === null ) {

                initPagination(parseInt(data["total"]),
                            parseInt(__PAGINATION.posts_per_page),
                            parseInt(__PAGINATION.posts_per_page),
                            0,
                            0,
                            {
                                onSelectPaginationItem: onClick_selectPaginationItemEvent
                            });

                setPaginationInstance(true);

            }

            else {

                selectPage(paged);

            }
            
        }

        removeAjaxLoading();

        jQuery('html, body').animate({
            scrollTop: jQuery('#results').offset().top - 70
        }, 200);

    });


}