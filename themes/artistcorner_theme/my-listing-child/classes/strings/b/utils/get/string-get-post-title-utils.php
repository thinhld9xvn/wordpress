<?php 

    namespace Strings;

    class StringGetPostTitleUtils {

        public static function get($limit) {

            return short_text( get_the_title(), $limit );


        }

    }