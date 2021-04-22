<?php 

    namespace Stores;

    class StoreGetMetaPhoneUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_PHONE_FIELD, true);
        }

    }