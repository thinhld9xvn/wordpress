<?php 

    namespace Extractions;

    class ExtractParamsFormSerializedUtils {

        public static function extract($params) {

            $data = array();

            parse_str($params, $data);
    
            return $data;


        }

    }