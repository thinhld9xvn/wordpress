<?php 

    namespace Stores;

    class StoreGetMetaDeliveryUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_DELIVERY_FIELD, true);

        }

    }