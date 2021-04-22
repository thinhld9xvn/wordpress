import { onSubmit_submitPAbuseFormEvent } from './handleEvents/onSubmit_submitPAbuseFormEvent.js';

const $abuseForm = jQuery('#frmReportAbuseProduct'),
      $product_tabs = jQuery('#product-tabs');

$abuseForm.length && 
    $abuseForm.submit(onSubmit_submitPAbuseFormEvent);

jQuery(window).load(function() {

    $product_tabs.length && 
                $product_tabs.find('> li:eq(0) > a')
                             .trigger('click');

});