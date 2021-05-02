<?php 

    namespace Urls;

    class UrlPrintAccountLogoutUtils {

        public static function print() {

            echo wp_logout_url( home_url() );
    
        }

    }