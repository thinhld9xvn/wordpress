import { showAjaxPublishing } from '../utils/loader/showAjaxPublishingUtils.js';

import { getFormAction } from '../utils/store-page/getFormActionUtils.js';

import { getDetailsFromAddress } from '../utils/store-page/getDetailsFromAddressUtils.js';

import { addNewRowOnTable } from '../utils/datatable/addNewRowOnTableUtils.js';

import { resetForm } from '../utils/store-page/resetFormUtils.js';

import { hideAjaxPublishing } from '../utils/loader/hideAjaxPublishingUtils.js';

import { getMainCategoryText } from '../utils/getMainCategoryTextUtils.js';

export function onSubmit_submitAdminStoreFormEvent(e) {

    e.preventDefault(); 

    const $modal = jQuery('.modal.show');
    
    const editor_id = jQuery('.modal.show textarea[name="txtDescription"]').attr('id');

    const $submitted_form = jQuery(this);

    tinyMCE.get(editor_id).save();

    showAjaxPublishing();

    jQuery.ajax({

        type : "POST",
        async: true,
        url : ajaxurl,
        data : {
            action : __ACTIONS_HOOKS_LIST.UNICORN_ADMIN_UPDATE_STORE_ACTION,
            params: $submitted_form.serialize()                                
        }

    }).done(function(data) {

        if ( data === 'success' ) {   

            const form_action = getFormAction();

            if ( form_action !== 'update' ) {

                let enseigne = jQuery('.modal.show #txtNomDeIenseigne').length ? jQuery('.modal.show #txtNomDeIenseigne').val() :
                                                                                    jQuery('.modal.show #slSelectionnezVotreEnseigne').val(),

                    myaddress = jQuery('#txtGmapNearByAutocomplete').val(),                                    

                    myAddrInfo = getDetailsFromAddress(myaddress),

                    $slCategoriePrincipale = $modal.find('#slCategoriePrincipale'),

                    mainCategoryId = $slCategoriePrincipale.val(),
                    mainCategoryText = getMainCategoryText.call($slCategoriePrincipale, 
                                                                mainCategoryId);

                const row_data = {
                    enseigne : enseigne,
                    secteur_activity : mainCategoryText,
                    numero : myAddrInfo.no,
                    adresse : myAddrInfo.address,
                    code_postal : $modal.find('#txtCodePostal').val(),
                    ville : $modal.find('#txtVille').val(),
                    telephone_commerce : $modal.find('#txtTelephoneCommerce').val(),
                    email_commerce : $modal.find('#txtEmailDuResponsable').val(),
                    portable_responsable : $modal.find('#txtTelDuResponsable').val(),
                    email_responsable : $modal.find('#txtEmailDuResponsable').val(),
                    site_internet : $modal.find('#txtSiteWeb').val(),
                    page_facebook : '',
                    jours_ouverture_hiver : $modal.find('#txtJoursOuvertureHiver').val(),
                    horaires_hiver : $modal.find('#txtHorairesHiver').val(),
                    jours_fermeture_hiver : $modal.find('#txtJoursFermetureHiver').val(),
                    jours_ouverture_ete : $modal.find('#txtJoursOvertureEte').val(),
                    horaires_ete : $modal.find('#txtHorairesEte').val(),
                    jours_fermeture_ete : $modal.find('#txtJoursFermetureEte').val(),
                    particularites_horaires : $modal.find('#txtParticularitesHoraires').val(),
                    annuaire : $modal.find("#txtTelephoneCommerce").val(),
                    masques_recus : '',
                    bail_saisonnier : ''  
                }

                //console.log(row_data);

                addNewRowOnTable(row_data);

                resetForm($submitted_form[0]);

            }                            

            alert(MESSAGE_NOTIFICATIONS['ajax-default-success-msg']);

        }

        else {

            alert(MESSAGE_NOTIFICATIONS['ajax-default-error-msg']);

        }

        hideAjaxPublishing();

    });  
    
}