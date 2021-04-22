<?php 

    namespace Commercants;

    class CommercantGetShopUtils {

        public static function get_by_id($commercants_list, $id) {

            $index = $id > 0 ? $id - 1 : 0;

            return $commercants_list[$index] ? $commercants_list[$index] : null;        

        }

    }