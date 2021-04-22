<?php 

    namespace Stores;

    class StoreGetMetaManagerPhoneUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_MANAGER_PHONE_FIELD, true);

        }

    }