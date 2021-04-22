export function onClick_chooseCategoryEvent(e) {

    e.preventDefault();

    const $frmSubmitForm = jQuery('#frmProductsListFilter');

    const $obj = jQuery(this),
        id = parseInt($obj.data('id'));

    jQuery('.js-select2-header-dropdown-simple').val(id)
                                            .trigger('change');

    jQuery('#txtHidSbLeftFilCategory').val(id);

    $obj.parent().addClass('active')
        .siblings()
        .removeClass('active');

    $frmSubmitForm.trigger('submit');

}