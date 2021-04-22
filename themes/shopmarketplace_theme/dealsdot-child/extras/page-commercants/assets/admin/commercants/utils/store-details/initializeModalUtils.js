import { data_details_form_store, setDataDetailsFormStore } from '../store-details/inits/inits.js';

export function initializeModal() {

    const $modal = jQuery('#detailsStoreModal');                  

    $modal.find('#frmDetailsStore').html(data_details_form_store);

    const settings = JSON.parse( JSON.stringify( tinyMCEPreInit.mceInit['txtDescription'] ) );

    settings.selector = '#txtDescription_view';           

    tinyMCE.init(settings);

    const $select2 = $modal.find('.js-select2-dropdown-simple');

    $select2.select2({

        dropdownParent: jQuery('.modal.show .modal-body')

    });           

    //$modal.find('#slSelectionnezVotreEnseigne').prop('disabled', true);

    window.localLoadAjaxSuccess = 'true';

}