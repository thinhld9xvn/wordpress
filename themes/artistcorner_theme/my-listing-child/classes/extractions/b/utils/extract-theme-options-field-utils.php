<?php 

    namespace Extractions;

    class ExtractThemeOptionsFieldUtils {

        public static function extract($field_value) {

            $data = array();

            $pieces = preg_split("/\R/", $field_value);

            foreach( $pieces as $key => $piece ) :

                $s = explode("|", $piece);			

                $value = trim( $s[0] );
                $label = trim( $s[1] );

                $data[$value] = $label;
            
            endforeach;

            return $data;


        }

    }