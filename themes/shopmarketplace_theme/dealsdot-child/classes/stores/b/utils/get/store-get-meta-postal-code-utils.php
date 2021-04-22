<?php 

    namespace Stores;

    class StoreGetMetaPostalCodeUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_POSTAL_CODE_FIELD, true);

        }

    }