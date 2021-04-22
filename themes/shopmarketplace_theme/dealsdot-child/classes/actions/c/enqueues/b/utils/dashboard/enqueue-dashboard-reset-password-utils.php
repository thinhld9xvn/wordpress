<?php 

    namespace Actions\Enqueues;

    class EnqueueDashboardResetPasswordLayoutUtils {

        public static function render() {

            if ( is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_STORE_RESET_PASSWORD_TEMPLATE) ) :              
                
                wp_enqueue_script('dashboard-reset-password-jquery', 
                                    get_stylesheet_directory_uri() . '/assets/js/dashboard/reset-password/reset-password.js');         
    
            endif;          
          

        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
            if ( 'dashboard-reset-password-jquery' !== $handle ) :

                return $tag;

            endif;

            // change the script tag by adding type="module" and return it.
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

            return $tag;

        }

    }