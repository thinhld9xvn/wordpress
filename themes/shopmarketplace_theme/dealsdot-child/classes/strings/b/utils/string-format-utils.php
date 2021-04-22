<?php 

    namespace Strings;

    class StringFormatUtils {

        public static function format($s, $format) {

            if ( $format === 'uppercase' ) :

                $s = mb_strtoupper($s, 'UTF-8');
    
            elseif ( $format === 'lowercase' ) :
    
                $s = mb_strtolower($s, 'UTF-8');
    
            endif;
    
            return $s;

        }

    }