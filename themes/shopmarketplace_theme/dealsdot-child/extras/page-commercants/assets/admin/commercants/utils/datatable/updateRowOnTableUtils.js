import { dtTableInstants, commercants_lists_data } from '../../inits/inits.js';

export function updateRowOnTable(data) {

    const dt = dtTableInstants[0];

    const row_data = [               
            data.enseigne,
            data.secteur_activity,
            data.numero,
            data.adresse,
            data.code_postal,
            data.ville,
            data.telephone_commerce,
            data.email_commerce,
            data.portable_responsable,
            data.email_responsable,
            data.site_internet,
            data.page_facebook,
            data.jours_ouverture_hiver,
            data.horaires_hiver,
            data.jours_fermeture_hiver,
            data.jours_ouverture_ete,
            data.horaires_ete,
            data.jours_fermeture_ete,
            data.particularites_horaires,
            data.annuaire,
            data.masques_recus,
            data.bail_saisonnier    
        ],
        id = data.id;
    
    const my_row = commercants_lists_data.filter( row => parseInt( getCommercantsDtField(row, DT_COMMERCANTS_COLUMNS.ID) ) === parseInt( id )  )[0];

    my_row[DT_COMMERCANTS_COLUMNS.ENSEIGNE_IDX] = data.enseigne;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.numero;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.adresse;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;
    my_row[DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY_IDX] = data.secteur_activity;

}