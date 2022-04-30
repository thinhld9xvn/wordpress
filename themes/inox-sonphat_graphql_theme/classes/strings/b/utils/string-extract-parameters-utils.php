<?php
    
    namespace Strings;

    class StringExtractParametersUtils {

        public static function parse($params) {

            $data = array();

            parse_str($params, $data);

            return $data;

        }

    }