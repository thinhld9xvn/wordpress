export function setupFilterNavigation() {

    jQuery('#btnFilterDistance').click(function(e) {

        e.preventDefault();

        jQuery('#txtFilDistance').val(jQuery('.widget-filter-distance .value').text().trim());

        jQuery('#frmProductsListFilter').trigger('submit');

    });

}