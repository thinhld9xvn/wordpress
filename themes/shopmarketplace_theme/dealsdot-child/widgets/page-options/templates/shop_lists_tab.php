<script type="text/javascript">

    var __dt_shop_lists = [];
    
    <?php 
        /*echo "<pre>";
        print_r($commercants_list);*/

        foreach ($commercants_list as $key => $commercant) : 
            
            //print_r($commercant); ?>

        __dt_shop_lists.push([    
           ``,            
           ``,
           `<?php echo $key + 1 ?>`,
           `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE]; ?>`,
           `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::NUMERO]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::VILLE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS]; ?>`,
            `<?php echo $commercant[\DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER]; ?>`

        ]);
      
    <?php endforeach; ?>

</script>

<?php 
    $shop_name_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::SHOP_NAME_LABEL_ID], 'UTF-8');
    $store_brand_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_BRAND_LABEL_ID], 'UTF-8');
    $no_address_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::NO_ADDRESS_LABEL_ID], 'UTF-8');
    $city_label  = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_ID], 'UTF-8');
    $shop_address_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::SHOP_ADDRESS_LABEL_ID], 'UTF-8');
    $code_postal_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_ID], 'UTF-8');
    $store_phone_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_ID], 'UTF-8');
    $store_email_address_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_ID], 'UTF-8');
    $portable_responsable_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::PORTABLE_RESPONSABLE_LABEL_ID], 'UTF-8');
    $email_responsable_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::EMAIL_RESPONSABLE_LABEL_ID], 'UTF-8');
    $site_internet_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::SITE_INTERNET_LABEL_ID], 'UTF-8');
    $page_facebook_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::PAGE_FACEBOOK_LABEL_ID], 'UTF-8');
    $winter_opening_day_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_ID], 'UTF-8');
    $winter_schedule_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_ID], 'UTF-8');
    $winter_closing_day_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_ID], 'UTF-8');
    $summer_opening_day_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_ID], 'UTF-8');
    $summer_schedule_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_ID], 'UTF-8');
    $summer_closing_day_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_ID], 'UTF-8');
    $special_schedule_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_ID], 'UTF-8');
    $annuaire_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::ANNUAIRE_LABEL_ID], 'UTF-8');
    $masques_rescus_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::MASQUES_RESCUS_LABEL_ID], 'UTF-8');
    $bail_saisonnier_label = mb_strtoupper($messages[\Theme_Options\THEME_OPTIONS_FIELDS::BAIL_SAISONNIER_LABEL_ID], 'UTF-8');
?>

<div class="table-wrapper">

    <div class="toolbar">

        <a id="btnRemoveStores" class="button button-default btnRemoveStores none" href="#">
            <span class="fa fa-trash"></span><span class="padLeft5">Remove selected stores</span>
        </a>
        
        <!--<a id="btnCreateStoresAcc" class="button button-default btnCreateStoresAcc" href="#">Create stores account</a>-->
        <a id="btnAddNewStore" class="button button-default btnAddNewStore" href="#"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::ADD_THE_NEW_STORE_LABEL_ID] ?></a>
        <a id="btnImportShopLists" class="button button-primary btnImportShopLists" href="#"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::IMPORT_NEW_MERCHANT_FILE_LABEL_ID] ?></a>

    </div>

    <table id="tblCommercants" class="display" style="width: 100%">

        <thead>

            <tr>            
                <th></th>
                <th></th>
                <th>ID</th>
                <th><?= $shop_name_label ?></th>
                <th><?= $store_brand_label ?></th>
                <th><?= $no_address_label ?></th>
                <th><?= $shop_address_label ?></th>
                <th><?= $code_postal_label ?></th>
                <th><?= $city_label ?></th>						            
                <th><?= $store_phone_label ?></th>
                <th><?= $store_email_address_label ?></th>
                <th><?= $portable_responsable_label ?></th>
                <th><?= $email_responsable_label ?></th>
                <th><?= $site_internet_label ?></th>
                <th><?= $page_facebook_label ?></th>
                <th><?= $winter_opening_day_label ?></th>
                <th><?= $winter_schedule_label ?></th>
                <th><?= $winter_closing_day_label ?></th>
                <th><?= $summer_opening_day_label ?></th>
                <th><?= $summer_schedule_label ?></th>
                <th><?= $summer_closing_day_label ?></th>
                <th><?= $special_schedule_label ?></th>
                <th><?= $annuaire_label ?></th>
                <th><?= $masques_rescus_label ?></th>
                <th><?= $bail_saisonnier_label ?></th>

            </tr>

        </thead>

        <tbody></tbody>
        
    </table>

    <div class="toolbar __foot">

        <div class="update">

            <a id="btnUpdateShopLists" class="button button-default" href="#"><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::UPDATE_LABEL_ID] ?></a>

            <span class="recent-update <?php echo ! empty( $recent_update ) ? 'show' : '' ?>">
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::LAST_UPDATE_LABEL_ID] ?>: <span class="time"><?php echo $recent_update ?></span>
            </span>

        </div>

        <!--<div class="export">

            <a id="btnExportShopLists" class="button button-primary" href="#">Export excel file</a>

        </div>-->

    </div>
    
</div>