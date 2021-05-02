<?php 

    namespace Strings;

    class StringShortTextUtils {

        public static function short($text, $limit) {

            $chars_text = strlen($text);				
		
            //add ... so the user knows the text is actually longer
            if ($chars_text > $limit) {
    
                $text = mb_substr( $text, 0, $limit, 'UTF-8' );	
                $text = $text . "...";
    
            }
    
            return $text;


        }

    }