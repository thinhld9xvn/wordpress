import { performSearchAjax } from '../utils/performSearchAjaxUtils.js';

export function onSubmit_submitSearchFormEvent(e) {

    e.preventDefault();

    performSearchAjax();

}