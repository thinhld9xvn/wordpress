import { onSubmit_submitFormEvent } from './handleEvents/onSubmit_submitFormEvent.js';

const $form = jQuery('#woocommerce-store-resetPassword');

$form.length && 
    $form.submit(onSubmit_submitFormEvent);