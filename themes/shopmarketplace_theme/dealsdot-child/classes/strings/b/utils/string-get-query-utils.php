<?php 

    namespace Strings;

    class StringGetQueryUtils {

        public static function get($param) {

            return trim( urldecode( get_query_var($param) ) );

        }

    }