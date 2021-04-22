import { disableMap } from '../map/disableMapUtils.js';
import { enableMap } from '../map/enableMapUtils.js'; 

import { disablePagination } from './disablePaginationUtils.js';
import { enablePagination } from './enablePaginationUtils.js';

import { disableBrandsList } from '../brandLists/disableBrandsListUtils.js';
import { enableBrandsList } from '../brandLists/enableBrandsListUtils.js';

import { MAP_SETTINGS } from '../../constants/constants.js';
import { gmap } from '../../inits/inits.js';

import { getLatLngAddrMapObj } from '../map/getLatLngAddrMapObjUtils.js'; 

import { addMarker } from '../marker/addMarkerUtils.js';

export function init_pagination(length_items, pageSize, incremSlide, startPage, numberPage) {

    function slide(sens) {
        jQuery("#pagin li").hide();
    
        for (let t = startPage; t < incremSlide; t++) {
            jQuery("#pagin li").eq(t + 1).show();
        }
        if (startPage == 0) {
            next.show();
            prev.hide();
        } else if (numberPage == totalSlidepPage) {
            next.hide();
            prev.show();
        } else {
            next.show();
            prev.show();
        }
    
        jQuery("#pagin li:eq(" + (startPage + 1) + ") > a").trigger('click');
    
    
    }
    
    function showPage(page) {
        jQuery(".brands-list > .brand-item").hide();
        jQuery(".brands-list > .brand-item").each(function(n) {
            if (n >= pageSize * (page - 1) && n < pageSize * page)
                jQuery(this).show();
        });
    }

    jQuery("#pagin").html('');

    var pageCount = length_items / pageSize;
    var totalSlidepPage = Math.floor(pageCount / incremSlide);
    var _incremSlide = incremSlide;
   
    for (var i = 0; i < pageCount; i++) {
        jQuery("#pagin").append('<li><a href="#">' + (i + 1) + '</a></li> ');
        if (i > pageSize - 1) {
            jQuery("#pagin li").eq(i).hide();
        }
    }

    var prev = jQuery("<li/>").addClass("prev").html("<a href='#'>Précédent</a>").click(function(e) {

        e.preventDefault();

        startPage -= _incremSlide;
        incremSlide -= _incremSlide;
        numberPage--;

        slide();

        //console.log(startPage);

        //jQuery("#pagin li:eq(" + (startPage + 1) + ") > a").trigger('click');

    });

    prev.hide();

    var next = jQuery("<li/>").addClass("next").html("<a href='#'>Suivant</a>").click(function(e) {

        e.preventDefault();

        /*console.log(startPage); 0
        console.log(pageSize); 20
        console.log(incremSlide); 5 */

        startPage += _incremSlide;
        incremSlide += _incremSlide;
        numberPage++;   
        
        //console.log(startPage);
        //console.log(incremSlide);

        slide();


    });

    jQuery("#pagin").prepend(prev).append(next);

    jQuery("#pagin li").eq(1).addClass("active");   

    showPage(1);

    jQuery("#pagin li a").click(function(e) {

        const { coordiates } = MAP_SETTINGS;

        e.preventDefault();

        const pag_text = jQuery(this).text().trim().toLowerCase();

        jQuery("#pagin li").removeClass("active");

        jQuery(this).parent().addClass("active");

        if (pag_text !== 'next' && pag_text !== 'prev') {

            showPage(parseInt(pag_text));

            disableMap();
            disablePagination();
            disableBrandsList();

            setTimeout(function() {

                jQuery('.brands-list > .brand-item:visible').each(function(e, i) {

                    const index = parseInt(jQuery(this).data('index'));

                    if (coordiates[index].marker === null) {

                        addMarker(index, getLatLngAddrMapObj(index), gmap);

                    }

                });

                enableMap();
                enablePagination();
                enableBrandsList();

            }, 500);

        }



    });

}