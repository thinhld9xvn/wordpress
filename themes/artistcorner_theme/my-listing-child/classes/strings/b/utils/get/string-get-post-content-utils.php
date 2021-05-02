<?php 

    namespace Strings;

    class StringGetPostContentUtils {

        public static function get($limit) {

            return short_text( get_the_content(), $limit );

        }

    }