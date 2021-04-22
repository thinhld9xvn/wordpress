import { performUpdateCategoriesListData } from '../utils/datatable/performUpdateCategoriesListDataUtils.js';

export function onClick_updateCategoriesListsEvent(e) {

    e.preventDefault();    

    performUpdateCategoriesListData.call(this);

}