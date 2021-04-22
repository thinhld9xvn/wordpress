import { dataLists } from '../stores-account/inits/inits.js';

import { getCommercantsDtField } from '../datatable/getCommercantsDtFieldUtils.js';

import { formatCell } from '../datatable/formatCellUtils.js';

import { performCreateStoreAccount } from '../stores-account/performCreateStoreAccountUtils.js';

import { hideAjax } from '../stores-account/loader/hideAjaxUtils.js';

export function setupCreateAccountTimer() {

    const $lblAjaxCaption = jQuery('#lblAjaxCaption'),
          mySelfInstance = this;
    
    let length = dataLists.length,
        current_idx = 0,
        boolNextStep = true;

    $lblAjaxCaption.find('.msg').text('Creating stores account');                           
    $lblAjaxCaption.find('.length').text(length);
    $lblAjaxCaption.find('.current').text(current_idx);

    const tmrCreateStoresAcc = setInterval(async function() {               

        if ( boolNextStep && current_idx < length ) { 

            boolNextStep = false;
            
            const data = dataLists[current_idx];                  

            const email = data.email,
                    row = data.row,
                    enseigne = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ENSEIGNE)), 
                    secteur_activity = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY)),
                    numero = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.NUMERO)),
                    adresse = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ADDRESSE)),
                    code_postal = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.CODE_POSTAL)),
                    ville = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.VILLE)),
                    telephone_commerce = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.TELEPHONE_COMMERCE)),
                    email_commerce = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE)),
                    portable_responsable = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.PORTABLE_RESPONSABLE)),
                    email_responsable =formatCell( getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.EMAIL_RESPONSABLE ) ),
                    site_internet = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.SITE_INTERNET)),
                    page_facebook = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.PAGE_FACEBOOK)),
                    jours_ouverture_hiver = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_HIVER)),
                    horaires_hiver = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.HORAIRES_HIVER)),
                    jours_fermeture_hiver = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_HIVER)),
                    jours_ouverture_ete = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_ETE)),
                    horaires_ete = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.HORAIRES_ETE)),
                    jours_fermeture_ete = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_ETE)),
                    particularites_horaires = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.PARTICULARITES_HORAIRES)),
                    annuaire = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ANNUAIRE)),
                    masques_recus = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.MASQUES_RESCUS)),
                    bail_saisonnier = formatCell(getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.BAIL_SAISONNIER));

                const params = {
                    enseigne,
                    secteur_activity,
                    numero,
                    adresse,
                    code_postal,
                    ville,
                    telephone_commerce,
                    email_commerce,
                    portable_responsable,
                    email_responsable,
                    site_internet,
                    page_facebook,
                    jours_ouverture_hiver,
                    horaires_hiver,
                    jours_fermeture_hiver,
                    jours_ouverture_ete,
                    horaires_ete,
                    jours_fermeture_ete,
                    particularites_horaires,
                    annuaire,
                    masques_recus,
                    bail_saisonnier
                };

            result = await performCreateStoreAccount(params);

            console.log(result);

            current_idx++;

            boolNextStep = true;

            $lblAjaxCaption.find('.current').text(current_idx);               
            
        }

        else {

            if ( current_idx >= length ) {                       
                
                clearInterval(tmrCreateStoresAcc);

                hideAjax.call(mySelfInstance);

            }

        }   
        

    }, 100);

}