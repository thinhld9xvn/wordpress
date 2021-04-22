<?php 

    namespace Stores;

    class StoreGetListingsDataUtils {

        public static function get() {

            $user_stores_list = StoreGetListingUtils::get();

            $data_stores_list = [];

            foreach( $user_stores_list as $key => $store ) :

                $numero = '';
                $ville = '';

                $address = StoreGetMetaAddressUtils::get($store->ID);

                $phone = StoreGetMetaPhoneUtils::get($store->ID);

                $secteur = '';           

                $enseigne =  StoreGetMetaShopNameUtils::get($store->ID);

                $code_postal = StoreGetMetaPostalCodeUtils::get($store->ID);  

                $email_commerce = $store->data->user_email;    

                $portable_responsable = StoreGetMetaPhoneUtils::get($store->ID);  

                $email_responsable = $store->data->user_email;    
                $site_internet = $store->data->site_url;    
                $page_fb = '';    

                $jours_ouverture_hiver = htmlentities(StoreGetMetaWinterOpeningDayUtils::get($store->ID));   

                $horaires_hiver = htmlentities(StoreGetMetaWinterScheduleUtils::get($store->ID));    

                $jours_fermeture_hiver = htmlentities(StoreGetMetaWinterClosingDayUtils::get($store->ID));

                $jours_ouverture_ete = htmlentities(StoreGetMetaSummerOpeningDayUtils::get($store->ID));  

                $horaires_ete = htmlentities(StoreGetMetaSummerScheduleUtils::get($store->ID));  

                $jours_fermeture_ete = htmlentities(StoreGetMetaSummerClosingDayUtils::get($store->ID));

                $particularites_horaires = htmlentities(StoreGetMetaSpecialScheduleUtils::get($store->ID));
                
                $annuaire = '';
                $masques_recus = '';
                $bail_saisonnier = '';   

                $data_stores_list[] =  array(

                    \DataTables\DT_COMMERCANTS_COLUMNS::NUMERO => $numero,
                    \DataTables\DT_COMMERCANTS_COLUMNS::VILLE => $ville,
                    \DataTables\DT_COMMERCANTS_COLUMNS::ADDRESSE => $address,
                    \DataTables\DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE => $phone,
                    \DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY => $secteur,
                    \DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE => $enseigne,
                    \DataTables\DT_COMMERCANTS_COLUMNS::CODE_POSTAL => $code_postal,
                    \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE => $email_commerce,
                    \DataTables\DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE => $portable_responsable,
                    \DataTables\DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE => $email_responsable,
                    \DataTables\DT_COMMERCANTS_COLUMNS::SITE_INTERNET => $site_internet,
                    \DataTables\DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK => $page_fb,
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER => $jours_ouverture_hiver,
                    \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER => $horaires_hiver,
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER => $jours_fermeture_hiver,
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE => $jours_ouverture_ete,
                    \DataTables\DT_COMMERCANTS_COLUMNS::HORAIRES_ETE  => $horaires_ete,
                    \DataTables\DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE => $jours_fermeture_ete,
                    \DataTables\DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES => $particularites_horaires,
                    \DataTables\DT_COMMERCANTS_COLUMNS::ANNUAIRE => $annuaire,
                    \DataTables\DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS => $masques_recus,
                    \DataTables\DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER => $bail_saisonnier
    
                );

            endforeach;  
            
            return $data_stores_list;

        }

    }