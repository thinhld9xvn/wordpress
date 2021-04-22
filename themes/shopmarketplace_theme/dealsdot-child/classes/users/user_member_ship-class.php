<?php   

    class UserMemberShip { 
        
        
        
        public static function get_permission($action) {

            switch ($action) :

                case USER_ROLES::CREATE_NEW_STORE_PERMISSION :

                    return current_user_can('administrator');

                    break;

                case USER_ROLES::UPDATE_STORE_DETAILS_PERMISSION :
                case USER_ROLES::VIEW_STORE_PRODUCT_LISTS_PERMISSION:
                case USER_ROLES::PUBLISH_PRODUCT_PERMISSION:

                    return ! current_user_can('administrator');

                    break;

                default:
                
                    break;

            endswitch;

            return false;

        }

        public static function perform_update_store_meta($data, $user_id) {

            extract($data);

            /*echo "<pre>";

            print_r($data); die();*/

            wp_update_user(array(

                'ID' => $user_id,
                'display_name' => $store_display_name,              
                'first_name'  => $store_first_name, 
                'last_name'  => $store_last_name, 
                'user_url'   =>  $store_website

            ));   
            
            //echo var_dump($store_pictures);

           
            update_user_meta( $user_id, STORE_FIELDS::STORE_CIVILITY_FIELD, $store_civility);
            update_user_meta( $user_id, STORE_FIELDS::STORE_MANAGER_PHONE_FIELD, $store_manager_phone);            
            update_user_meta( $user_id, STORE_FIELDS::STORE_SHOP_NAME_FIELD, $store_shop_name);            
            update_user_meta( $user_id, STORE_FIELDS::STORE_MAIN_CATEGORY_FIELD, $store_main_category);  

            update_user_meta( $user_id, STORE_FIELDS::STORE_DESCRIPTION_FIELD, $store_description);             

            update_user_meta( $user_id, STORE_FIELDS::STORE_WINTER_SCHEDULE_FIELD, $store_winter_schedule);    
            update_user_meta( $user_id, STORE_FIELDS::STORE_WINTER_OPENING_DAY_FIELD, $store_winter_opening_day);    
            update_user_meta( $user_id, STORE_FIELDS::STORE_WINTER_CLOSING_DAY_FIELD, $store_winter_closing_day);    
            update_user_meta( $user_id, STORE_FIELDS::STORE_SUMMER_SCHEDULE_FIELD, $store_summer_schedule);
            update_user_meta( $user_id, STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD, $store_click_and_collect);  
            update_user_meta( $user_id, STORE_FIELDS::STORE_SUMMER_OPENING_DAY_FIELD, $store_summer_opening_day);    
            update_user_meta( $user_id, STORE_FIELDS::STORE_SUMMER_CLOSING_DAY_FIELD, $store_summer_closing_day);    
            update_user_meta( $user_id, STORE_FIELDS::STORE_SPECIAL_SCHEDULE_FIELD, $store_special_schedule);    
            update_user_meta( $user_id, STORE_FIELDS::STORE_DELIVERY_FIELD, $store_delivery);    
            update_user_meta( $user_id, STORE_FIELDS::STORE_SPECIAL_DELIVERY_INFO_FIELD, $store_special_delivery_info); 
            update_user_meta( $user_id, STORE_FIELDS::STORE_PICTURES_FIELD, $store_pictures);       
            update_user_meta( $user_id, STORE_FIELDS::STORE_GEOLOCATION_FIELD, $store_geolocation); 
            update_user_meta( $user_id, STORE_FIELDS::STORE_ADDRESS_FIELD, $store_address);
            update_user_meta( $user_id, STORE_FIELDS::STORE_POSTAL_CODE_FIELD, $store_postal_code); 
            update_user_meta( $user_id, STORE_FIELDS::STORE_CITY_FIELD, $store_city); 
            update_user_meta( $user_id, STORE_FIELDS::STORE_EMAIL_ADDRESS_1_FIELD, $store_email_address_1); 
            update_user_meta( $user_id, STORE_FIELDS::STORE_EMAIL_ADDRESS_2_FIELD, $store_email_address_2); 
            update_user_meta( $user_id, STORE_FIELDS::STORE_PHONE_FIELD, $store_phone);              

            if ( $action === 'new' ) :    
                
                /*self::send_email(array(
                    
                    'user_id' => $user_id,
                    'store_civility' => $store_civility,
                    'store_last_name' => $store_last_name,
                    'site_url' => $_SERVER['SERVER_NAME'],
                    'store_email' => $store_email,
                    'action' => 'admin',
                    'cher' => $cher                    

                ));*/

            else :                

                /*self::send_email(array(
                   
                    'store_shop_name' => $store_shop_name,
                    'store_last_name' => $store_last_name,
                    'store_civility' => $store_civility,                  
                    'action' => 'store'                    

                ));*/

            endif;

        }

        public static function create_user($data) {

            extract( $data );
           
            $storedata = array(   
                'user_email'   => $store_email,                
                'user_login' =>  $store_login,               
                'user_pass'  =>  wp_generate_password(),
                'role' => 'editor'
 
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

            extract( $data );

            if ( $action === 'admin' ) :

                $to = $store_email;	
                //$to = 'thinh.luu@digitalunicorn.fr';

                //echo $to; die();

                $token = base64_encode(time());

                $reset_password_url = __unicorn_create_link_reset_password($user_id, $token);

                UserMemberShip::set_store_token($user_id, $token);

                $data = array(

                    'civilite' => $store_civility,
                    'nom' => $store_last_name,
                    'site_url' => $site_url,
                    'user_email' => $store_email,
                    'votre_mot_de_passe' => $reset_password_url,
                    'cher' => $cher

                );

                __unicorn_send_mail_by_admin_action($to, $data);

            else :

                $to = __unicorn_get_admin_email_address();
                //$to = 'thinhld9xvn@gmail.com';

                $url = get_store_details_page_url() . urlencode($store_shop_name);

                if ( $type === 'product' ) :

                    $url = $product_url;

                endif;

                $data = array(

                    'admin_civility' => __unicorn_get_admin_civility(),
                    'admin_last_name' => __unicorn_get_admin_last_name(),
                    'user_civility' => $store_civility,
                    'link_to_store' => $url,
                    'user_last_name' => $store_last_name,
                    'link_toward' => $url,
                    'store_name' => $store_shop_name

                );               

                __unicorn_send_mail_by_store_action($to, $data);

            endif;

        }
        
        public static function change_password($new_password, $uid) {        

            wp_update_user(array(
                 'ID' => $uid,
                 'user_pass' => $new_password
            ));

            //wp_cache_delete($user_id, 'users'); 
 
         }

        
         public static function get_store_civility_meta($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_CIVILITY_FIELD, true);

        }

        public static function get_store_manager_phone_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_MANAGER_PHONE_FIELD, true);

        }

        public static function get_store_shop_name_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_SHOP_NAME_FIELD, true);

        }

        public static function get_store_main_category_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_MAIN_CATEGORY_FIELD, true);

        }

        public static function get_store_description_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_DESCRIPTION_FIELD, true);

        }

        public static function get_store_winter_schedule_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_WINTER_SCHEDULE_FIELD, true);

        }

        public static function get_store_winter_opening_day_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_WINTER_OPENING_DAY_FIELD, true);

        }

        public static function get_store_winter_closing_day_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_WINTER_CLOSING_DAY_FIELD, true);

        }

        public static function get_store_summer_schedule_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_SUMMER_SCHEDULE_FIELD, true);

        }

        public static function get_store_summer_opening_day_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_SUMMER_OPENING_DAY_FIELD, true);

        }

        public static function get_store_summer_closing_day_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_SUMMER_CLOSING_DAY_FIELD, true);

        }

        public static function get_store_special_schedule_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_SPECIAL_SCHEDULE_FIELD, true);

        }

        public static function get_store_collect_and_click_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD, true);

        }

        public static function get_store_delivery_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_DELIVERY_FIELD, true);

        }

        public static function get_store_special_delivery_info_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_SPECIAL_DELIVERY_INFO_FIELD, true);

        }

        public static function get_store_pictures_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_PICTURES_FIELD, true);

        }

        public static function get_store_geolocation_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_GEOLOCATION_FIELD, true);

        }

        public static function get_store_address_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_ADDRESS_FIELD, true);

        }

        public static function get_store_postal_code_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_POSTAL_CODE_FIELD, true);

        }

        public static function get_store_city_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_CITY_FIELD, true);

        }

        public static function get_store_email_address_1_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_EMAIL_ADDRESS_1_FIELD, true);

        }

        public static function get_store_email_address_2_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_EMAIL_ADDRESS_2_FIELD, true);

        }

        public static function get_store_phone_field($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_PHONE_FIELD, true);

        }    

        public static function set_store_token($uid, $token) {

            update_user_meta($uid, STORE_FIELDS::STORE_TOKEN_FIELD, $token);

        }
        
        public static function get_store_token($uid) {

            return get_user_meta($uid, STORE_FIELDS::STORE_TOKEN_FIELD, true);

        }

        public static function get_stores_list() {

            return get_users(

                array(
                    'role' => 'editor'
                )

            );

        }

        public static function get_stores_list_by_metadata($data) {

            extract($data);      
            
            //print_r($data);

            $args = array(

                'role' => 'editor',
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

                    DT_COMMERCANTS_COLUMNS::NUMERO => $numero,
                    DT_COMMERCANTS_COLUMNS::VILLE => $ville,
                    DT_COMMERCANTS_COLUMNS::ADDRESSE => $address,
                    DT_COMMERCANTS_COLUMNS::TELEPHONE_COMMERCE => $phone,
                    DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY => $secteur,
                    DT_COMMERCANTS_COLUMNS::ENSEIGNE => $enseigne,
                    DT_COMMERCANTS_COLUMNS::CODE_POSTAL => $code_postal,
                    DT_COMMERCANTS_COLUMNS::EMAIL_COMMERCE => $email_commerce,
                    DT_COMMERCANTS_COLUMNS::PORTABLE_RESPONSABLE => $portable_responsable,
                    DT_COMMERCANTS_COLUMNS::EMAIL_RESPONSABLE => $email_responsable,
                    DT_COMMERCANTS_COLUMNS::SITE_INTERNET => $site_internet,
                    DT_COMMERCANTS_COLUMNS::PAGE_FACEBOOK => $page_fb,
                    DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_HIVER => $jours_ouverture_hiver,
                    DT_COMMERCANTS_COLUMNS::HORAIRES_HIVER => $horaires_hiver,
                    DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_HIVER => $jours_fermeture_hiver,
                    DT_COMMERCANTS_COLUMNS::JOURS_OUVERTURE_ETE => $jours_ouverture_ete,
                    DT_COMMERCANTS_COLUMNS::HORAIRES_ETE  => $horaires_ete,
                    DT_COMMERCANTS_COLUMNS::JOURS_FERMETURE_ETE => $jours_fermeture_ete,
                    DT_COMMERCANTS_COLUMNS::PARTICULARITES_HORAIRES => $particularites_horaires,
                    DT_COMMERCANTS_COLUMNS::ANNUAIRE => $annuaire,
                    DT_COMMERCANTS_COLUMNS::MASQUES_RESCUS => $masques_recus,
                    DT_COMMERCANTS_COLUMNS::BAIL_SAISONNIER => $bail_saisonnier
    
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