<?php 

    namespace Stores;

    class StorePrintAdminHtmlFieldsUtils {

        public static function print($options) {        

            global $current_user;     
            
            //$is_update_store_page = FALSE !== strpos(\Urls\UrlGetAdminUpdateStorePageUtils::get(), $_SERVER['REQUEST_URI']);
        
            $uid = $options[STORE_OPTIONS_FIELDS::USER_ID] ? (int) $options[STORE_OPTIONS_FIELDS::USER_ID] : 
                                                                        $current_user->ID;              

            $user_data = get_userdata($uid);

            $messages = \MessageNotification\MessageGetUtils::get_all();        
            
            //print_r($current_user);
            /*echo "<pre>";
            print_r(get_user_meta($uid));       */            
            
            $civility = StoreGetMetaCivilityUtils::get($uid);     

            $manager_last_name = ! StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ? 
                                                    $user_data->last_name : 
                                                    '';

            $manager_first_name = ! StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ? 
                                                    $user_data->first_name : 
                                                    '';

            $store_email = ! StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ? 
                                                    $user_data->user_email : 
                                                    '';

            $store_manager_phone = StoreGetMetaManagerPhoneUtils::get($uid);

            $store_shop_name = mb_strtolower( trim( StoreGetMetaShopNameUtils::get($uid) ), 'UTF-8' );

            $store_main_category = (int) StoreGetMetaMainCategoryUtils::get($uid);

            $store_description = StoreGetMetaDescriptionUtils::get($uid);

            $store_winter_schedule = StoreGetMetaWinterScheduleUtils::get($uid);

            $store_winter_opening_day = StoreGetMetaWinterOpeningDayUtils::get($uid);

            $store_winter_closing_day = StoreGetMetaWinterClosingDayUtils::get($uid);

            $store_summer_schedule = StoreGetMetaSummerScheduleUtils::get($uid);

            $store_summer_opening_day = StoreGetMetaSummerOpeningDayUtils::get($uid);

            $store_summer_closing_day = StoreGetMetaSummerClosingDayUtils::get($uid);

            $store_special_schedule = StoreGetMetaSpecialScheduleUtils::get($uid);

            $store_collect_and_click= StoreGetMetaCollectAndClickUtils::get($uid);

            $store_delivery = StoreGetMetaDeliveryUtils::get($uid);

            $store_special_delivery_info = StoreGetMetaSpecialDeliveryInfoUtils::get($uid);

            $store_geolocation = StoreGetMetaGeolocationUtils::get($uid);

            $store_address = StoreGetMetaAddressUtils::get($uid);            

            $store_code_postal = StoreGetMetaPostalCodeUtils::get($uid);

            $store_city = StoreGetMetaCityUtils::get($uid);

            $store_email_address_1 = StoreGetMetaEmailAddressUtils::get_primary($uid);

            $store_email_address_2 = StoreGetMetaEmailAddressUtils::get_secondary($uid);

            $store_phone = StoreGetMetaPhoneUtils::get($uid);

            $store_pictures = StoreGetMetaPicturesUtils::get($uid);

            $store_url = ! StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ? 
                                        $user_data->user_url : 
                                        ''; 
            //echo var_dump($civility);        

            //echo var_dump($store_pictures);
        
            $data_commercants_list = \Commercants\CommercantGetListUtils::get();  
            
            $args = array(

                'taxonomy' => PRODUCT_TAXONOMY,
                'hide_empty' => 0				

            );

            $data_product_categories_list = get_terms($args); ?>

            <script type="text/javascript">

                var store_geolocation = null;

                <?php 
                    if ( $store_geolocation ) : ?>

                        store_geolocation = <?php echo json_encode($store_geolocation) ?>;

                <?php endif; ?>            

            </script>

            <div class="woo-input-box">
                <label>
                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CIVILITY_LABEL_ID] ?> 
                    <strong class="required">(*)</strong> 
                    <small>(Civility)</small>
                </label>

                <div class="field-input">
                    <select id="slCivility" class="form-control" name="slCivility">                   
                        <option value="m." <?php selected($civility, 'm.') ?>>M.</option>
                        <option value="mme" <?php selected($civility, 'mme') ?>>Mme</option>
                        <option value="mlle" <?php selected($civility, 'mlle') ?>>Mlle</option>
                    </select>
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_LAST_NAME_LABEL_ID] ?>
                    <strong class="required">(*)</strong> 
                    <small>(Manager last name)</small>
                </label>

                <div class="field-input">
                    <input type="text" 
                        id="txtNomDuResponsable" 
                        class="form-control" 
                        name="txtNomDuResponsable" 
                        value="<?= $manager_last_name ?>" 
                        maxlength="300"
                        required="" />
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_FIRST_NAME_LABEL_ID] ?>
                    <strong class="required">(*)</strong> 
                    <small>(Manager first name)</small>
                </label>

                <div class="field-input">
                    <input type="text" 
                            id="txtPrenomDuResponsable" 
                            class="form-control" 
                            name="txtPrenomDuResponsable" 
                            value="<?= $manager_first_name ?>" 
                            required="" 
                            maxlength="300" />
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_EMAIL_LABEL_ID] ?>
                    <strong class="required">(*)</strong> 
                    <small>(Manager email)</small></label>

                <div class="field-input">
                    <input type="email" 
                        id="txtEmailDuResponsable" 
                        class="form-control" 
                        name="txtEmailDuResponsable" 
                        value="<?= $store_email ?>" 
                        required="" 
                        maxlength="300"
                        <?php if ( ! StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ) :  ?>

                            readonly="readonly"
                            
                        <?php endif; ?> />
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MANAGER_PHONE_LABEL_ID] ?> 
                    <strong class="required">(*)</strong> 
                    <small>(Manager phone)</small>
                </label>

                <div class="field-input">
                    <input type="tel" 
                            id="txtTelDuResponsable" 
                            class="form-control" 
                            name="txtTelDuResponsable" 
                            value="<?= $store_manager_phone ?>" 
                            pattern="[0-9]{10,11}"
                            required="" />
                    </div>
            </div>

            <?php if ( ! StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ) : ?>

                <!--<div class="woo-input-box">
                    <label>Mot de passe<strong class="required">(*)</strong> <small>(password)</small></label>

                    <div class="field-input">
                        <input type="password" id="txtMotDePasse" 
                                        class="form-control" 
                                        name="txtMotDePasse"
                                        value="" 
                                        required="" 
                                        pattern="(?=.*\d)(?=.*[A-Z]).+" 
                                        minLength="8" />
                    </div>
                </div>

                <div class="woo-input-box">
                    <label>Entrer le mot de passe<strong class="required">(*)</strong> <small>(password)</small></label>

                    <div class="field-input">
                        <input type="password" 
                                id="txtEntrerLeMotDePasse" 
                                class="form-control" 
                                name="txtEntrerLeMotDePasse" 
                                value="" 
                                required=""
                                pattern="(?=.*\d)(?=.*[A-Z]).+" 
                                minLength="8" />
                    </div>
                </div>-->

            <?php endif; ?>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SELECT_YOUR_STORE_LABEL_ID] ?>
                    <strong class="required">(*)</strong> 
                    <small>(Select your store)</small>
                </label>

                <div class="field-input">

                    <select id="slSelectionnezVotreEnseigne" 
                            class="form-control js-select2-dropdown-simple" 
                            name="slSelectionnezVotreEnseigne">

                        <?php 
                            foreach ($data_commercants_list as $key => $shop) : 
                            
                                $value = mb_strtolower( trim( $shop[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE] ), 'UTF-8' ); ?>

                                <option value="<?php echo $value ?>" <?php selected($store_shop_name, $value) ?>>
                                    <?php echo trim( $shop[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE] ); ?>
                                </option>
                                
                        <?php 
                            endforeach; ?>

                    </select>

                    <?php if ( StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ) : ?>

                        <div class="notInLists mtop10">
                        
                            <label class="flex flex-algn-center w-max-content">

                                <input type="checkbox" 
                                    id="chkNotInShopListsName" 
                                    class="form-control"
                                    name="chkNotInShopListsName" 
                                    data-woo-box-binding="woo-nomDeIenseigne-box" 
                                    data-woo-select2-binding="slSelectionnezVotreEnseigne"
                                    value="0"/>

                                <span class="caption padLeft5">
                                    <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_NOT_IN_LIST_MSG_ID] ?>
                                </span>

                            </label>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

            <?php 

                if ( StoreCheckActionUtils::has(STORE_DATA::STORE_NEW_ACTION, $options) ) :

                    $nomDeIenseigneField = '<input type="text" id="txtNomDeIenseigne" class="form-control" name="txtNomDeIenseigne" value="" maxLength="300" required="" />'; ?>

                    <div class="woo-input-box __checkbox-condition" 
                        id="woo-nomDeIenseigne-box"
                        data-field-html="<?= htmlspecialchars($nomDeIenseigneField, ENT_QUOTES) ?>">
                        <label>
                            <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_CUSTOM_NAME_LABEL_ID] ?>
                            <strong class="required">(*)</strong> <small>(Name of the store)</small></label>

                        <div class="field-input">
                            
                        </div>
                    </div>

            <?php endif; ?>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::MAIN_CATEGORY_LABEL_ID] ?>
                    <strong class="required">(*)</strong> 
                    <small>(Main category)</small>
                </label>

                <div class="field-input">

                    <select id="slCategoriePrincipale" 
                            class="form-control js-select2-dropdown-simple" 
                            name="slCategoriePrincipale">

                        <?php 
                            foreach ($data_product_categories_list as $key => $category) : ?>

                                <option value="<?php echo $category->term_id ?>" 
                                        <?php selected($category->term_id, $store_main_category) ?>>

                                    <?php echo ucfirst(trim( $category->name )); ?>

                                </option>
                                
                        <?php 
                            endforeach; ?>

                    </select>

                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_ID] ?></label>

                <div class="field-input">
                    <?php

                        if ( $options['method'] !== 'ajax' ) :

                            $settings = array('wpautop' => true, 
                                                'media_buttons' => false, 
                                                'teeny' => true,
                                                'quicktags' => true, 
                                                'textarea_rows' => '5', 
                                                'textarea_id' => 'txtDescription',
                                                'textarea_name' => 'txtDescription' );

                            wp_editor( wp_kses_post($store_description , ENT_QUOTES, 'UTF-8'), 
                                        'txtDescription', 
                                        $settings);
                                        
                        else : ?>

                            <textarea id="txtDescription_view" name="txtDescription"><?= $store_description ?></textarea>
                        
                        <?php endif; ?>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_ID] ?><small>(winter schedule)</small></label>

                <div class="field-input">
                    <textarea id="txtHorairesHiver" 
                            class="form-control" 
                            rows="3" 
                            name="txtHorairesHiver" 
                            maxLength="300"><?= $store_winter_schedule ?></textarea>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_ID] ?><small>(winter opening days)</small></label>

                <div class="field-input">
                    <textarea id="txtJoursOuvertureHiver" 
                                class="form-control" 
                                rows="3" 
                                name="txtJoursOuvertureHiver" 
                                maxLength="300"><?= $store_winter_opening_day ?></textarea>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_CLOSING_DAY_LABEL_ID] ?><small>(winter closing days)</small></label>

                <div class="field-input">
                    <textarea id="txtJoursFermetureHiver" 
                                class="form-control" 
                                rows="3" 
                                name="txtJoursFermetureHiver" 
                                maxLength="300"><?= $store_winter_closing_day ?></textarea>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_ID] ?><small>(summer schedules)</small></label>

                <div class="field-input">
                    <textarea id="txtHorairesEte" 
                                class="form-control" 
                                rows="3" 
                                name="txtHorairesEte" 
                                maxLength="300"><?= $store_summer_schedule ?></textarea>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_ID] ?><small>(summer opening day)</small></label>

                <div class="field-input">
                    <textarea id="txtJoursOvertureEte" 
                                class="form-control" 
                                rows="3" 
                                name="txtJoursOvertureEte"  
                                maxLength="300"><?= $store_summer_opening_day ?></textarea>
                </div>                               
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_CLOSING_DAY_LABEL_ID] ?><small>(summer closing day)</small></label>

                <div class="field-input">
                    <textarea id="txtJoursFermetureEte" 
                                class="form-control" 
                                rows="3" 
                                name="txtJoursFermetureEte" 
                                maxLength="300"><?= $store_summer_closing_day ?></textarea>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_SCHEDULE_LABEL_ID] ?><small>(special schedule)</small></label>

                <div class="field-input">
                    <textarea id="txtParticularitesHoraires" 
                                class="form-control" 
                                rows="3" 
                                name="txtParticularitesHoraires" 
                                maxLength="300"><?= $store_special_schedule ?></textarea>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_ID] ?></label>

                <div class="field-input">
                    <select id="slClickCollect" name="slClickCollect" class="form-control">
                        <option value="-1" <?php selected($store_collect_and_click, '-1') ?>></option>
                        <option value="<?= \Stores\STORE_DATA::YES_VALUE ?>" <?php selected($store_collect_and_click, \Stores\STORE_DATA::YES_VALUE) ?>>Oui</option>
                        <option value="<?= \Stores\STORE_DATA::NO_VALUE ?>" <?php selected($store_collect_and_click, \Stores\STORE_DATA::NO_VALUE) ?>>Non</option>
                    </select>
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_ID] ?><small>(delivery)</small> </label>

                <div class="field-input">
                    <select id="slDelivery" name="slDelivery" class="form-control">
                        <option value="-1" <?php selected($store_delivery, '-1') ?>></option>
                        <option value="<?= \Stores\STORE_DATA::YES_VALUE ?>" <?php selected($store_delivery, \Stores\STORE_DATA::YES_VALUE ) ?>>Oui</option>
                        <option value="<?= \Stores\STORE_DATA::NO_VALUE ?>" <?php selected($store_delivery, \Stores\STORE_DATA::NO_VALUE) ?>>Non</option>
                    </select>
                </div>
            </div>

            <div class="woo-input-box">

                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_ID] ?>
                    <small>(special delivery info)</small>
                </label>

                <div class="field-input">
                    <input type="text" 
                            id="txtPrecisionLivraison" 
                            class="form-control"
                            value="<?= $store_special_delivery_info ?>"
                            name="txtPrecisionLivraison" 
                            maxLength="300" 
                            />
                </div>
            </div>

            <div class="woo-input-box">

                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::PICTURES_LABEL_ID] ?><small>(pictures)</small> </label>

                <div class="field-input">

                    <div class="galleries flex flex-wrap flex-algn-center flex-just-space">

                        <?php for ( $i = 0; $i < 5; $i++ ) : 
                            
                            if ( is_array( $store_pictures ) && 
                                    array_key_exists($i, $store_pictures) ) :

                                $thumbnail = $store_pictures[$i];
                            
                            endif; ?>

                            <div class="item">

                                <div class="image-thumbnail flex flex-algn-center">
                                    <img src="<?= $thumbnail ?>" alt="">
                                </div>

                                <div class="add-image">
                                    <span class="fa fa-plus"></span>
                                </div>

                                <div class="overlay"></div>

                                <input class="txtHidProductGalleries txtHidStoreGalleries"  
                                        type="hidden" 
                                        name="txtHidStoreGalleries[]" 
                                        value="<?= $thumbnail ?>" />

                            </div>

                        <?php endfor; ?>
                    

                    </div>

                </div>

            </div>

            
            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::GEOLOCATION_LABEL_ID] ?><strong class="required">(*)</strong>
                    <small>(Geolocation)</small>
                </label>
                <div class="field-input">
                    <div id="gmap-nearby">
                        <div class="search-autocomplete">
                            <input type="text" 
                                    class="" 
                                    id="txtGmapNearByAutocomplete" 
                                    name="txtGmapNearByAutocomplete" 
                                    placeholder="e.g. London"
                                    value="<?= $store_geolocation['location'] ?>" 
                                    autocomplete="off"
                                    required=""
                                    />
                            <span class="fa fa-street-view gts-location"></span>
                        </div>
                        <div class="pin-coordiations">
                            <label class="coordinates-toggle">Enter coordinates maually</label>
                            <div class="gts-coordiations flex mtop10">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Latitude</label>
                                    <input type="text" 
                                            id="coord-latitude" 
                                            name="coord_latitude" 
                                            value="<?= $store_geolocation['lat'] ?>" 
                                            pattern="[0-9\.\-]+" 
                                            required="" />
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label>Longitude</label>
                                    <input type="text" 
                                            id="coord-longitude" 
                                            name="coord_longitude" 
                                            value="<?= $store_geolocation['lng'] ?>" 
                                            pattern="[0-9\.\-]+" 
                                            required="" />
                                </div>
                            </div>
                        </div>
                        <div class="mtop20">
                            <div class="gmap" id="gmap"></div>
                        </div>
                    </div>

                </div>            
            </div>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_ADDRESS_LABEL_ID] ?><strong class="required">(*)</strong>
                    <small>(Store address)</small>
                </label>

                <div class="field-input">
                    <input type="text" 
                            class="form-control" 
                            name="txtAddresseCommerce" 
                            id="txtAddresseCommerce" 
                            value="<?= $store_address ?>"  
                            maxLength="300"/>
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::POSTAL_CODE_LABEL_ID] ?><strong class="required">(*)</strong>
                    <small>(Postal code)</small>
                </label>

                <div class="field-input">
                    <input type="text" 
                            class="form-control" 
                            name="txtCodePostal" 
                            id="txtCodePostal" 
                            value="<?= $store_code_postal ?>" 
                            pattern="[0-9]{,5}" />
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CITY_LABEL_ID] ?><strong class="required">(*)</strong>
                    <small>(City)</small>
                </label>

                <div class="field-input">
                    <input type="text" 
                            class="form-control" 
                            name="txtVille" 
                            id="txtVille" 
                            value="<?= $store_city ?>"  
                            maxLength="300"/>
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_ID] ?> 1<strong class="required">(*)</strong>
                    <small>(store email address 1)</small>
                </label>

                <div class="field-input">
                    <input type="email" 
                            class="form-control" 
                            name="txtEmailCommerce1" 
                            id="txtEmailCommerce1" 
                            value="<?= $store_email_address_1 ?>" 
                            required/>
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_EMAIL_ADDRESS_LABEL_ID] ?> 2
                    <small>(store email address 2)</small>
                </label>

                <div class="field-input">
                    <input type="email" 
                            class="form-control" 
                            name="txtEmailCommerce2" 
                            id="txtEmailCommerce2" 
                            value="<?= $store_email_address_2 ?>"/>
                </div>
            </div>

            <div class="woo-input-box">
                <label>
                <?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::STORE_PHONE_LABEL_ID] ?> <strong class="required">(*)</strong>
                    <small>(store phone)</small>
                </label>

                <div class="field-input">
                    <input type="text" 
                            class="form-control" 
                            name="txtTelephoneCommerce" 
                            id="txtTelephoneCommerce" 
                            pattern="[0-9]{10,11}" 
                            value="<?= $store_phone ?>" 
                            required />
                </div>
            </div>

            <div class="woo-input-box">
                <label><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SITE_WEB_LABEL_ID] ?> </label>

                <div class="field-input">
                    <input type="url" 
                            class="form-control" 
                            name="txtSiteWeb" 
                            id="txtSiteWeb" 
                            value="<?= $store_url ?>" />
                </div>
            </div>

            <div class="woo-input-box submit">

                <div class="field-input submit">
                    <button class="btn btn-primary"><?= $options[STORE_OPTIONS_FIELDS::FORM_SUBMIT] ?></button>
                </div>
            </div>   

            <?php if ( StoreCheckActionUtils::has(STORE_DATA::STORE_UPDATE_ACTION, $options) ) : ?>
            
                <input type="hidden" 
                        name="user_id" 
                        value="<?= $uid ?>" />

            <?php endif; ?>

            <input type="hidden" 
                        name="action" 
                        value="<?= $options[STORE_OPTIONS_FIELDS::FORM_ACTION] ?>" />          
        
    <?php }

    }