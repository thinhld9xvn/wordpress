export function showLocationAutoCompleteResults() {

    //console.log('show');

    var $locationQueryResults = jQuery('#locationQueryResults');

    if ( window.localModalObjects && window.localModalObjects.jquery_modal_element ) {

        $locationQueryResults = window.localModalObjects.jquery_modal_element.find('#locationQueryResults');

    }

    $locationQueryResults.length && $locationQueryResults.show('fast');

}