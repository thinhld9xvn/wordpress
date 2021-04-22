import { onSubmit_submitAdminStoreFormEvent } from '../handleEvents/onSubmit_submitAdminStoreFormEvent.js';

import { onChange_changeCheckBoxesStateEvent } from '../handleEvents/onChange_changeCheckBoxesStateEvent.js';

import { onKeyDown_checkMaxLengthInputTextEvent } from '../handleEvents/onKeyDown_checkMaxLengthInputTextEvent.js';

import { onClick_toggleCoordiatesBoxEvent } from '../handleEvents/onClick_toggleCoordiatesBoxEvent.js';

export function setupStorePage() {

    const $form = jQuery('.frmAdminStore');           

    jQuery('.woo-input-box.__checkbox-condition').hide();

    jQuery('input[type=checkbox]').change(onChange_changeCheckBoxesStateEvent);

    jQuery(`input[type=text][maxlength], 
        textarea[maxlength]`).keydown(onKeyDown_checkMaxLengthInputTextEvent);

    jQuery('.coordinates-toggle').click(onClick_toggleCoordiatesBoxEvent);    

    $form.submit(onSubmit_submitAdminStoreFormEvent);   
                
}