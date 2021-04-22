import { dtTableInstants, commercants_lists_data } from '../../inits/inits.js';

export function addNewRowOnTable(data) {

    const dt = dtTableInstants[0];

        const new_id = commercants_lists_data.length + 1,
              row_data = [
                '',
                '',
                new_id.toString(),
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
            ];

        dt.row.add(row_data).draw(false);

        dt.column( '2:visible' ).order( 'desc' ).draw(false);

        commercants_lists_data.push(row_data);

}