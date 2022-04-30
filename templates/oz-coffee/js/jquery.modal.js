export function setupModal() {

    jQuery('a[modal-type="master-modal"]').click(function(e) {

        e.preventDefault();

        var modal_target = jQuery(this).attr('modal-target');

        jQuery( modal_target ).modal({
        escapeClose: true,
        clickClose: true,
        showClose: true
        });

    });	

}