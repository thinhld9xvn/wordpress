<?php 

    namespace Stores;

    class StoreGetListingUtils {

        public static function get() {

            return get_users(

                array(
                    \Users\USER_DATA_FIELDS::USER_ROLE => \Users\USER_ROLES::EDITOR_ROLE
                )

            );
        }

        public static function get_by_metadata($data) {

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

    }