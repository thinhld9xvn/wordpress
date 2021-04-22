import { setDtInitialize } from '../utils/datatable/setDtInitializeUtils.js';

import { dtDataTableOptions } from '../inits/inits.js';

export function onClick_toggleTabItemsEvent(e) {

    e.preventDefault();

    jQuery(this).addClass('active')
        .siblings()
        .removeClass('active');

    const index = jQuery(this).index();

    jQuery('.tabbles-nav .tabbles-content:eq(' + index + ')').addClass('show')
        .siblings()
        .removeClass('show');

    setDtInitialize(index, dtDataTableOptions);

}