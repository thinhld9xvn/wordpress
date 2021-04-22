export function onClick_expandCategoriesListOnSidebarEvent(e) {

    e.preventDefault();

    const $this = jQuery(this);

    $this.closest('.widget')
        .find('ul > li')
        .removeClass('none');

    $this.addClass('none');

}