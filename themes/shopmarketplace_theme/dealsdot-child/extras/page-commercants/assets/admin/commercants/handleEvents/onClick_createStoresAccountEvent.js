import { setupCheckAccountExistsTimer } from '../utils/stores-account/setupCheckAccountExistsTimerUtils.js';

import { showAjax } from '../utils/stores-account/loader/showAjaxUtils.js';

export async function onClick_createStoresAccountEvent(e) {

    e.preventDefault();

    showAjax.call(this);

    setupCheckAccountExistsTimer.call(this);

}