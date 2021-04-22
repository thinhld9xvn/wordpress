<?php 

    namespace Stores;

    class StoreGetMetaSpecialDeliveryInfoUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SPECIAL_DELIVERY_INFO_FIELD, true);
        }

    }