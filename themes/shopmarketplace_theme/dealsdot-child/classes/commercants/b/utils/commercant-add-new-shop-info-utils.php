<?php 

    namespace Commercants;

    class CommercantAddNewShopInfoUtils {

        public static function add($info) {

            $delimiter = \Stores\STORE_DATA::STORE_DELIMITER;

            $commercants_list = CommercantGetListsOptionUtils::get();

            $pieces = explode($delimiter, $commercants_list);
            $length = sizeof($pieces);

            if ( empty( $pieces[$length - 1] ) || $pieces[$length - 1] === PHP_EOL ) :

                array_pop( $pieces );

            endif;

            $pieces[] = $info;

            $commercants_list = implode($delimiter, $pieces);

            CommercantUpdateListsOptionUtils::update($commercants_list);

        }

    }