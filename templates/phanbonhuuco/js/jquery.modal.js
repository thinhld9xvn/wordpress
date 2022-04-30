export function setupPopupMarker() {

    const dlg_node = jQuery('.anfa-dialog')[0],
          modal_node = jQuery('.anfa-dialog > .modal')[0];

    jQuery('.anfa-dialog .close').click(function(e) {

        e.preventDefault();

        jQuery(this).closest('.popup')
                    .removeClass('show');

    })

    jQuery(document).on('mouseup', function(e) {

        const target = e.target;

        if ( modal_node && modal_node.contains(target) ) {
        }

        else {            

            if ( dlg_node.classList.contains("show") ) {

                dlg_node.classList.remove("show");

            }


        }

    })

}