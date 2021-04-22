<?php 

    namespace Stores;

    class StoreGetMetaCivilityUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_CIVILITY_FIELD, true);

        }

    }