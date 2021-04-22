import { createLoadingAjax } from '../loading/createLoadingAjaxUtils.js';

import { MAP_SETTINGS, COMMERCANTS_PAGINATION } from '../../constants/constants.js';

import { createBrandItemHTML } from '../brandItem/createBrandItemHTMLUtils.js';

import { selectBrandItem } from '../brandItem/selectBrandItemUtils.js';
import { selectBrandNameItem } from '../brandItem/selectBrandNameItemUtils.js';
import { hoverBrandItem } from '../brandItem/hoverBrandItemUtils.js';
import { notHoverBrandItem } from '../brandItem/notHoverBrandItemUtils.js';

import { removeLoadingAjax } from '../loading/removeLoadingAjaxUtils.js';

import { init_pagination } from '../pagination/initPaginationUtils.js';

import { store_name_selected, 
            distance_value, 
                category_ids_selected } from '../../inits/inits.js';

export function createBrandsListWithFilters() {

    const { coordiates } = MAP_SETTINGS;

    createLoadingAjax();

    jQuery('.brands-list').html('');
    jQuery("#pagin").html('');        

    setTimeout(function() {

        let html = '';

        coordiates.map((item, i) => {

            let boolValidate = true;

            if (store_name_selected) {

                //console.log(item);

                let name = item.enseigne.toLowerCase().trim();                    

                let _name = store_name_selected.toLowerCase().trim();

                //console.log(name + '-' + _name);

                if (name.indexOf(_name) !== -1) {

                    boolValidate = true;

                }

                else {

                    boolValidate = false;

                }

            } 

            else {

                boolValidate = true;

            }

            if ( boolValidate && distance_value ) {

                if (distance_value !== 0) {

                    if (item.coord.distance <= distance_value) {

                        boolValidate = true;

                    }

                    else {

                        boolValidate = false;

                    }

                }

                else {

                    boolValidate = true;

                }

            }

            if ( boolValidate && category_ids_selected ) {

                if ( category_ids_selected.length > 0 ) {

                    if ( category_ids_selected.indexOf(i) !== -1 ) {

                        boolValidate = true;
                        
                    }

                    else {

                        boolValidate = false;

                    }

                }

                else {

                    boolValidate = true;

                }
                
            }

            if ( boolValidate ) {

                html += createBrandItemHTML(i);

            }

        });

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