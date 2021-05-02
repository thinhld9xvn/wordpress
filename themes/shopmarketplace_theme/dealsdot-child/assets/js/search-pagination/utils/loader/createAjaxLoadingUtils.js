import { setJquerySearchPagination } from '../../inits/inits.js';

export function createAjaxLoading() {

    const  $results = jQuery('#results'),
           $productLists = $results.find('.products.product-lists'),
           $pagination = $results.find('#searchPagination'),
           loaderHTML = `<div class="perform-ajax">
                            <span class="fa fa-circle-o-notch fa-spin"></span>
                            <span class="caption">${MESSAGE_NOTIFICATIONS['loading-data-msg']}</span>
                        </div>`;

    let isFirstLoading = true;

    if ( $productLists.length ) {

        isFirstLoading = false;

        //$productLists.html('');

    }

    else {

        $results.append('<div class="products product-lists"></div>');        

    }

    if ( $pagination.length === 0 ) {

        $results.append('<div id="searchPagination" class="pagination"></div>');

    }  

    if ( isFirstLoading ) {

        jQuery('#results')
                .prepend(loaderHTML);

        setJquerySearchPagination( jQuery('#searchPagination') );

    }

    else {

        jQuery('#results').append(loaderHTML)
                          .addClass('disabled');
                          

    }
        

    //pageInst = null;

}