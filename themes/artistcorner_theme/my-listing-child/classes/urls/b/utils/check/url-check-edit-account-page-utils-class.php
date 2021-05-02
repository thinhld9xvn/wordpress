<?php 

    namespace Urls;

    class UrlCheckEditAccountPageUtils {

        public static function has() {

            $request_uri = str_format($_SERVER['REQUEST_URI'], 'lowercase');

            return in_array($request_uri, ['/my-account/edit-account', 
                                        '/my-account/edit-account/']);

        }

        public static function in_account() {

            $request_uri = $_SERVER['REQUEST_URI'];

            return 0 === strpos($request_uri, '/my-account/edit-account/?a=account');
            
        }

        public static function in_profile() {

            $request_uri = $_SERVER['REQUEST_URI'];

            return 0 === strpos($request_uri, '/my-account/edit-account/?a=profile');
            
        }

    }