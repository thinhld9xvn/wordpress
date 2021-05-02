<?php 

    namespace Commercants;

    class CommercantGetShopCoordsUtils {

        public static function get_by_id($commercants_coords_list, $id) {

            return $id > 0 ? $commercants_coords_list[$id - 1] : null;

        }

    }