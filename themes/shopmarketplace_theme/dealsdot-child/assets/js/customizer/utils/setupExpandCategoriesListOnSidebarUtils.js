import { onClick_expandCategoriesListOnSidebarEvent } from '../handleEvents/onClick_expandCategoriesListOnSidebarEvent.js';

export function setupExpandCategoriesListOnSidebar() {

    jQuery('#btnCategoriesListViewAll').click(onClick_expandCategoriesListOnSidebarEvent);

}