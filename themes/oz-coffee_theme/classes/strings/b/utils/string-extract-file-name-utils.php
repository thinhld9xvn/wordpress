<?php
    
    namespace Strings;

    class StringExtractFileNameUtils {

        public static function parse($filename) {

            $s = explode('.', $filename);            

            if ( count($s) > 0 ) :
            
                return array(

                    'name' => $s[0],
                    'ext' => $s[1]

                );

            endif;

            return $filename;

        }

    }