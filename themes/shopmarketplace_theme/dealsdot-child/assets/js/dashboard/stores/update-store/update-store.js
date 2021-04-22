import { onSubmit_submitFormEvent } from './handleEvents/onSubmit_submitFormEvent.js';

import { onChange_changeCheckboxEvent } from './handleEvents/onChange_changeCheckboxEvent.js';

import { onKeyDown_checkMaxLengthTextEvent } from './handleEvents/onKeyDown_checkMaxLengthTextEvent.js';

import { onClick_toggleCoordiationsBoxEvent } from './handleEvents/onClick_toggleCoordiationsBoxEvent.js';

const $woo = jQuery('.woocommerce-MyAccount-content'),                     
        $form = ($woo.length && $woo.find('.frmAdminStore')) || [],

        $checkboxes = ($form.length && $form.find('input[type=checkbox]')) || [],
        $textInputHasMaxLength = ($form.length && $form.find('input[type=text][maxlength], textarea[maxlength]')) || [],
        $btnCoordiatesToggle = ($form.length && $form.find('.coordinates-toggle')) || [],
        $chkCondition = ($woo.length && $woo.find('.woo-input-box.__checkbox-condition')) || [],       

        $select2 = ($form.length && $form.find('.js-select2-dropdown-simple')) || [],
        $slSelectionnezVotreEnseigne = ($select2.length && $select2.filter('#slSelectionnezVotreEnseigne')) || [],
        $slCategoriePrincipale = ($select2.length && $select2.filter('#slCategoriePrincipale')) || [];

$chkCondition.hide();

$checkboxes.length && 
    $checkboxes.change(onChange_changeCheckboxEvent);

$textInputHasMaxLength.length && 
    $textInputHasMaxLength.keydown(onKeyDown_checkMaxLengthTextEvent);

$btnCoordiatesToggle.length && 
    $btnCoordiatesToggle.click(onClick_toggleCoordiationsBoxEvent);

$form.length && 
    $form.submit(onSubmit_submitFormEvent);

$select2.length && 
    $select2.select2();

$slSelectionnezVotreEnseigne.length && 
    $slSelectionnezVotreEnseigne.prop('disabled', true);

$slCategoriePrincipale.length && 
    $slCategoriePrincipale.prop('disabled', false);