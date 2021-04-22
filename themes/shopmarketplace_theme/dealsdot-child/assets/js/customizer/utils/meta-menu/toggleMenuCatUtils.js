export function toggleMenuCat() {

    const $btnMegaMenuCatLists = jQuery('#btnMegaMenuCatLists');

    $btnMegaMenuCatLists.siblings('.yamm')
                        .toggleClass('active');

}