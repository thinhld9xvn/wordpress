import { onMouseUp_hideAutoCompleteResultsEvent } from '../handleEvents/onMouseUp_hideAutoCompleteResultsEvent.js';

import { onClick_selectLocationResultEvent } from '../handleEvents/onClick_selectLocationResultEvent.js';

import { showLocationAutoCompleteResults } from '../utils/autocomplete/showLocationAutoCompleteResultsUtils.js';

import { UI_AUTOCOMPLETE } from '../constants/constants.js';

export function initAutoCompleteUI() {   
        
    var $txtGmapNearByAutocomplete = jQuery('#txtGmapNearByAutocomplete');

    if ( typeof( jQuery.fn.customLocationComplete ) === 'undefined' ) {

        jQuery.fn.customLocationComplete = function(options) {

            const $parent = jQuery(this).parent(),                 
                limit = options.limit ? parseInt(options.limit) : 5;

            var $results = $parent.find('#locationQueryResults');

            let strHTML = '';  
            
            if ( $results.length === 0 ) {

                $parent.append(UI_AUTOCOMPLETE.ui_html);

            }

            else {

                $results.html('');

            }
            
            options.data.forEach(function(e, i) {

                if ( i >= limit ) return;

                let html = UI_AUTOCOMPLETE.item_html;

                html = html.replace(/\{name\}/ig, e.name)
                            .replace(/\{lat\}/ig, e.lat)
                            .replace(/\{lng\}/ig, e.lng)
                            .replace(/\{logo\}/ig, 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/geocode-71.png');

                strHTML += html;                

            });

            $results.append(strHTML);

            $results.find('li')
                    .click(onClick_selectLocationResultEvent);

        }; 
        
    }

    if ( window.localModalObjects && 
            window.localModalObjects.jquery_txtGmapNearByAutocomplete_element ) {

        $txtGmapNearByAutocomplete = window.localModalObjects.jquery_txtGmapNearByAutocomplete_element;

    }
    
    $txtGmapNearByAutocomplete.unbind('focus')
                             .bind('focus', showLocationAutoCompleteResults);

    jQuery(document).off('click', onMouseUp_hideAutoCompleteResultsEvent)
                .on('click', onMouseUp_hideAutoCompleteResultsEvent);
   
}