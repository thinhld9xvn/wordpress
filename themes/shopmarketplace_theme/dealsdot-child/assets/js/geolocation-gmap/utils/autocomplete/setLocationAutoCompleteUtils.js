export function setLocationAutoComplete(data) {

    var $txtGmapNearByAutocomplete = jQuery('#txtGmapNearByAutocomplete');

    if ( window.localModalObjects && window.localModalObjects.jquery_txtGmapNearByAutocomplete_element ) {

        $txtGmapNearByAutocomplete = window.localModalObjects.jquery_txtGmapNearByAutocomplete_element;

    }

    $txtGmapNearByAutocomplete.customLocationComplete({
        data,
        limit: 5
    });        

}