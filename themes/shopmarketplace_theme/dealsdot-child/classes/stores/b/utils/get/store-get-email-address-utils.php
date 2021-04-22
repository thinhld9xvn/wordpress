<?php 

    namespace Stores;

    class StoreGetMetaEmailAddressUtils {

        public static function get_primary($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_EMAIL_ADDRESS_1_FIELD, true);

        }

        public static function get_secondary($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_EMAIL_ADDRESS_2_FIELD, true);

        }

    }