<?php 

    namespace Strings;

    class StringCompareUtils {

        public static function compare($str1, $str2) {

            $str1 = trim( mb_strtolower( wp_strip_all_tags( $str1 ), 'UTF-8' ) );
            $str2 = trim( mb_strtolower( wp_strip_all_tags( $str2 ), 'UTF-8' ) );
    
            return $str1 === $str2;


        }

    }