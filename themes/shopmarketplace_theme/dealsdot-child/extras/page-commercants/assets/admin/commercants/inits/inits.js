export var addr_lists = [];

export var dtTableInstants = [];

export var dtTableOptions = [];

export var dtDataTableOptions = {
    scrollX: true,
    scrollY: "400px",
    scrollCollapse: true,
    oLanguage: {

        sSearch: MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.SEARCH_LABEL_ID],
        oPaginate: {

            sNext : MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.NEXT_LABEL_ID],
            sPrevious : MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.PREVIOUS_LABEL_ID],
                            

        },
        sInfo: `${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.SHOWING_LABEL_ID]} _START_ ${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.TO_LABEL_ID]} _END_ ${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.OF_LABEL_ID]} _TOTAL_ ${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.ENTRIES_LABEL_ID]}`,
        sInfoEmpty: `${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.SHOWING_LABEL_ID]} 0 ${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.TO_LABEL_ID]} 0 ${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.OF_LABEL_ID]} 0 ${MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.ENTRIES_LABEL_ID]}`,
        sEmptyTable: MESSAGE_NOTIFICATIONS[THEME_OPTIONS_FIELDS.EMPTY_DT_MSG_ID]
    
    },
    
};

export var commercants_lists_data = [];

export var categories_list_data = [];

export var rows_selected_uids = [];   

export function setRowsSelectedUids(v) {

    rows_selected_uids = v;

}

export function setCategoriesListData(v) {

    categories_list_data = v;

}

export function setCommercantsListsData(v) {

    commercants_lists_data = v;

}

export function setDtDataTableOptions(v) {

    dtDataTableOptions = v;

}

export function setDtTableOptions(v) {

    dtTableOptions = v;

}

export function setDtTableInstants(v) {

    dtTableInstants = v;

}

export function setAddressLists(v) {

    addr_lists = v;

}

/*const row_details_template = `
<tr class="child-row dt-row-details">
    <td colspan="25">
        <div class="flex flex-wrap flex-algn-center">
            <span class=""><strong>Getting extra information, please wait ...</strong></span>
            <span class="spinner show padLeft5"></span>
        </div>
    </td>
</tr>

`,
row_details_fields_template = `
    <div class="flex flex-wrap">
            <label>ID</label>
            <figcaption>{id}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Civilité</label>
            <figcaption>{Civilite}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Nom du responsable</label>
            <figcaption>{nom_du_responsable}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Prénom du responsable</label>
            <figcaption>{prenom_du_responsable}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Email du responsable</label>
            <figcaption>{email_du_responsable}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Tel du responsable</label>
            <figcaption>{tel_du_responsable}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Catégorie principale</label>
            <figcaption>{categorie_principale}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Description</label>
            <figcaption>{description}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Click &amp; Collect</label>
            <figcaption>{click_and_collect}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Livraison</label>
            <figcaption>{livraison}</figcaption>
        </div>

        <div class="flex flex-wrap">
            <label>Précision livraison</label>
            <figcaption>{précision_livraison}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Visuels</label>
            <figcaption>{visuels}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Géolocalisation</label>
            <figcaption></figcaption>
        </div>
        <div class="flex flex-wrap">
            <label class="padLeft20">Lat</label>
            <figcaption>{lat}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label class="padLeft20">Lng</label>
            <figcaption>{lng}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Email commerce 1</label>
            <figcaption>{email_commerce_1}</figcaption>
        </div>
        <div class="flex flex-wrap">
            <label>Email commerce 2</label>
            <figcaption>{email_commerce_2}</figcaption>
        </div>
`;*/