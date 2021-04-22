import { hideLocationAutoCompleteResults } from '../utils/autocomplete/hideLocationAutoCompleteResultsUtils.js';

export function onMouseUp_hideAutoCompleteResultsEvent(e) {

    const target = e.target;

    var node = jQuery('#gmap-nearby')[0];

    if ( window.localModalObjects && 
                window.localModalObjects.jquery_gmap_nearby_element ) {

        node = window.localModalObjects.jquery_gmap_nearby_element[0];

    } 
    
    //console.log(node);

    if ( node.contains(target) ) { }

    else {

        hideLocationAutoCompleteResults();

    }

}