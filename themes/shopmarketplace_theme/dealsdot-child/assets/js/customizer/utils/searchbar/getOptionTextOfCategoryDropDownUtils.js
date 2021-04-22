export function getOptionTextOfCategoryDropDown(v) {

    const $categoriesHeadFilSelect2 = jQuery('.js-select2-header-dropdown-simple');

    if (parseInt(v) !== -1) return $categoriesHeadFilSelect2.eq(0).find('option[value=' + v + ']').text().trim();

    return 'Tous';

}