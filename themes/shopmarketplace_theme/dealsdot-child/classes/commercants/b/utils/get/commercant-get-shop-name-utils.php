<?php 

    namespace Commercants;

    class CommercantGetShopNameUtils {

        public static function get_by_pid($pid, $format = 'uppercase') {

            $s = stripslashes( get_post_meta($pid, \Products\PRODUCT_FIELDS::PRODUCT_SHOP_NAME_FIELD, true) );

            //echo $s; die();
            //echo $s;
    
            //$s = trim( str_replace("\"", "'", $s ) );
    
            $s = \Strings\StringFormatUtils::format($s, $format);
    
            return $s;

        }

        public static function get_by_format($shop_name, $format = 'uppercase') {

            $s = trim( stripslashes( $shop_name ) );
    
            //$s = trim( str_replace("\"", "'", $s ) );
    
            $s = \Strings\StringFormatUtils::format($s, $format);
    
            return $s;
    
        }

    }