export function onClick_searchBarDropDownEvent(e) {

    e.preventDefault();

    const $categoriesHeadFilWrapper = jQuery('#searchbar-categories-dropdown');

    if ($categoriesHeadFilWrapper.hasClass('active')) {

        $categoriesHeadFilWrapper.find('.js-select2-header-dropdown-simple').select2('close');

        //$categoriesHeadFilSelect2.select2('close');

    } else {

        $categoriesHeadFilWrapper.find('.js-select2-header-dropdown-simple').select2('open');

        //$categoriesHeadFilSelect2.select2('open');

    }

    $categoriesHeadFilWrapper.toggleClass('active');

}