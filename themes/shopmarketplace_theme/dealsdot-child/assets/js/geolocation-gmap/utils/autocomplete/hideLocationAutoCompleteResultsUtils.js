export function hideLocationAutoCompleteResults() {

    //console.log('hide');

    var $locationQueryResults = jQuery('#locationQueryResults');

    if ( window.localModalObjects && window.localModalObjects.jquery_modal_element ) {

        $locationQueryResults = window.localModalObjects.jquery_modal_element.find('#locationQueryResults');

    }

    $locationQueryResults.length && $locationQueryResults.hide('fast');

}