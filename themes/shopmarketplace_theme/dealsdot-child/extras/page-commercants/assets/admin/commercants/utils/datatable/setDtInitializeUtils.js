import { resetDtInstance } from './resetDtInstanceUtils.js';

import { dtTableOptions, dtTableInstants, commercants_lists_data, dtDataTableOptions } from '../../inits/inits.js';

export function setDtInitialize(index, dtOptions) {

    const $tblProductCategories = jQuery('#tblProductCategories'),
          $tblCommercants = jQuery('#tblCommercants');

    resetDtInstance(index);

    dtTableOptions[index] = JSON.parse(JSON.stringify(dtDataTableOptions));

    if (index === 0) { 

        dtTableOptions[index]['data'] = commercants_lists_data;

        dtTableOptions[index]['columns'] = [
            {   os : "select",
                orderable : false,
                searchable : false,
                render : function() {
                    return `<input type="checkbox" class="chkSelectRow" value="1" />`;
                } 
            },
            {   zoom : "details",
                orderable : false,
                searchable : false,
                render : function() {
                    return `<a class="btnRowDetails" href="#"><span class="fa fa-search-plus"></span></a>`;
                }
            },
            { id: DT_COMMERCANTS_COLUMNS.ID },
            { name: DT_COMMERCANTS_COLUMNS.ENSEIGNE },
            { secteur: DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY },
            { numero: DT_COMMERCANTS_COLUMNS.NUMERO },
            { adresse: DT_COMMERCANTS_COLUMNS.ADDRESSE },
            { code_postal: DT_COMMERCANTS_COLUMNS.CODE_POSTAL },
            { ville: DT_COMMERCANTS_COLUMNS.VILLE },
            { phone: DT_COMMERCANTS_COLUMNS.TELEPHONE_COMMERCE },
            { email_commerce: DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE },
            { portable_responsable: DT_COMMERCANTS_COLUMNS.PORTABLE_RESPONSABLE },
            { email_responsable: DT_COMMERCANTS_COLUMNS.EMAIL_RESPONSABLE },
            { site_internet: DT_COMMERCANTS_COLUMNS.SITE_INTERNET },
            { page_facebook: DT_COMMERCANTS_COLUMNS.PAGE_FACEBOOK },
            { jours_ouverture_hiver: DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_HIVER },
            { horaires_hiver: DT_COMMERCANTS_COLUMNS.HORAIRES_HIVER },
            { jours_fermeture_hiver: DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_HIVER },
            { jours_ouverture_ete: DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_ETE },
            { horaires_ete: DT_COMMERCANTS_COLUMNS.HORAIRES_ETE },
            { jours_fermeture_ete: DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_ETE },
            { particularites_horaires: DT_COMMERCANTS_COLUMNS.PARTICULARITES_HORAIRES },
            { annuaire: DT_COMMERCANTS_COLUMNS.ANNUAIRE },
            { masques_recus: DT_COMMERCANTS_COLUMNS.MASQUES_RESCUS },
            { bail_saisonnier: DT_COMMERCANTS_COLUMNS.BAIL_SAISONNIER }
        ];

        dtTableOptions[index]['columnDefs'] = [
            { width: 40 },              
            { width: 40 },
            { width: 40 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 },
            { width: 200 }
        ];

        dtTableOptions[index]['language'] = {
            searchPlaceholder: "Enseigne ..."
        };  

        //console.log('abc');

        dtTableInstants[index] = $tblCommercants.DataTable(dtTableOptions[index]); 

    } else {

        dtTableOptions[index]['data'] = __dt_categories_list;

        dtTableOptions[index]['columns'] = [
            { id: "ID" },
            { name: "Name" }
        ];

        dtTableOptions[index]['columnDefs'] = [
            { width: 40, targets: 0 },
            { width: 100, targets: 0 }
        ];

        dtTableOptions[index]['language'] = {
            searchPlaceholder: "Category name ..."
        };

        dtTableInstants[index] = $tblProductCategories.DataTable(dtTableOptions[index]);

    }

}