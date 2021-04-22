import { onClick_chooseAvatarImageEvent } from './handleEvents/onClick_chooseAvatarImageEvent.js';

import { onSubmit_onSubmitPersonalInfoEvent } from './handleEvents/onSubmit_onSubmitPersonalInfoEvent.js';

import { isoCountries } from './constants/constants.js';

const $woo = jQuery('.woocommerce-MyAccount-content'),   
     $form = ($woo.length && $woo.find('#frmPersonalInfo')) || [],
     $select2 = ($form.length && $form.find('.js-select2-dropdown-simple.slAccountCountry')) || [],
     $btnChooseAvatarImage = ($form.length && $form.find('#btnChooseAvatarImage')) || [];

$select2.length && 
    $select2.select2({

        data: isoCountries

    }).on('select2:select', function(e) {

        var data = e.params.data,
            $obj = jQuery(this),
            txtHidField = document.getElementById($obj.data('fieldIdBinding'));

        if (txtHidField !== null) {

            txtHidField.value = data.id;

        }

    });

$btnChooseAvatarImage.length && 
    $btnChooseAvatarImage.click(onClick_chooseAvatarImageEvent);

$form.length && 
    $form.submit(onSubmit_onSubmitPersonalInfoEvent);           

