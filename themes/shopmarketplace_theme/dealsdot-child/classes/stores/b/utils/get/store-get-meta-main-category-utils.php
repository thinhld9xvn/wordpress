<?php 

    namespace Stores;

    class StoreGetMetaMainCategoryUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_MAIN_CATEGORY_FIELD, true);

        }

    }