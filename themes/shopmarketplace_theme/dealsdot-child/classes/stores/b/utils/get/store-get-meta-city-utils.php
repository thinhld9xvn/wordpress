<?php 

    namespace Stores;

    class StoreGetMetaCityUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_CITY_FIELD, true);


        }

    }