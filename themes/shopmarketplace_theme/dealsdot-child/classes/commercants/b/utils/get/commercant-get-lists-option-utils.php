<?php 

    namespace Commercants;

    class CommercantGetListsOptionUtils {

        public static function get() {

            $commercants_list = get_option(_COM_OPTION_NAME);

            //echo $commercants_list; die();

            $commercants_list = is_null( $commercants_list ) || FALSE === $commercants_list ? '' : $commercants_list; 

            return $commercants_list;

        }

    }