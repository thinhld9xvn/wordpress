<?php 

    namespace Strings;

    class StringFormatUtils {

        public static function format($s, $format) {

            return $format === 'lowercase' ? mb_strtolower($s, 'utf-8') : mb_strtoupper($s, 'utf-8');


        }

    }