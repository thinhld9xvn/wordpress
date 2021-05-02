<?php 

    namespace Strings;

    class StringGetPostExcerptUtils {

        public static function get($limit) {

            return short_text( get_the_excerpt(), $limit );


        }

    }