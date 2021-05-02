<?php 
    namespace Actions;

    class ActionAdminUpdateStoreUtils {

        public static function perform() {

            global $current_user;

            $params = $_POST['params'];	
            
            $params = \Strings\StringExtractParametersUtils::parse($params);	

            extract($params);

            $categoriesList = \Products\ProductGetCategoriesListUtils::get();
            $category = \Products\ProductSearchCategoryUtils::search_by_id($slCategoriePrincipale, $categoriesList);            

            $store_brand = $category->name;
            
            $first_name = mb_strtolower( $txtPrenomDuResponsable, 'UTF-8' );
            $last_name = mb_strtolower( $txtNomDuResponsable, 'UTF-8' );

            $store_shop_name = '';

            if ( $slSelectionnezVotreEnseigne ) :

                $store_shop_name = $slSelectionnezVotreEnseigne;                

            endif;

            if ( $txtNomDeIenseigne ) :

                $store_shop_name = $txtNomDeIenseigne;

            endif;                
            
    
            $data = array(			
                \Stores\STORE_DATA_FIELDS::STORE_FIRST_NAME => ucfirst( $first_name ),
                \Stores\STORE_DATA_FIELDS::STORE_LAST_NAME => ucfirst( $last_name ),
                \Stores\STORE_DATA_FIELDS::STORE_LOGIN => $first_name . '_' . $last_name,
                \Stores\STORE_DATA_FIELDS::STORE_DISPLAY_NAME => ucfirst( $first_name ) . ' ' . ucfirst( $last_name ),
                \Stores\STORE_DATA_FIELDS::STORE_EMAIL => $txtEmailDuResponsable,
                \Stores\STORE_DATA_FIELDS::STORE_MANAGER_PHONE => $txtTelDuResponsable,
                \Stores\STORE_DATA_FIELDS::STORE_PASSWORD => $txtMotDePasse,
                \Stores\STORE_DATA_FIELDS::STORE_CIVILITY => $slCivility,
                \Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME => $store_shop_name,
                \Stores\STORE_DATA_FIELDS::STORE_MAIN_CATEGORY => $slCategoriePrincipale,
                \Stores\STORE_DATA_FIELDS::STORE_DESCRIPTION => $txtDescription,
                \Stores\STORE_DATA_FIELDS::STORE_WINTER_SCHEDULE => $txtHorairesHiver,
                \Stores\STORE_DATA_FIELDS::STORE_WINTER_OPENING_DAY => $txtJoursOuvertureHiver,
                \Stores\STORE_DATA_FIELDS::STORE_WINTER_CLOSING_DAY => $txtJoursFermetureHiver,
                \Stores\STORE_DATA_FIELDS::STORE_SUMMER_SCHEDULE => $txtHorairesEte,
                \Stores\STORE_DATA_FIELDS::STORE_SUMMER_OPENING_DAY => $txtJoursOvertureEte,
                \Stores\STORE_DATA_FIELDS::STORE_SUMMER_CLOSING_DAY => $txtJoursFermetureEte,
                \Stores\STORE_DATA_FIELDS::STORE_SPECIAL_SCHEDULE => $txtParticularitesHoraires,
                \Stores\STORE_DATA_FIELDS::STORE_CLICK_AND_COLLECT => $slClickCollect,
                \Stores\STORE_DATA_FIELDS::STORE_DELIVERY => $slDelivery,
                \Stores\STORE_DATA_FIELDS::STORE_SPECIAL_DELIVERY_INFO => $txtPrecisionLivraison,
                \Stores\STORE_DATA_FIELDS::STORE_PICTURES => $txtHidStoreGalleries,
                \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION => array(
    
                    \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LOCATION => $txtGmapNearByAutocomplete,
                    \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT => $coord_latitude,
                    \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG => $coord_longitude,
    
                ),
    
                \Stores\STORE_DATA_FIELDS::STORE_ADDRESS => $txtAddresseCommerce,
                \Stores\STORE_DATA_FIELDS::STORE_POSTAL_CODE => $txtCodePostal,
                \Stores\STORE_DATA_FIELDS::STORE_CITY => $txtVille,
                \Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_1 => $txtEmailCommerce1,
                \Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_2 => $txtEmailCommerce2,
                \Stores\STORE_DATA_FIELDS::STORE_PHONE => $txtTelephoneCommerce,
                \Stores\STORE_DATA_FIELDS::STORE_WEBSITE => $txtSiteWeb,
                \Stores\STORE_DATA_FIELDS::STORE_ACTION => $action

            );  
            
            $addr_info = \Strings\StringExtractAddressUtils::parse($txtGmapNearByAutocomplete);
        
    
            if ( $action === \Stores\STORE_DATA::STORE_NEW_ACTION ) :

                /*echo "<pre>";
                print_r($data);*/
    
                $boolResult = \Users\UserCreateUtils::create($data);
                
                //echo var_dump($boolResult);

                if ( $boolResult ) :                    

                    \Commercants\CommercantAppendInfoOptionUtils::append([

                        \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE_IDX => $store_shop_name,
                        \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO_IDX => $addr_info[\Stores\STORE_DATA_FIELDS::STORE_NO_ADDRESS],
                        \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE_IDX => $addr_info[\Stores\STORE_DATA_FIELDS::STORE_STREET_ADDRESS],
                        \DataTables\DT_COMMERCANTS_COLUMNS::VILLE_IDX => $txtVille,
                        \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE_IDX => $txtTelephoneCommerce,
                        \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY_IDX => $store_brand,
                        \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL_IDX => $txtCodePostal,
                        \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE_IDX => $txtEmailCommerce1,
                        \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE_IDX => $txtTelephoneCommerce,
                        \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE_IDX => $txtEmailDuResponsable,
                        \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET_IDX => $txtSiteWeb,
                        \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK_IDX => '',
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER_IDX => $txtJoursOuvertureHiver,
                        \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER_IDX => $txtHorairesHiver,
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER_IDX => $txtJoursFermetureHiver,
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE_IDX => $txtJoursOvertureEte,
                        \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE_IDX => $txtHorairesEte,
                        \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE_IDX => $txtJoursFermetureEte,
                        \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES_IDX => $txtParticularitesHoraires,
                        \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE_IDX => $txtTelDuResponsable,
                        \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS_IDX => '',
                        \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER_IDX => ''                 

                    ]);

                    \Commercants\CommercantAppendCoordsOptionUtils::append([

                        \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT => $coord_latitude,
                        \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG => $coord_longitude

                    ]);

                endif;                
    
            else :
    
                $uid = $user_id ? (int) $user_id : $current_user->ID;	

                $store_shop_name = \Stores\StoreGetMetaShopNameUtils::get($uid);
                
                $result = \Commercants\CommercantEditInfoOptionUtils::edit([
                    
                    \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE => $store_shop_name,
                    \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO => $addr_info[\Stores\STORE_DATA_FIELDS::STORE_NO_ADDRESS],
                    \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE => $addr_info[\Stores\STORE_DATA_FIELDS::STORE_STREET_ADDRESS],
                    \DataTables\DT_COMMERCANTS_COLUMNS::VILLE => $txtVille,
                    \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE => $txtTelephoneCommerce,
                    \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY => $store_brand,
                    \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL => $txtCodePostal,
                    \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE => $txtEmailCommerce1,
                    \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE => $txtTelephoneCommerce,
                    \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE => $txtEmailDuResponsable,
                    \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET => $txtSiteWeb,
                    \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK => '',
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER => $txtJoursOuvertureHiver,
                    \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER => $txtHorairesHiver,
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER => $txtJoursFermetureHiver,
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE => $txtJoursOvertureEte,
                    \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE => $txtHorairesEte,
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE => $txtJoursFermetureEte,
                    \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES => $txtParticularitesHoraires,
                    \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE => $txtTelDuResponsable,
                    \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS => '',
                    \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER => ''                 

                ]);

                $result = \Commercants\CommercantEditCoordsOptionUtils::edit([

                    \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE => $store_shop_name,
                    \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT => $coord_latitude,
                    \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG => $coord_longitude

                ]);
    
                $boolResult = \Users\UserUpdateUtils::update($data, $uid);
               
    
           endif;
    
            if ( ! $boolResult ) :
    
                echo 'error';
    
                die();
    
            endif;		
                    
            echo 'success';
    
            die();

        }

    }