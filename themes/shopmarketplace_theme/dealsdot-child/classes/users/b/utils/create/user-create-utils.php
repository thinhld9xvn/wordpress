<?php 

    namespace Users;

    class UserCreateUtils {

        public static function create($data) {

             //extract( $data );
           
             $storedata = array(   
                \Users\USER_DATA_FIELDS::USER_EMAIL   => $data[\Stores\STORE_DATA_FIELDS::STORE_EMAIL],                
                \Users\USER_DATA_FIELDS::USER_LOGIN =>  $data[\Stores\STORE_DATA_FIELDS::STORE_LOGIN],               
                \Users\USER_DATA_FIELDS::USER_PASS  =>  wp_generate_password(),
                \Users\USER_DATA_FIELDS::USER_ROLE => \Users\USER_ROLES::EDITOR_ROLE
 
            );

            /*echo "<pre>";

            print_r($storedata); die();*/
            
            $user_id = wp_insert_user( $storedata );

            if ( is_wp_error( $user_id ) ) return false;  
            
            UserUpdateMetaUtils::update($data, $user_id);           

            return true;            

        }

    }