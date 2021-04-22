<?php   

    namespace Users;

    class UserMemberShip { 
        
        public static function get_permission($action) {

            switch ($action) :

                case \Users\USER_ROLES::CREATE_NEW_STORE_PERMISSION :

                    return current_user_can(\Users\USER_ROLES::ADMINISTRATOR_ROLE);

                    break;

                case \Users\USER_ROLES::UPDATE_STORE_DETAILS_PERMISSION :
                case \Users\USER_ROLES::VIEW_STORE_PRODUCT_LISTS_PERMISSION:
                case \Users\USER_ROLES::PUBLISH_PRODUCT_PERMISSION:

                    return ! current_user_can(\Users\USER_ROLES::ADMINISTRATOR_ROLE);

                    break;

                default:
                
                    break;

            endswitch;

            return false;

        }

        public static function perform_update_store_meta($data, $user_id) {

            //extract($data);

            /*echo "<pre>";

            print_r($data); die();*/

            wp_update_user(array(

                \Users\USER_DATA_FIELDS::ID => $user_id,
                \Users\USER_DATA_FIELDS::DISPLAY_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_DISPLAY_NAME],              
                \Users\USER_DATA_FIELDS::FIRST_NAME  => $data[\Stores\STORE_DATA_FIELDS::STORE_FIRST_NAME], 
                \Users\USER_DATA_FIELDS::LAST_NAME  => $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME], 
                \Users\USER_DATA_FIELDS::USER_URL   =>  $data[\Stores\STORE_DATA_FIELDS::STORE_WEBSITE]

            ));   
            
            //echo var_dump($store_pictures);
           
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_CIVILITY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY]);
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_MANAGER_PHONE_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_MANAGER_PHONE]);            
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_SHOP_NAME_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME]);            
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_MAIN_CATEGORY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_MAIN_CATEGORY]);  

            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_DESCRIPTION_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_DESCRIPTION]);             

            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_WINTER_SCHEDULE_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_WINTER_SCHEDULE]);    
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_WINTER_OPENING_DAY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_WINTER_OPENING_DAY]);    
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_WINTER_CLOSING_DAY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_WINTER_CLOSING_DAY]);    
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_SUMMER_SCHEDULE_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_SUMMER_SCHEDULE]);
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_CLICK_AND_COLLECT]);  
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_SUMMER_OPENING_DAY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_SUMMER_OPENING_DAY]);    
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_SUMMER_CLOSING_DAY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_SUMMER_CLOSING_DAY]);    
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_SPECIAL_SCHEDULE_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_SPECIAL_SCHEDULE]);    
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_DELIVERY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_DELIVERY]);    
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_SPECIAL_DELIVERY_INFO_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_SPECIAL_DELIVERY_INFO]); 
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_PICTURES_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_PICTURES]);       
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_GEOLOCATION_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION]); 
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_ADDRESS_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_ADDRESS]);
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_POSTAL_CODE_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_POSTAL_CODE]); 
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_CITY_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_CITY]); 
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_EMAIL_ADDRESS_1_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_1]); 
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_EMAIL_ADDRESS_2_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL_ADDRESS_2]); 
            update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_PHONE_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_PHONE]);              

            if ( $action === \Stores\STORE_DATA::STORE_NEW_ACTION ) :    
                
                self::send_email(array(
                    
                    \Stores\STORE_MAIL_FIELDS::STORE_UID => $user_id,
                    \Stores\STORE_MAIL_FIELDS::STORE_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],
                    \Stores\STORE_MAIL_FIELDS::STORE_LAST_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_SITE_URL => $_SERVER['SERVER_NAME'],
                    \Stores\STORE_MAIL_FIELDS::STORE_EMAIL => $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL],
                    \Stores\STORE_MAIL_FIELDS::STORE_ACTION => \Stores\STORE_MAIL_FIELDS::STORE_ADMIN_ACTION,
                    \Stores\STORE_MAIL_FIELDS::STORE_CHER => $data[\Stores\STORE_DATA_FIELDS::STORE_CHER]              

                ));

            else :                

                self::send_email(array(
                   
                    \Stores\STORE_MAIL_FIELDS::STORE_SHOP_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_LAST_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],                  
                    \Stores\STORE_MAIL_FIELDS::STORE_ACTION => \Stores\STORE_MAIL_FIELDS::STORE_MYSELF_ACTION              

                ));

            endif;

        }

        public static function create_user($data) {

            //extract( $data );
           
            $storedata = array(   
                \Users\USER_DATA_FIELDS::USER_EMAIL   => $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL],                
                \Users\USER_DATA_FIELDS::USER_LOGIN =>  $data[\Stores\STORE_DATA_FIELDS::STORE_LOGIN],               
                \Users\USER_DATA_FIELDS::USER_PASS  =>  wp_generate_password(),
                \Users\USER_DATA_FIELDS::USER_ROLE => \Users\USER_ROLES::EDITOR_ROLE
 
            );
            
            $user_id = wp_insert_user( $storedata );

            if ( is_wp_error( $user_id ) ) return false;  
            
            self::perform_update_store_meta($data, $user_id);           

            return true;            

        }   

        public static function update_user($data, $user_id) {

            self::perform_update_store_meta($data, $user_id);

            return true;

        }

        public static function send_email($data) {

            //extract( $data );

            if ( $action === \Stores\STORE_MAIL_FIELDS::STORE_ADMIN_ACTION ) :

                $to = $store_email;	
                //$to = 'thinh.luu@digitalunicorn.fr';

                //echo $to; die();

                $token = base64_encode(time());

                $reset_password_url = __unicorn_create_link_reset_password($user_id, $token);

                self::set_store_token($user_id, $token);

                $mydata = array(

                    \Stores\STORE_MAIL_FIELDS::STORE_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],
                    \Stores\STORE_MAIL_FIELDS::STORE_NOM =>  $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_SITE_URL => $data[\Stores\STORE_DATA_FIELDS::STORE_WEBSITE],
                    \Stores\STORE_MAIL_FIELDS::STORE_EMAIL => $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL],
                    \Stores\STORE_EMAIL_FIELDS::STORE_VOTRE_MOT_DE_PASSE => $reset_password_url,
                    \Stores\STORE_EMAIL_FIELDS::STORE_CHER => $data[\Stores\STORE_DATA_FIELDS::STORE_CHER]

                );

                __unicorn_send_mail_by_admin_action($to, $mydata);

            else :

                $to = __unicorn_get_admin_email_address();
                //$to = 'thinhld9xvn@gmail.com';

                $url = get_store_details_page_url() . urlencode($store_shop_name);

                if ( $type === 'product' ) :

                    $url = $product_url;

                endif;

                $mydata = array(

                    \Stores\STORE_MAIL_FIELDS::ADMIN_CIVILITY => __unicorn_get_admin_civility(),
                    \Stores\STORE_MAIL_FIELDS::ADMIN_LAST_NAME => __unicorn_get_admin_last_name(),
                    \Stores\STORE_MAIL_FIELDS::USER_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],
                    \Stores\STORE_MAIL_FIELDS::LINK_TO_STORE  => $data[\Stores\STORE_DATA_FIELDS::STORE_WEBSITE],
                    \Stores\STORE_MAIL_FIELDS::USER_LAST_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::LINK_TOWARD => $data[\Stores\STORE_DATA_FIELDS::STORE_WEBSITE],
                    \Stores\STORE_MAIL_FIELDS::STORE_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME]

                );               

                __unicorn_send_mail_by_store_action($to, $mydata);

            endif;

        }
        
        public static function change_password($new_password, $uid) {        

            wp_update_user(array(
                 \Users\USER_DATA_FIELDS::ID => $uid,
                 \Users\USER_DATA_FIELDS::USER_PASS => $new_password
            ));

            //wp_cache_delete($user_id, 'users'); 
 
         }

        
         public static function get_store_civility_meta($uid) {            

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_CIVILITY_FIELD, true);

        }

        public static function get_store_brand_by_shop_name($shop_name) {

            $commercants_list = get_commercants_list();

            $shop_item = __woocomercant_search_shop($commercants_list, $shop_name);

            return $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY];

        }

        public static function get_store_manager_phone_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_MANAGER_PHONE_FIELD, true);

        }

        public static function get_store_shop_name_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SHOP_NAME_FIELD, true);

        }

        public static function get_store_main_category_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_MAIN_CATEGORY_FIELD, true);

        }

        public static function get_store_description_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_DESCRIPTION_FIELD, true);

        }

        public static function get_store_winter_schedule_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_WINTER_SCHEDULE_FIELD, true);

        }

        public static function get_store_winter_opening_day_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_WINTER_OPENING_DAY_FIELD, true);

        }

        public static function get_store_winter_closing_day_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_WINTER_CLOSING_DAY_FIELD, true);

        }

        public static function get_store_summer_schedule_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SUMMER_SCHEDULE_FIELD, true);

        }

        public static function get_store_summer_opening_day_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SUMMER_OPENING_DAY_FIELD, true);

        }

        public static function get_store_summer_closing_day_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SUMMER_CLOSING_DAY_FIELD, true);

        }

        public static function get_store_special_schedule_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SPECIAL_SCHEDULE_FIELD, true);

        }

        public static function get_store_collect_and_click_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD, true);

        }

        public static function get_store_delivery_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_DELIVERY_FIELD, true);

        }

        public static function get_store_special_delivery_info_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SPECIAL_DELIVERY_INFO_FIELD, true);

        }

        public static function get_store_pictures_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_PICTURES_FIELD, true);

        }

        public static function get_store_geolocation_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_GEOLOCATION_FIELD, true);

        }

        public static function get_store_address_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_ADDRESS_FIELD, true);

        }

        public static function get_store_postal_code_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_POSTAL_CODE_FIELD, true);

        }

        public static function get_store_city_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_CITY_FIELD, true);

        }

        public static function get_store_email_address_1_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_EMAIL_ADDRESS_1_FIELD, true);

        }

        public static function get_store_email_address_2_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_EMAIL_ADDRESS_2_FIELD, true);

        }

        public static function get_store_phone_field($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_PHONE_FIELD, true);

        }    

        public static function set_store_token($uid, $token) {

            update_user_meta($uid, \Stores\STORE_FIELDS::STORE_TOKEN_FIELD, $token);

        }
        
        public static function get_store_token($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_TOKEN_FIELD, true);

        }

        public static function get_stores_list() {

            return get_users(

                array(
                    \Users\USER_DATA_FIELDS::USER_ROLE => \Users\USER_ROLES::EDITOR_ROLE
                )

            );

        }

        public static function get_stores_list_by_metadata($data) {

            extract($data);      
            
            //print_r($data);

            $args = array(

                \Users\USER_DATA_FIELDS::USER_ROLE => \Users\USER_ROLES::EDITOR_ROLE,
                'meta_key' => $store_meta_key,
                'meta_value' => $store_meta_value,
                'meta_compare' => 'LIKE'
                
            );

            return get_users($args);

        }

        public static function get_data_stores_list() {

            $user_stores_list = self::get_stores_list();

            $data_stores_list = [];

            foreach( $user_stores_list as $key => $store ) :

                $numero = '';
                $ville = '';
                $address = self::get_store_address_field($store->ID);
                $phone = self::get_store_phone_field($store->ID);
                $secteur = '';           
                $enseigne =  self::get_store_shop_name_field($store->ID);
                $code_postal = self::get_store_postal_code_field($store->ID);    
                $email_commerce = $store->data->user_email;    
                $portable_responsable = self::get_store_phone_field($store->ID);    
                $email_responsable = $store->data->user_email;    
                $site_internet = $store->data->site_url;    
                $page_fb = '';    
                $jours_ouverture_hiver = htmlentities(self::get_store_winter_opening_day_field($store->ID));    
                $horaires_hiver = htmlentities(self::get_store_winter_schedule_field($store->ID));    
                $jours_fermeture_hiver = htmlentities(self::get_store_winter_closing_day_field($store->ID));
                $jours_ouverture_ete = htmlentities(self::get_store_summer_opening_day_field($store->ID));  
                $horaires_ete = htmlentities(self::get_store_summer_schedule_field($store->ID));  
                $jours_fermeture_ete = htmlentities(self::get_store_summer_closing_day_field($store->ID));
                $particularites_horaires = htmlentities(self::get_store_special_schedule_field($store->ID));
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

        public static function get_data_datatable_stores_list($idx_start) {

            $user_stores_list = self::get_stores_list();

            $dt_stores_list = [];

            foreach( $user_stores_list as $key => $store ) :

                $numero = '';
                $ville = '';
                $address = self::get_store_address_field($store->ID);
                $phone = self::get_store_phone_field($store->ID);
                $secteur = '';           
                $enseigne =  self::get_store_shop_name_field($store->ID);
                $code_postal = self::get_store_postal_code_field($store->ID);    
                $email_commerce = $store->data->user_email;    
                $portable_responsable = self::get_store_phone_field($store->ID);    
                $email_responsable = $store->data->user_email;    
                $site_internet = $store->data->site_url;    
                $page_fb = '';    
                $jours_ouverture_hiver = htmlentities(self::get_store_winter_opening_day_field($store->ID));    
                $horaires_hiver = htmlentities(self::get_store_winter_schedule_field($store->ID));    
                $jours_fermeture_hiver = htmlentities(self::get_store_winter_closing_day_field($store->ID));
                $jours_ouverture_ete = htmlentities(self::get_store_summer_opening_day_field($store->ID));  
                $horaires_ete = htmlentities(self::get_store_summer_schedule_field($store->ID));  
                $jours_fermeture_ete = htmlentities(self::get_store_summer_closing_day_field($store->ID));
                $particularites_horaires = htmlentities(self::get_store_special_schedule_field($store->ID));
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