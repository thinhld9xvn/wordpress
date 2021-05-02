<?php 

    namespace Urls;

    class UrlCheckViewProfilePageUtils {

        public static function has() {

            $request_uri = $_SERVER['REQUEST_URI'];
    
            return 0 === strpos($request_uri, '/my-account/view-profile');
    
        }

    }