<?php 

    namespace Urls;

    class UrlGetMyAccountPageUtils {

        public static function get() {

           return get_permalink( get_option('woocommerce_myaccount_page_id') );

        }

    }