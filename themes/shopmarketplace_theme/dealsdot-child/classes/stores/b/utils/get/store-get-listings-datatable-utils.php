<?php 

    namespace Stores;

    class StoreGetListingsDataTableUtils {

        public static function get($idx_start) {

            $user_stores_list = StoreGetListingUtils::get();

            $dt_stores_list = [];

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

                $dt_stores_list[] =  array(

                    "", 
                    "",                        
                    (string) $idx_start,
                    $enseigne,
                    $secteur,
                    $numero,
                    $adresse,
                    $code_postal,
                    $ville,
                    $phone,
                    $email_commerce,
                    $portable_resp,
                    $email_resp,
                    $site_internet,
                    $page_fb,
                    $jours_ouverture_hiver,
                    $horaires_hiver,
                    $jours_fermeture_hiver,
                    $jours_ouverture_ete,
                    $horaires_ete,
                    $jours_fermeture_hiver_ete,
                    $particularites_horaires,
                    $annuaire,
                    $masques_recus,
                    $bail_saisonnier
    
                );

                $idx_start++;


            endforeach;

            return $dt_stores_list;

        }

    }