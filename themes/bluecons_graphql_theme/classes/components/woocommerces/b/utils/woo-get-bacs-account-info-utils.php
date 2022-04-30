<?php 
    namespace WoocommercesUtils;
    class WooGetBacsAccountInfoUtils {
        public static function get() {
            return get_option( 'woocommerce_bacs_accounts');
        }
    }