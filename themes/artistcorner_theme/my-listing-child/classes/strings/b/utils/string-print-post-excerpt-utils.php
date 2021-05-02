<?php 

    namespace Strings;

    class StringPrintPostExcerptUtils {

        public static function print($limit) {

            echo strip_tags( excerpt($limit) );


        }

    }