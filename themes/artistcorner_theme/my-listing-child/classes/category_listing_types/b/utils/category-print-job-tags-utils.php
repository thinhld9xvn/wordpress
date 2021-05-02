<?php

    namespace Category_Listing_Types;

    class CategoryPrintJobTagsUtils {

        public static function print_begin_tag($count) {

            if ( $count === 0 ) :

                CategoryPrintJob2GridTagsUtils::print_begin_tag($count);
    
            elseif( $count === 2 ) :
    
                CategoryPrintJob4GridTagsUtils::print_begin_tag($count);
    
            endif;
    

        }

        public static function print_end_tag($count, $length) {

            if ( $count === 1 || $count === $length - 1 ) :

                CategoryPrintJob2GridTagsUtils::print_end_tag($count, $length);
    
            elseif ( $count === $length - 1 ) :
    
                CategoryPrintJob4GridTagsUtils::print_end_tag($count, $length);
    
            endif;
    

        }

    }