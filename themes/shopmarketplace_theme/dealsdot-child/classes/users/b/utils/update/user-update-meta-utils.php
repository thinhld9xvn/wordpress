<?php 

    namespace Users;

    class UserUpdateMetaUtils {

        public static function update($data, $user_id) {

            extract($data);

            /*echo "<pre>";
            print_r($data); die();*/

            //echo var_dump($data[\Stores\STORE_DATA_FIELDS::STORE_PICTURES]); die();
                     
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

            if ( $data[\Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME] ) :

                update_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_SHOP_NAME_FIELD, $data[\Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME]); 
            
            endif;

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

            echo var_dump(get_user_meta( $user_id, \Stores\STORE_FIELDS::STORE_PICTURES_FIELD, true )); die();

            /*echo "<pre>";
            print_r($data); die();*/

            if ( $action === \Stores\STORE_DATA::STORE_NEW_ACTION ) :    
                
                UserSendEmailUtils::send(array(
                    
                    \Stores\STORE_MAIL_FIELDS::STORE_UID => $user_id,
                    \Stores\STORE_MAIL_FIELDS::STORE_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],
                    \Stores\STORE_MAIL_FIELDS::STORE_LAST_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_SITE_URL => $_SERVER['SERVER_NAME'],
                    \Stores\STORE_MAIL_FIELDS::STORE_EMAIL => $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL],
                    \Stores\STORE_MAIL_FIELDS::STORE_ACTION => \Stores\STORE_MAIL_FIELDS::STORE_ADMIN_ACTION,
                    \Stores\STORE_MAIL_FIELDS::STORE_CHER => $data[\Stores\STORE_DATA_FIELDS::STORE_CHER]              

                ));

            else :                

                UserSendEmailUtils::send(array(
                   
                    \Stores\STORE_MAIL_FIELDS::STORE_SHOP_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_SHOP_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_LAST_NAME => $data[\Stores\STORE_DATA_FIELDS::STORE_LAST_NAME],
                    \Stores\STORE_MAIL_FIELDS::STORE_CIVILITY => $data[\Stores\STORE_DATA_FIELDS::STORE_CIVILITY],                  
                    \Stores\STORE_MAIL_FIELDS::STORE_ACTION => \Stores\STORE_MAIL_FIELDS::STORE_MYSELF_ACTION              

                ));

            endif;

        }

    }