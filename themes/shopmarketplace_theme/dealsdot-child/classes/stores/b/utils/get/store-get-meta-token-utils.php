<?php 

    namespace Stores;

    class StoreGetMetaTokenUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_TOKEN_FIELD, true);
        }

    }