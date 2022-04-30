<?php
    
    namespace Strings;

    class StringAddSlashUtils {

        public static function parse($str) {

            if ( '/' !== substr($str, strlen($str) - 1) ) :

                return $str . '/';

            endif;

            return $str;

        }

    }