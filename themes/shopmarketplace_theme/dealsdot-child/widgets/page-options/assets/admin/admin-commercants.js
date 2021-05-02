jQuery(function($) {

    //alert(MESSAGE_NOTIFICATIONS['search_label']);

    var gmap_api_key = 'AIzaSyDx2lN1jCuNI4Mlz6E6dOJraPdF_0JjygQ',
        addr_lists = [],
        dtTableInstants = [],
        dtTableOptions = [],
        $tblCommercants = $('#tblCommercants'),
        $tblProductCategories = $('#tblProductCategories'),
        dtDataTableOptions = {
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
            
        },
        commercants_lists_data = [],
        categories_list_data = [],
        rows_selected_uids = [];    

    const row_details_template = `
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
    `;

    async function getCoordAddr(addr) {

        let url = 'https://maps.googleapis.com/maps/api/geocode/json?address={$1}&key={$2}';

        url = url.replace('{$1}', addr)
            .replace('{$2}', gmap_api_key);

        url = encodeURI(url).replace(/%20/g, "+");

        return await $.ajax({
            method: 'GET',
            dataType: 'json',
            url: url
        });

    }

    function showAjax() {

        $('.foot-navigation').addClass('disabled');

        $('.btnGetCoordiates').html("<span>Đang lấy tọa độ </span><span class='spinner show'></span>");

    }

    function hideAjax() {

        $('.foot-navigation').removeClass('disabled');

        $('.btnGetCoordiates').html("Lấy tọa độ");

    }

    function updateGettingCoordatesStatus(i, length) {

        const $recent_update = $('.recent-update');

        $recent_update.addClass('show');

        $recent_update.html(`Getting coordiates from google map (${i}/${length}) ...`);

    }

    async function getCoordiateAsync() {

        //e.preventDefault();

        //showAjax();   

        var coordiates_data = '',
            update_dt = null;       

        const do_getCoordiates = async function(addrLists, i, length) {

            updateGettingCoordatesStatus(i, length);

            const geometa = await getCoordAddr(addrLists[i]);

            //console.log(addrLists[i]);
            //console.log(i);

            sleep(2000).then(v => {

                geometry = geometa.results[0].geometry;

                coordiates_data += 'lat: ' + geometry.location.lat + '\r\nlong: ' + geometry.location.lng + '\r\n';
                coordiates_data += '--- ;;; ---\r\n';

            });


        };

        if (commercants_lists_data.length > 0) {

            //console.log(commercants_lists_data);

            commercants_lists_data.forEach((row, i) => {

                let txtAddr = '',
                    numero = get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.NUMERO),
                    address = get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ADDRESSE),
                    ville = get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.VILLE);

                //console.log(numero + '-' + address + '-' + ville);

                if (numero) {
                    txtAddr += numero + ' ';
                }

                if (address) {
                    txtAddr += address + ' ';
                }

                if (ville) {
                    txtAddr += ville;
                }

                if (txtAddr) {

                    txtAddr += ', france';

                    addr_lists.push(txtAddr);

                }


            });

            const addr_length = addr_lists.length;

            //console.log(addr_length);

            for (let j = 0; j < addr_length; j++) {

                await do_getCoordiates(addr_lists, j, addr_length);

            }

            setTimeout(async function() {

                //console.log('waitting ...');

                update_dt = await $.ajax({

                    method: "POST",
                    url: ajaxurl,
                    data: {
                        action: 'sb_unicorn_commercants_update_coordiates_data',
                        commercants_coords_list: coordiates_data
                    }

                });

            }, 5000);

        }

        return update_dt;


    }

    function onToggleTabItems(e) {

        e.preventDefault();

        $(this).addClass('active')
            .siblings()
            .removeClass('active');

        const index = $(this).index();

        $('.tabbles-nav .tabbles-content:eq(' + index + ')').addClass('show')
            .siblings()
            .removeClass('show');

        setDtInitialize(index, dtDataTableOptions);

    }

    function showAjaxLoadingTable() {

        const $tblWrapper = $('.tabbles-content.show .table-wrapper');

        $tblWrapper.addClass('disabled');
        this.parent().prepend('<span class="spinner show"></span>');

    }

    function hideAjaxLoadingTable() {

        const $tblWrapper = $('.tabbles-content.show .table-wrapper');

        $tblWrapper.removeClass('disabled');

        this.parent().find('.spinner').remove();

    }

    function resetDtInstance(index) {

        if (typeof(dtTableInstants[index]) !== 'undefined' && dtTableInstants[index] !== null) {

            if (dtTableInstants[index].clear) {

                dtTableInstants[index].clear().destroy();

            } else {

                dtTableInstants[index].fnClearTable();
                dtTableInstants[index].fnDestroy();

            }

        }
    }

    function updateCellData(id, cell_index, data) {

        const row_index = commercants_lists_data.findIndex(row => parseInt(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ID)) === id );

        commercants_lists_data[row_index][cell_index] = data;

    }

    function onEditCell(e) {

        const $cell = $(this),
              idx = $cell.index();

        if ( idx === 0 || idx === 1 || idx === 2 ) {           

        }

        else {

            $cell.attr('contenteditable', true);
            $cell.focus();

        }

    }

    /*function onSelectRow(e) {

        e.preventDefault();

        const $checkbox = $(this).find('input[type=checkbox]'),
              $row = $checkbox.closest('tr'),
              checked = $checkbox.prop('checked'); 
              
        $checkbox.prop('checked', checked);
              
        __setStateOfRow($row, checked);        

    }*/

    function onBlurCell(e) {

        const $cell = $(this),
            id_idx = parseInt( DT_COMMERCANTS_COLUMNS.ID_IDX ) + 1,
            id = parseInt( $cell.closest('tr').find('td:nth-child(' + id_idx + ')').text().trim() ),
            cell_index = $cell.index(),
            data = $cell.text().trim();

        $cell.removeAttr('contenteditable');

        updateCellData(id, cell_index, data);

    }

    function onKeyDownOnCell(e) {

        const $cell = $(this);            
 
        if ( e.keyCode === 13 ) {

            e.preventDefault();
            
            $cell.blur();

        }        
        
    }

    function onAddNewStore(e) {

        window.localLoadNewStore = 'true';

        $('#newStoreModal').modal({
            show : true
        });

    }

    function __setStateOfRow($row, checked) {

        if ( checked ) {

            $row.addClass('selected');

        }

        else {

            $row.removeClass('selected');

        }

    }

    function __setStateOfRemoveRowsButton() {

        //console.log(rows_selected_uids);

        if (rows_selected_uids.length) {

            $('#btnRemoveStores').removeClass('none');

        }

        else {

            $('#btnRemoveStores').addClass('none');

        }

    }

    function __saveSelectedRowsUids(row_index, checked) {

        const idx = rows_selected_uids.findIndex(index => index === row_index);
        
        if ( checked ) {

            idx === -1 && rows_selected_uids.push(row_index);

        }

        else {            

            idx !== -1 && rows_selected_uids.splice(idx, 1);

        }

        

    }

    function get_commercants_dt_field(row, field_name) {       
        

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

    function _onSelectRow(e) {

        //e.preventDefault();

        if ( e.target.type === 'checkbox' ) { }

        else {

            const $checkbox = $(this).find('input[type=checkbox]');
            
            $checkbox.length && $checkbox.trigger('click');

        }

    }

    function onSelectRow(e) {

        e.preventDefault();

        const $checkbox = $(this),
              $row = $checkbox.closest('tr'),
              id_idx = parseInt( DT_COMMERCANTS_COLUMNS.ID_IDX ) + 1,
              row_index = parseInt( $row.find('td:nth-child(' + id_idx + ')').text().trim() ),
              checked = $checkbox.prop('checked'); 
              
        $checkbox.prop('checked', checked);
              
        __setStateOfRow($row, checked);  

        __saveSelectedRowsUids(row_index, checked);

        __setStateOfRemoveRowsButton();

        //console.log(rows_selected_uids);

    
    }

    function onRemoveSelectedRows(e) {

        e.preventDefault();

        const dt = dtTableInstants[0],
              $rows = $tblCommercants.find('tbody tr.selected');

        dt.api().rows($rows).remove().draw(false);

        rows_selected_uids.map(id => {

            const index = commercants_lists_data.findIndex(row => parseInt( get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ID) ) === parseInt( id ) );           
          

            if ( index !== -1 ) {

                commercants_lists_data.splice(index, 1);

            }

        });

        rows_selected_uids = [];

        __setStateOfRemoveRowsButton();

    }

    function setDtInitialize(index, dtOptions) {

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

    function setDtAfterAjaxLoad(index, dtSource) {

        const $this = this;

        $tblInst = index === 0 ? $tblCommercants : $tblProductCategories;

        resetDtInstance(index);

        //$tblInst.find('tbody').html(html);

        dtTableOptions[index]['data'] = dtSource;

        setTimeout(function() {

            dtTableInstants[index] = $tblInst.dataTable(dtTableOptions[index]);

            hideAjaxLoadingTable.call($this);

        }, 2000);

    }

    function performImportMerchantExcelFile(file_url) {

        const $this = this;

        showAjaxLoadingTable.call($this);

        $.ajax({

            method: "POST",
            url: ajaxurl,
            data: {

                action: "sb_unicorn_commercants_import_merchant_data",
                file_excel_url: file_url

            }

        }).done(function(data) {

            if (data === 'error') {

                alert('Import error !!!');

            } else {

                commercants_lists_data = JSON.parse(JSON.stringify(data));

                setDtAfterAjaxLoad.call($this, 0, data);

            }

        });

    }

    function performImportCategoriesListFile(file_url) {

        const $this = this;

        showAjaxLoadingTable.call($this);

        $.ajax({

            method: "POST",
            url: ajaxurl,
            data: {

                action: "sb_unicorn_commercants_import_categories_data",
                file_excel_url: file_url

            }

        }).done(function(data) {

            if (data === 'error') {

                alert('Import error !!!');

            } else {

                categories_list_data = JSON.parse(JSON.stringify(data));

                setDtAfterAjaxLoad.call($this, 1, data);

            }

        });

    }

    function modifyRecentUpdate(txtDatetime) {

        const $recent_update = $('.tabbles-nav .tabbles-content.show .recent-update');

        $recent_update.html(`Last update: <span class="time">${txtDatetime}</span>`);

        $recent_update.addClass('show');

    }

    async function performUpdateMerchantData() {

        const $this = this,
            performUpdate = async function() {

                const fd = new FormData();

                fd.append('action', 'sb_unicorn_commercants_update_merchant_data');
                fd.append('commercants_lists', JSON.stringify(commercants_lists_data));

                return await $.ajax({

                    method: "POST",
                    url: ajaxurl,
                    processData: false,
                    contentType: false,
                    data: fd

                });

            }

        if (commercants_lists_data.length > 0) {

            showAjaxLoadingTable.call($this);

            const data = await performUpdate();

            if (data === 'error') {

                alert('Import error !!!');

            } else {

                const coords_data = await getCoordiateAsync();

                if (coords_data !== 'error') {

                    modifyRecentUpdate(data);

                } else {

                    alert('Get coordates error !!!');

                }

            }

            hideAjaxLoadingTable.call($this);

        }

    }

    async function performUpdateCategoriesListData() {

        const $this = this,
            performUpdate = async function() {

                const fd = new FormData();

                fd.append('action', 'sb_unicorn_commercants_update_categories_data');
                fd.append('categories_list', JSON.stringify(categories_list_data));

                return await $.ajax({

                    method: "POST",
                    url: ajaxurl,
                    processData: false,
                    contentType: false,
                    data: fd

                });

            };

        if (categories_list_data.length > 0) {

            showAjaxLoadingTable.call($this);

            const data = await performUpdate();

            if (data === 'error') {

                alert('Import error !!!');

            } else {

                modifyRecentUpdate(data);

            }

            hideAjaxLoadingTable.call($this);

        }

    }

    function onChooseFile(e) {

        const $obj = $(this),
            $field = $obj.prev('input[type=hidden]');

        const uploader = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
                text: 'Use this media'
            },
            multiple: false // Set to true to allow multiple files to be selected
        }).on('select', function() {

            var attachment = uploader.state().get('selection').first().toJSON(),
                url = attachment['url'];

            performImportMerchantExcelFile.call($obj, url);


        }).open();

    }

    function onUpdateShopLists(e) {

        e.preventDefault();

        const $obj = $(this);

        performUpdateMerchantData.call($obj);

    }

    function onChooseCategoriesExcelFile(e) {

        const $obj = $(this),
            $field = $obj.prev('input[type=hidden]');

        const uploader = wp.media({
            title: 'Select or Upload Media Of Your Chosen Persuasion',
            button: {
                text: 'Use this media'
            },
            multiple: false // Set to true to allow multiple files to be selected
        }).on('select', function() {

            var attachment = uploader.state().get('selection').first().toJSON(),
                url = attachment['url'];

            performImportCategoriesListFile.call($obj, url);


        }).open();

    }

    function onUpdateCategoriesExcelLists(e) {

        e.preventDefault();

        const $obj = $(this);

        performUpdateCategoriesListData.call($obj);

    }

    function onChooseThumbnailProduct(e) {

        e.preventDefault();        

        const $item = $(this),

            uploader = wp.media({

                title: "Sélectionnez la photo d'un produit",

                button: {
                    text: 'Choisir le média'
                },

                multiple: false // Set to true to allow multiple files to be selected

            }).on('select', function() {

                var attachment = uploader.state().get('selection').first().toJSON(),
                    url = attachment['url'],
                    idx = $item.index();

                $item.find('.image-thumbnail img').attr('src', url);

                $('.modal.show .txtHidProductGalleries:eq(' + idx + ')').val(url);

                


            }).open();

    }

    function get_email_by_id(id) {

        const data = commercants_lists_data.filter( row => parseInt( get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ID) ) === parseInt( id )  )[0];

        return get_commercants_dt_field(data, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE);

    }

    async function __check_user_email_exist(email) {

        return await $.ajax({

            type : "POST",
            async : true,            
            url : ajaxurl,
            data : {

                action : "sb_unicorn_check_user_email_exist",
                email

            }

        });

    }

    async function onShowStoreDetails(e) {

        e.preventDefault();

        var data_details_form_store = null;

        const __get_data_by_email = async function(email) {

            return await $.ajax({

                type : "POST",
                async: true,
                url : ajaxurl, 
                data : {
                    action : "sb_unicorn_commercants_get_extra_store_data",
                    email
                }

            });

        },       

        __initialize_modal = function() {

            $('#detailsStoreModal').find('#frmDetailsStore').html(data_details_form_store);

            const settings = JSON.parse( JSON.stringify( tinyMCEPreInit.mceInit['txtDescription'] ) );

            settings.selector = '#txtDescription_view';           

            tinyMCE.init(settings);

            $('.js-select2-dropdown-simple').select2({

                dropdownParent: $('.modal.show .modal-body')
    
            });

            window.localLoadAjaxSuccess = 'true';

        },

        __show_loading = function () {

            $('.ajaxLoadingWrapper').addClass('show');

        },

        __hide_loading = function() {

            $('.ajaxLoadingWrapper').removeClass('show');

        }

        __show_loading();
        
        const $row = $(this).closest('tr'), 
               id_idx = parseInt( DT_COMMERCANTS_COLUMNS.ID_IDX ) + 1,             
              id = parseInt( $row.find('td:nth-child(' + id_idx + ')').text().trim() ),
              email = get_email_by_id(id);

        const result = await __check_user_email_exist(email);

        if ( result === 'true' ) {

            data_details_form_store = await _get_details_form_store(email);            

            $('#detailsStoreModal').modal({

                show: true

            }); 

            setTimeout(function() {
            
                __initialize_modal();

                __hide_loading();

            }, 1000);           

        }

        else {

            __hide_loading();

            alert('Sorry, no data in the system !!!');

        }        

    }

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms))
    }

    async function onCreateStoresAccount(e) {

        e.preventDefault();

        const $this = $(this),
              $wrapper = $this.closest('.tabbles-nav'),
              $table_wrapper = $this.closest('.table-wrapper')

        const showAjax = function () {

            $wrapper.addClass('__gap');
            $wrapper.append(`<div class="store-notify">
                                <div><span id="lblAjaxCaption"><span class="msg"></span> <span class="current"></span>/<span class="length"></span></span> ...</div>                                
                            </div>`);

            $table_wrapper.addClass('disabled');

        },

        hideAjax = function() {

            $wrapper.removeClass('__gap');

            $wrapper.find('.store-notify').remove();
            
            $table_wrapper.removeClass('disabled');

        },

        checkDuplicateEmailInList = function() {

            commercants_lists_data.forEach((row, i) => {

                const email = get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE);
    
                const results = commercants_lists_data.filter((_row, k) => get_commercants_dt_field(_row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE) === email && k !== i);
    
                if ( results.length > 0 ) {

                    console.log(email);

                }
    
            })

        },

        performCreateStoreAccount = async function(params) {

            return await $.ajax({

                type : "POST",
                async : true,
                url : ajaxurl,
                data : {
                    action : 'sb_unicorn_create_new_store_account',
                    params
                }

            });

        },

        format_cell = function(data) {

            if ( data && data !== '' && data !== 'non' ) return data;

            return '';

        },        

        callCreateAccTimer = function() {           

            length = dataLists.length;
            current_idx = 0;
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
                            enseigne = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ENSEIGNE)), 
                            secteur_activity = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.SECTEUR_ACTIVITY)),
                            numero = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.NUMERO)),
                            adresse = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ADDRESSE)),
                            code_postal = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.CODE_POSTAL)),
                            ville = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.VILLE)),
                            telephone_commerce = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.TELEPHONE_COMMERCE)),
                            email_commerce = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE)),
                            portable_responsable = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.PORTABLE_RESPONSABLE)),
                            email_responsable =format_cell( get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.EMAIL_RESPONSABLE ) ),
                            site_internet = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.SITE_INTERNET)),
                            page_facebook = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.PAGE_FACEBOOK)),
                            jours_ouverture_hiver = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_HIVER)),
                            horaires_hiver = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.HORAIRES_HIVER)),
                            jours_fermeture_hiver = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_HIVER)),
                            jours_ouverture_ete = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.JOURS_OUVERTURE_ETE)),
                            horaires_ete = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.HORAIRES_ETE)),
                            jours_fermeture_ete = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.JOURS_FERMETURE_ETE)),
                            particularites_horaires = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.PARTICULARITES_HORAIRES)),
                            annuaire = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ANNUAIRE)),
                            masques_recus = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.MASQUES_RESCUS)),
                            bail_saisonnier = format_cell(get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.BAIL_SAISONNIER));

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

                        hideAjax();
    
                    }

                }   
              
    
            }, 100);

        },

        callChecAccExistsTimer = function() {

            length = commercants_lists_data.length;
            current_idx = 0;
            boolNextStep = true;

            $lblAjaxCaption.find('.msg').text('Checking stores account');
            $lblAjaxCaption.find('.length').text(length);
            $lblAjaxCaption.find('.current').text(current_idx);   

            const tmrCheckStore = setInterval(async function() {

                if ( boolNextStep && current_idx < length ) {
    
                    boolNextStep = false;
    
                    const row = commercants_lists_data[current_idx],
                        email = get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.EMAIL_COMMERCE);
    
                    if ( email !== '' && email !== 'non' ) {
                    
                        const result = await __check_user_email_exist(email);  
                        
                        if ( result !== 'true' ) {
    
                            dataLists.push({
                                row,
                                email
                            });
    
                        }                    
    
                    }    
                    
                    current_idx++;
    
                    boolNextStep = true;
    
                    $lblAjaxCaption.find('.current').text(current_idx); 
    
                }
    
                else {
    
                    if ( current_idx >= length ) {
    
                        boolCheckEmailStoreDone = true;
                        
                        clearInterval(tmrCheckStore);
    
                        callCreateAccTimer();
    
                    }
    
                }
    
            }, 100);  

        }

        showAjax();

        var $lblAjaxCaption = $('#lblAjaxCaption'),
              length = 0,
              dataLists = [];         
              
        var current_idx = 0,
            boolNextStep = true; 

        callChecAccExistsTimer();
        

    }

    async function _get_details_form_store(user_email) {

        return await $.ajax({

            type : "POST",
            async : true,
            url : ajaxurl,
            data : {
                action : "sb_unicorn_admin_get_details_form_store",
                email : user_email
            }

        });

    }

    function showAjaxPublishing() { 

        $('#frmDetailsStore').addClass('disabled');
       
        $('.modal.show .field-input.submit').append(`<span class="spinner show"></span>`);
    
    }

    function hideAjaxPublishing() {

        $('.modal.show .field-input.submit').find('.spinner').remove();

        $('#frmDetailsStore').removeClass('disabled');

    }

    function addNewRowOnTable(data) {

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

    function updateRowOnTable(data) {

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
        
        const my_row = commercants_lists_data.filter( row => parseInt( get_commercants_dt_field(row, DT_COMMERCANTS_COLUMNS.ID) ) === parseInt( id )  )[0];

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

    function admin_store_page() {

        const $form = $('.frmAdminStore'),
                $txtPass = $('#txtMotDePasse'),
                $txtRePass = $('#txtEntrerLeMotDePasse'),
                checkValidatePass = function() {

                    const boolValidate = $txtPass.val() === $txtRePass.val();

                    if ( ! boolValidate ) {

                        alert(MESSAGE_NOTIFICATIONS['incorrect_same_password_error_msg']);

                        return false;

                    }

                    return true;

                },
                getFormAction = function() {

                    return $('.modal.show input[type=hidden][name=action]').val();

                },
                resetForm = function(form) {

                    form.reset(); 
                    
                    if ( getFormAction() !== 'update' ) {

                        $('.galleries .item img').attr('src', '');

                    }

                },
                onSubmitForm = function(e) {

                    e.preventDefault(); 
                    
                    const editor_id = $('.modal.show textarea[name="txtDescription"]').attr('id');

                    const $submitted_form = $(this);

                    tinyMCE.get(editor_id).save();

                    showAjaxPublishing();

                    $.ajax({

                        type : "POST",
                        async: true,
                        url : ajaxurl,
                        data : {
                            action : 'sb_unicorn_admin_update_store',
                            params: $submitted_form.serialize()                                
                        }

                    }).done(function(data) {

                        if ( data === 'success' ) {                            

                            resetForm($submitted_form[0]);

                            const form_action = getFormAction();

                            if ( form_action !== 'update' ) {

                                const row_data = {
                                    enseigne : $('.modal.show #slSelectionnezVotreEnseigne').val(),
                                    secteur_activity : '',
                                    numero : '',
                                    adresse : '',
                                    code_postal : $('.modal.show #txtCodePostal').val(),
                                    ville : $('.modal.show #txtVille').val(),
                                    telephone_commerce : $('.modal.show #txtTelephoneCommerce').val(),
                                    email_commerce : $('.modal.show #txtEmailDuResponsable').val(),
                                    portable_responsable : $('.modal.show #txtTelDuResponsable').val(),
                                    email_responsable : $('.modal.show #txtEmailDuResponsable').val(),
                                    site_internet : $('.modal.show #txtSiteWeb').val(),
                                    page_facebook : '',
                                    jours_ouverture_hiver : $('.modal.show #txtJoursOuvertureHiver').val(),
                                    horaires_hiver : $('.modal.show #txtHorairesHiver').val(),
                                    jours_fermeture_hiver : $('.modal.show #txtJoursFermetureHiver').val(),
                                    jours_ouverture_ete : $('.modal.show #txtJoursOvertureEte').val(),
                                    horaires_ete : $('.modal.show #txtHorairesEte').val(),
                                    jours_fermeture_ete : $('.modal.show #txtJoursFermetureEte').val(),
                                    particularites_horaires : $('.modal.show #txtParticularitesHoraires').val(),
                                    annuaire : $(".modal.show #txtTelephoneCommerce").val(),
                                    masques_recus : '',
                                    bail_saisonnier : ''  
                                }

                                addNewRowOnTable(row_data);

                            }

                            alert(MESSAGE_NOTIFICATIONS['ajax_default_success_msg']);

                        }

                        else {

                            alert(MESSAGE_NOTIFICATIONS['ajax_default_error_msg']);

                        }

                        hideAjaxPublishing();

                    });  
                    
                }

        $('.woo-input-box.__checkbox-condition').hide();

        $('input[type=checkbox]').change(function(e) {

            e.preventDefault();

            const $this = $(this), 
                id = $this.data('woo-box-binding'), 
                $woo = $('#' + id),
                field_html = $woo.data('field-html');

            if ( $this.prop('checked') ) {

                $woo.length && $woo.show('fast');

                $woo.find('.field-input')
                    .html(field_html);

            }

            else {

                $woo.length && $woo.hide('fast');

                $woo.find('.field-input')
                    .html('');

            }

        });

        $(`input[type=text][maxlength], 
            textarea[maxlength]`).keydown(function(e) {

            const $this = $(this),
                    maxLength = parseInt( $this.attr('maxlength') ),
                    v = $this.val();
            
            if ( v.length === maxLength ) {

                return false;

            }

        });

        $('.coordinates-toggle').click(function(e) {

            e.preventDefault();

            $(this).siblings('.gts-coordiations').toggle();

        });

        $form.submit(onSubmitForm);           

    }

    $(document).on('click', '.galleries .item', onChooseThumbnailProduct);

    $('.btnGetCoordiates').click(getCoordiateAsync);

    $('.tabbles > a').click(onToggleTabItems);    

    //$('.btnUploadFile').click(onChooseFile);
    $('#btnImportShopLists').click(onChooseFile);
    $('#btnUpdateShopLists').click(onUpdateShopLists);

    $('#btnImportProductCategories').click(onChooseCategoriesExcelFile);
    $('#btnUpdateProductCategories').click(onUpdateCategoriesExcelLists);  

    $('#btnAddNewStore').click(onAddNewStore);

    $('#btnRemoveStores').click(onRemoveSelectedRows);

    $('#btnCreateStoresAcc').click(onCreateStoresAccount);

    //$('.js-select2-dropdown-simple').select2();

    $tblCommercants.on('click', 'tbody td', onEditCell);
    $tblCommercants.on('click', 'tbody td', _onSelectRow);
    //.on('click', 'tbody td', onSelectRow);

    $(document).on('keydown', '#tblCommercants tbody td', onKeyDownOnCell)
               .on('blur', '#tblCommercants tbody td', onBlurCell)        
               .on('change', '#tblCommercants .chkSelectRow', onSelectRow)
               .on('click', '#tblCommercants .btnRowDetails', onShowStoreDetails);

    $('.modal').on('shown.bs.modal', function(e) {

        $('body').css('overflow', 'hidden');

        //const w = $('.js-select2-dropdown-simple').parent().width();

        //console.log(w);

        //$('.js-select2-dropdown-simple').find('> .select2.select2-container').width(w);    

        $('.js-select2-dropdown-simple').select2({

            dropdownParent: $('.modal.show .modal-body')

        });

        $('.modal.show').css('overflow', 'auto');

    });

    $('.modal').on('hidden.bs.modal', function(e) {

        $('body').css('overflow', '');

        if ( window.localLoadNewStore ) {

            delete window.localLoadNewStore;

        }

        if ( window.localLoadAjaxSuccess ) {

            delete window.localLoadAjaxSuccess;

        }

        if ( window.localModalObjects ) {

            delete window.localModalObjects;

        }

    });

    $('#detailsStoreModal').on('hidden.bs.modal', function(e) {

        tinyMCE.get('txtDescription_view').destroy();

        

    });

    $.fn.modal.Constructor.prototype.enforceFocus = function() {};  
    
    if ( __dt_shop_lists.length ) {

        commercants_lists_data = JSON.parse( JSON.stringify( __dt_shop_lists ) );

        //console.log(commercants_lists_data);

    }

    $('.tabbles > a').eq(0).trigger('click');

    admin_store_page();

})