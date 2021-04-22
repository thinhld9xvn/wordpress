//import { searchResultsCallback } from '../utils/printSearchResultsCallbackUtils.js';

import { performSearchAjax } from '../utils/performSearchAjaxUtils.js';

export var pageInst = null;

export var $searchPagination = null;

export var options = {
    dataSource: JSON.parse(JSON.stringify(filtered_product_lists)),
    //pageSize: 9,
    callback: function() {

    },
    beforePageOnClick: function(e) {

        e.preventDefault();

        const target = e.target,
              paged = parseInt( target.innerText );   

        performSearchAjax(paged);
        
    },
    beforeNextOnClick: function(e) {

        e.preventDefault();

        const $target = jQuery('.paginationjs-page.active'),
              paged = parseInt( $target.text() ) + 1;
              
        $searchPagination.pagination('destroy');

    }
  
}

export function setJquerySearchPagination($obj) {

    $searchPagination = $obj;

}

export function setPageInstance(instance) {

    pageInst = instance;

}