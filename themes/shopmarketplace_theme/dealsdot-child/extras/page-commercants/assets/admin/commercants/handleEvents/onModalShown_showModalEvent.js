export function onModalShown_showModalEvent(e) {

    const $modal = jQuery('.modal.show'),
          $modal_body = $modal.find('.modal-body')

    jQuery('body').css('overflow', 'hidden');  
    
    $modal.find('.js-select2-dropdown-simple').select2({

        dropdownParent: $modal_body

    });

    $modal.css('overflow', 'auto');

}