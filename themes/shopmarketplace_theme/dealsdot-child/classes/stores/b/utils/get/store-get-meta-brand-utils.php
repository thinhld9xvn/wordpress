<?php 

    namespace Stores;

    class StoreGetMetaBrandUtils {

        public static function get($shop_name) {

            $commercants_list = \Commercants\CommercantGetListUtils::get();

            $shop_item = \Commercants\CommercantSearchShopUtils::search($commercants_list, $shop_name);

            return $shop_item[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY];

        }

    }