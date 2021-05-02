import { performSearchAjax } from '../utils/performSearchAjaxUtils.js';

export function onClick_selectPaginationItemEvent(paged) {  

    performSearchAjax(paged);

}