<?php 

    namespace Stores;

    class StoreGetMetaAddressUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_ADDRESS_FIELD, true);

        }

    }