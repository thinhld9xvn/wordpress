import { createLoadingAjax } from '../loading/createLoadingAjaxUtils.js';

import { MAP_SETTINGS, COMMERCANTS_PAGINATION } from '../../constants/constants.js';

import { createBrandItemHTML, createBrandItemHTMLByObject } from '../brandItem/createBrandItemHTMLUtils.js';

import { selectBrandItem } from '../brandItem/selectBrandItemUtils.js';
import { selectBrandNameItem } from '../brandItem/selectBrandNameItemUtils.js';
import { hoverBrandItem } from '../brandItem/hoverBrandItemUtils.js';
import { notHoverBrandItem } from '../brandItem/notHoverBrandItemUtils.js';

import { init_pagination } from '../pagination/initPaginationUtils.js';

import { removeLoadingAjax } from '../loading/removeLoadingAjaxUtils.js';

export function createBrandsList(dv) {

    const { coordiates } = MAP_SETTINGS;

    createLoadingAjax();

    jQuery('.brands-list').html('');
    jQuery("#pagin").html('');

    setTimeout(function() {

        let html = '';    
        
        const arrResults = [];

        coordiates.map((item, i) => {

            if (dv !== 0) {

                if (item.coord.distance <= dv) {

                    arrResults.push({
                        index : i,
                        data : JSON.parse(JSON.stringify(_brands_lists_info[i]))
                    });                   

                }

            } else {

                arrResults.push({
                    index : i,
                    data : JSON.parse(JSON.stringify(_brands_lists_info[i]))
                });            

            }

        });

        arrResults.sort((a, b) => a.data.enseigne.localeCompare(b.data.enseigne));

        arrResults.forEach(item => {

            html += createBrandItemHTMLByObject(item);

        });

        //arrResults.map()

        //html += createBrandItemHTML(i);

        //console.log(html);

        jQuery('.brands-list').html(html)
            .on('click', '.brand-item', selectBrandItem)
            .on('click', '.brand-item h4', selectBrandNameItem)
            .on('mouseover', '.brand-item', hoverBrandItem)
            .on('mouseout', '.brand-item', notHoverBrandItem);

        const items_length = jQuery('.brands-list > .brand-item').length;            

        init_pagination(items_length, COMMERCANTS_PAGINATION.pagesize, 
                                        COMMERCANTS_PAGINATION.incremslide, 
                                        COMMERCANTS_PAGINATION.startpage, 
                                        COMMERCANTS_PAGINATION.numberpage);

        removeLoadingAjax();

        if (!window.is_map_loaded) {

            window.is_map_loaded = true;

        }

    }, 2000);

}   