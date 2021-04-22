<?php 

    namespace Actions\Enqueues;

    class EnqueueDashboardEditAccountLayoutUtils {

        public static function render() {

            $request_uri = \Strings\StringAddSlashUtils::parse($_SERVER['REQUEST_URI']);            

            if ( FALSE !== strpos( \Urls\UrlGetAdminEditAccountPageUtils::get(), 
                                        $request_uri ) ) :

                wp_enqueue_media();

                wp_enqueue_script('admin-dashboard-edit-account-jquery', 
                                    get_stylesheet_directory_uri() . '/assets/js/dashboard/accounts/accounts.js');  

            endif;

           
        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
            if ( 'admin-dashboard-edit-account-jquery' !== $handle ) :

                return $tag;

            endif;

            // change the script tag by adding type="module" and return it.
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

            return $tag;

        }

    }