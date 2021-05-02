import { $searchPagination, setJquerySearchPagination } from './inits/inits.js';

import { onSubmit_submitSearchFormEvent } from './handleEvents/onSubmit_submitSearchFormEvent.js';

import { onClick_chooseCategoryEvent } from './handleEvents/onClick_chooseCategoryEvent.js';

import { performSearchAjax } from './utils/performSearchAjaxUtils.js';

const $frmSubmitForm = jQuery('#frmProductsListFilter'),
        $searchPage = jQuery('body.search'),
        $storeDetailsPage = jQuery('body.page-template-page-store-details');

/*filtered_product_lists.length > 0 && (

    setJquerySearchPagination( jQuery('#searchPagination') )  

);*/

$frmSubmitForm.filter('[data-trigger-submit=false]')
              .submit(onSubmit_submitSearchFormEvent);

jQuery('.widget-categories-box li a[data-name]').click(onClick_chooseCategoryEvent);

($searchPage.length > 0 || $storeDetailsPage.length > 0) && 
        performSearchAjax();