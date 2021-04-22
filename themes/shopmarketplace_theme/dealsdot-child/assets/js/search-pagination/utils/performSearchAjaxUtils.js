import { createAjaxLoading } from '../utils/loader/createAjaxLoadingUtils.js';

import { removeAjaxLoading } from '../utils/loader/removeAjaxLoadingUtils.js';

import { setPageInstance, $searchPagination, pageInst, options } from '../inits/inits.js';

import { printSearchResultsCallback } from '../utils/printSearchResultsCallbackUtils.js';

export function performSearchAjax(paged = 1) {

    const $frmSubmitForm = jQuery('#frmProductsListFilter');
    
    createAjaxLoading();

    const fd = new FormData();

    fd.append('action', 'sb_unicorn_get_searched_products');
    fd.append('params', $frmSubmitForm.serialize());
    fd.append('posts_per_page', __PAGINATION.posts_per_page);
    fd.append('paged', paged);

    jQuery.ajax({

        method: "POST",
        url: '/wp-admin/admin-ajax.php',
        processData: false,
        contentType: false,
        data: fd

    }).done(function(data) {

        if (data !== 'error') {

            const total = data['total'],
                  posts_per_page = __PAGINATION.posts_per_page;   

            options.dataSource = window.location.origin + '/jsoncallback=?';
        
            options.pageSize = posts_per_page;
            options.totalNumber = total;  
            options.pageNumber = paged;

            setPageInstance( $searchPagination.pagination(options) );

            printSearchResultsCallback(data['results']);          

        }

        removeAjaxLoading();

        jQuery('html, body').animate({
            scrollTop: jQuery('#results').offset().top - 70
        }, 200);

    });


}