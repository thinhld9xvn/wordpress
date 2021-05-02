<?php 

    namespace Commercants;

    class CommercantPrintShopInformationUtils {

        public static function print($commercants_list, $id) {   
            
            //print_r($commercants_list);
            
            $messages = \MessageNotification\MessageGetUtils::get_all();

            $shop_data = \Commercants\CommercantGetShopUtils::get_by_id($commercants_list, $id);
          
            $shop_name = $shop_data ? \Strings\StringFormatUtils::format( $shop_data[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE], "lowercase" ) : 
                                        '';

            $shop_address = $shop_data ? \Strings\StringFormatUtils::format( $shop_data[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE], "lowercase" ) : 
                                        '';           

            $shop_brand = $shop_data ? \Strings\StringFormatUtils::format( $shop_data[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY], "lowercase" ) : 
                                        '';

            $stores_list = array();

            if ( $shop_name ) :

                $stores_list = \Stores\StoreGetListingUtils::get_by_metadata(

                    array(
                        'store_meta_key' => \Stores\STORE_FIELDS::STORE_SHOP_NAME_FIELD,
                        'store_meta_value' => $shop_name
                    )

                );	
                
            endif;

            $shop_item = null;		

            if ( count( $stores_list ) > 0 ) :

                $store = $stores_list[0];		

                /*echo "<pre>";
                print_r(get_user_meta($store->ID));*/

                $store_shop_name = \Strings\StringFormatUtils::format( \Stores\StoreGetMetaShopNameUtils::get($store->ID), "lowercase");
                $store_address = \Strings\StringFormatUtils::format( \Stores\StoreGetMetaAddressUtils::get($store->ID), "lowercase");
                $store_brand = \Strings\StringFormatUtils::format( \Stores\StoreGetMetaBrandUtils::get($shop_name), "lowercase");

                //echo $store_address;

                if ( $shop_name === $store_shop_name && 
                        $shop_address === $store_address && 
                            $shop_brand === $store_brand ) :

                    $shop_item = array(

                        \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE => $store_shop_name,

                        \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY => $store_brand,

                        \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE => $store_address,

                        \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE => \Stores\StoreGetMetaPhoneUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE => \Stores\StoreGetMetaSummerOpeningDayUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE => \Stores\StoreGetMetaSummerScheduleUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER => \Stores\StoreGetMetaWinterOpeningDayUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER => \Stores\StoreGetMetaWinterScheduleUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT => \Stores\StoreGetMetaCollectAndClickUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON => \Stores\StoreGetMetaDeliveryUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON => \Stores\StoreGetMetaSpecialDeliveryInfoUtils::get($store->ID),

                        \DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION => \Stores\StoreGetMetaDescriptionUtils::get($store->ID)

                    );

                else :

                    $shop_item = $shop_data;

                endif;

                //echo "<pre>"; print_r($shop_item); die();

            else :

                //$shop_item = CommercantSearchShopUtils::search($commercants_list, $shop_name);
                $shop_item = $shop_data;
                

            endif;
            
            //$shop_item = null;
            /*
                array(
                    'address' => $txtAddr,
                    'phone' => $phone,
                    'secteur' => $secteur,
                    'name' => $enseigne,
                    'code postal' => $code_postal,
                    'email commerce' => $email_commerce,
                    'portable responsable' => $portable_responsable,
                    'email responsable' => $email_responsable,
                    'site internet' => $site_internet,
                    'page facebook' => $page_fb,
                    'jours ouverture hiver' => $jours_ouverture_hiver,
                    'horaires hiver' => $horaires_hiver,
                    'jours fermeture hiver' => $jours_fermeture_hiver,
                    'jours ouverture ete' => $jours_ouverture_ete,
                    'horaires ete' => $horaires_ete,
                    'jours fermeture ete' => $jours_fermeture_ete,
                    'particularites horaires' => $particularites_horaires,
                    'annuaire' => $annuaire,
                    'masques recus' => $masques_recus,
                    'bail saisonnier' => $bail_saisonnier
                )

            */ 
            
            /*echo "<pre>";
            print_r($shop_item);*/ ?>

            <div class="col-wrap">

                <?php if ( ! is_null( $shop_item ) ) :

                        //echo "<pre>"; print_r($shop_item);

                        $secteur = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY] ) || 
                                    $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY] === 'non' ? '' : 
                                    $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY];

                        $address = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE] ) || 
                                        $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE] === 'non' ? '' : 
                                        $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE];

                        $phone = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE] ) || 
                                    $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE] === 'non' ? '' : 
                                    $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE];

                        $jours_ouverture_ete = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE] === 'non' ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE];

                        $horaires_ete = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE] === 'non' ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE];

                        $jours_ouverture_hiver = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER] ) || 
                                                    $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER] === 'non' ? '' : 
                                                    $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER];

                        $horaires_hiver = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER] ) || 
                                            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER] === 'non' ? '' : 
                                            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER]; 

                        $click_and_collect = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT] === 'non' ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT]; 

                        $livraison = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON] === 'non' ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON]; 

                        
                        $precision_livraison = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON] === 'non' ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON]; 
                                                
                        $description = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION] ) || 
                                            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION] === 'non' ? '' : 
                                            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION]; 
                        
                        $commercants_page_url = \Urls\UrlGetCommercantsPageUtils::get() . '?shop_cat=' . urlencode($secteur) . '/';
                        $store_details_page_url = \Urls\UrlGetStoreDetailsPageUtils::get() . urlencode($id) . '/'; ?>

                    <h4 class="brand-co">
                        <a href="<?php echo $store_details_page_url ?>">
                            <?php echo mb_strtoupper( $shop_name, 'UTF-8' ) ?>
                        </a>
                    </h4>

                    <div class="brand-info mtop20">
                    
                        <div class="brand-small-desc secteur-label">

                        <a href="<?= $commercants_page_url ?>">
                                <?php echo $secteur ?>
                            </a>
                            
                        </div>

                        <div class="brand-intro mtop5">
                            <?php echo $address ?>
                        </div>
                        <div class="brand-phone mtop5">
                            <?php echo $phone ?>
                        </div>

                        <?php if ( ! empty( $jours_ouverture_ete ) ) : ?>

                            <div class="brand-open-times mtop20">
                                <p><strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_OPENING_DAY_LABEL_ID] ?>:</strong></p>
                                <p><?php echo $jours_ouverture_ete ?></p>
                            </div>

                        <?php endif; ?>

                        <?php if ( ! empty( $horaires_ete ) ) : ?>

                            <div class="brand-open-times mtop20">
                                <p><strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SUMMER_SCHEDULE_LABEL_ID] ?>:</strong></p>
                                <p><?php echo $horaires_ete ?></p>
                            </div>

                        <?php endif; ?>

                        <?php if ( ! empty( $jours_ouverture_hiver ) ) : ?>

                            <div class="brand-open-times mtop20">
                                <p><strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_OPENING_DAY_LABEL_ID] ?>:</strong></p>
                                <p><?php echo $jours_ouverture_hiver ?></p>
                            </div>

                        <?php endif; ?>

                        <?php if ( ! empty( $horaires_hiver ) ) : ?>

                            <div class="brand-open-times mtop20">
                                <p><strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::WINTER_SCHEDULE_LABEL_ID] ?>:</strong></p>
                                <p><?php echo $horaires_hiver ?></p>
                            </div>

                        <?php endif; ?>		
                    
                    </div>

                <?php endif; ?>

            </div>

        <?php }

        public static function print_extra($commercants_list, $id) {

            //$shop_item = \Commercants\CommercantSearchShopUtils::search($commercants_list, $shop_name);	
            
            $messages = \MessageNotification\MessageGetUtils::get_all();

            $shop_data = \Commercants\CommercantGetShopUtils::get_by_id($commercants_list, $id);

            $shop_name = $shop_data[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE];

            //extract($messages);

            $stores_list = array();

            if ( $shop_name ) :

                $stores_list = \Stores\StoreGetListingUtils::get_by_metadata(

                    array(
                        'store_meta_key' => \Stores\STORE_FIELDS::STORE_SHOP_NAME_FIELD,
                        'store_meta_value' => $shop_name
                    )

                );

            endif;

            $shop_item = null;

            if ( count( $stores_list ) > 0 ) :

                $store = $stores_list[0];

                /*echo "<pre>";
                print_r(get_user_meta($store->ID));*/

                $shop_item = array(		

                    \DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT => \Stores\StoreGetMetaCollectAndClickUtils::get($store->ID),
                    \DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON => \Stores\StoreGetMetaDeliveryUtils::get($store->ID),
                    \DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON => \Stores\StoreGetMetaSpecialDeliveryInfoUtils::get($store->ID),
                    \DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION => \Stores\StoreGetMetaDescriptionUtils::get($store->ID),
                    \DataTables\DT_COMMERCANTS_COLUMNS::VISUELS => \Stores\StoreGetMetaPicturesUtils::get($store->ID)

                );

                //echo "<pre>";print_r($shop_item);

            else :

                $shop_item = $shop_data;

            endif; ?>

            <div class="col-md-6 col-sm-6 col-xs-12 __no-grab">

                <?php if ( ! is_null( $shop_item ) ) :

                        //echo "<pre>"; print_r($shop_item);				

                        $click_and_collect = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT] === 'non' || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT] === '-1' ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::CLICK_AND_COLLECT]; 

                        $livraison = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON] === 'non' || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON] === '-1'  ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::LIVRAISON]; 

                        
                        $precision_livraison = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON] ) || 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON] === 'non' ? '' : 
                                                $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::PRECISION_LIVRAISON]; 
                                                
                        $description = empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION] ) || 
                                            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION] === 'non' ? '' : 
                                            $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::DESCRIPTION]; 
                                                
                    if ( ! empty( $click_and_collect ) ) : ?>

                        <div class="brand-open-times mtop20">
                            <p>
                                <strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::CLICK_AND_COLLECT_LABEL_ID] ?>: </strong>
                                <span><?= $click_and_collect ?></span>
                            </p>
                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $livraison ) ) : ?>

                        <div class="brand-open-times mtop20">
                            <p>
                                <strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_LABEL_ID] ?>: </strong>
                                <span><?= $livraison ?></span>
                            </p>
                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $precision_livraison ) ) : ?>

                        <div class="brand-open-times mtop20">
                            <p>
                                <strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::SPECIAL_DELIVERY_INFO_LABEL_ID] ?>: </strong>								
                            </p>
                            <p>
                                <?= $precision_livraison ?>
                            </p>
                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $description ) ) : ?>

                        <div class="brand-open-times mtop20">
                            <p>
                                <strong><?= $messages[\Theme_Options\THEME_OPTIONS_FIELDS::DESCRIPTION_LABEL_ID] ?>: </strong>								
                            </p>
                            <p>
                                <?= $description ?>
                            </p>
                        </div>

                    <?php endif; 
                
                endif; ?>

            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 __no-grab">

                <?php if ( ! is_null( $shop_item ) && 
                                ! empty( $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::VISUELS] ) ) : 
                                
                    $galleries = $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::VISUELS]; ?>

                    <div class="galleries-store">

                        <?php foreach ( $galleries as $key => $url ) : 
                            
                            if ( $url ) : ?>

                                <a target="__blank" href="<?= $url ?>">
                                    <img src="<?= $url ?>" alt="store pictures">
                                </a>

                        <?php
                            endif;

                        endforeach; ?>

                    </div>

                <?php endif; ?>

            </div>

        <?php }		

    }