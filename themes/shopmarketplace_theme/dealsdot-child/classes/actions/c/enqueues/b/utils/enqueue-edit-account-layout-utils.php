<?php 

    namespace Actions\Enqueues;

    class EnqueueEditAccountLayoutUtils {

        public static function render() {

            $request_uri = \Strings\StringAddSlashUtils::parse($_SERVER['REQUEST_URI']);  

            if ( FALSE !== strpos( $request_uri, 
                                    \Urls\UrlGetAdminEditAccountPageUtils::get() ) ) :

                wp_enqueue_media();

            endif;

           
        }

    }