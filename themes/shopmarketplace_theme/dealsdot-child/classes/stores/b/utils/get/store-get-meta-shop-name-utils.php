<?php 

    namespace Stores;

    class StoreGetMetaShopNameUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SHOP_NAME_FIELD, true);

        }

    }