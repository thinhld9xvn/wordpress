export function getCommercantsDtField(row, field_name) {

    switch (field_name) {

        case DT_COMMERCANTS_COLUMNS.ID :            

            return row[parseInt(DT_COMMERCANTS_COLUMNS.ID_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.ENSEIGNE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.ENSEIGNE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.NUMERO :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.NUMERO_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.ADDRESSE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.ADDRESSE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.CODE_POSTAL :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.CODE_POSTAL_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.VILLE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.VILLE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.TELEPHONE_COMMERCE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.TELEPHONE_COMMERCE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.PORTABLE_RESPONSABLE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.PORTABLE_RESPONSABLE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.EMAIL_RESPONSABLE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.EMAIL_RESPONSABLE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.SITE_INTERNET :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.SITE_INTERNET_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.PAGE_FACEBOOK :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.PAGE_FACEBOOK_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_HIVER :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_HIVER_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.HORAIRES_HIVER :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.HORAIRES_HIVER_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_HIVER :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_HIVER_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_ETE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_ETE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.HORAIRES_ETE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.HORAIRES_ETE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_ETE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_ETE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.PARTICULARITES_HORAIRES :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.PARTICULARITES_HORAIRES_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.ANNUAIRE :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.ANNUAIRE_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.MASQUES_RESCUS :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.MASQUES_RESCUS_IDX)].toString().trim();

            break;

        case DT_COMMERCANTS_COLUMNS.BAIL_SAISONNIER :

            return row[parseInt(DT_COMMERCANTS_COLUMNS.BAIL_SAISONNIER_IDX)].toString().trim();

            break;

        default:

            return '';

            break;                       


    }

    

}