import { setJquerySearchPagination } from '../../inits/inits.js';

export function createAjaxLoading() {

    jQuery('#results').html('')
        .append('<div class="products product-lists"></div>')
        .append('<div id="searchPagination"></div>')
        .append(`<div class="perform-ajax">
                    <span class="fa fa-circle-o-notch fa-spin"></span>
                    <span class="caption">Chargement des données, veuillez patienter ...</span>
                </div>`);

        setJquerySearchPagination( jQuery('#searchPagination') );

    //pageInst = null;

}