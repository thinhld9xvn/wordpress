import { checkValidatePassword } from '../utils/checkValidatePasswordUtils.js';

export function onSubmit_submitFormEvent(e) {

     let boolValidate = checkValidatePassword();

     if ( ! boolValidate ) return false;
    
}