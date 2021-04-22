<?php 

    namespace MyCommercantsPage;

    class MyCommercantsCreateNewStoreAccountUtils {

        public static function create() {

            $params = $_POST['params'];             

            //$params = \Strings\StringExtractParametersUtils::parse($params);
    
            extract($params);
    
            $pieces = explode('@', $email_commerce);
            $store_login = $pieces[0];
    
            //echo $store_login; die();
    
            $data = array(	
    
                \Stores\STORE_DATA_FIELDS::STORE_FIRST_NAME => '',
                \Stores\STORE_DATA_FIELDS::STORE_LAST_NAME => '',
                \Stores\STORE_DATA_FIELDS::STORE_LOGIN => $store_login,
                \Stores\STORE_DATA_FIELDS::STORE_DISPLAY_NAME => '',
                \Stores\STORE_DATA_FIELDS::STORE_EMAIL => $email_commerce,
                \Stores\STORE_DATA_FIELDS::STORE_MANAGER_PHONE => $telephone_commerce,			
                \Stores\STORE_DATA_FIELDS::STORE_CIVILITY => '',
                \Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME => $enseigne,
                \Stores\STORE_DATA_FIELDS::STORE_MAIN_CATEGORY => '',
                \Stores\STORE_DATA_FIELDS::STORE_DESCRIPTION => '',
                \Stores\STORE_DATA_FIELDS::STORE_WINTER_SCHEDULE => $horaires_hiver,
                \Stores\STORE_DATA_FIELDS::STORE_WINTER_OPENING_DAY => $jours_ouverture_hiver,
                \Stores\STORE_DATA_FIELDS::STORE_WINTER_CLOSING_DAY => $jours_fermeture_hiver,
                \Stores\STORE_DATA_FIELDS::STORE_SUMMER_SCHEDULE => $horaires_ete,
                \Stores\STORE_DATA_FIELDS::STORE_SUMMER_OPENING_DAY => $jours_ouverture_ete,
                \Stores\STORE_DATA_FIELDS::STORE_SUMMER_CLOSING_DAY => $jours_fermeture_ete,
                \Stores\STORE_DATA_FIELDS::STORE_SPECIAL_SCHEDULE => $particularites_horaires,
                \Stores\STORE_DATA_FIELDS::STORE_CLICK_AND_COLLECT => '',
                \Stores\STORE_DATA_FIELDS::STORE_DELIVERY => '',
                \Stores\STORE_DATA_FIELDS::STORE_SPECIAL_DELIVERY_INFO => '',
                \Stores\STORE_DATA_FIELDS::STORE_PICTURES => '',
                \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION => '',
                \Stores\STORE_DATA_FIELDS::STORE_ADDRESS => $adresse,
                \Stores\STORE_DATA_FIELDS::STORE_POSTAL_CODE => $code_postal,
                \Stores\STORE_DATA_FIELDS::STORE_CITY => $ville,
                \Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_1 => '',
                \Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_2 => '',
                \Stores\STORE_DATA_FIELDS::STORE_PHONE => $telephone_commerce,
                \Stores\STORE_DATA_FIELDS::STORE_WEBSITE => '',
                \Stores\STORE_DATA_FIELDS::STORE_CHER => \Stores\STORE_DATA::STORE_CHER_AUTO,
                \Stores\STORE_DATA_FIELDS::STORE_ACTION => \Stores\STORE_DATA::STORE_NEW_ACTION
    
            );
    
            \Users\UserMemberShip::create_user($data);
    
            echo 'success';
    
            die();
           
        }

    }