<?php 

    namespace Actions\Enqueues;

    class EnqueueDashboardStoreLayoutUtils {

        public static function render() {

            if ( is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_DASHBOARD_NEW_STORE_TEMPLATE) || 
                 is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_DASHBOARD_UPDATE_STORE_TEMPLATE) ) :

                wp_enqueue_media();
                
                wp_enqueue_script('geolocation-gmap-jquery', 
                                    get_stylesheet_directory_uri() . '/assets/js/geolocation-gmap.js');         
    
            endif;

            if ( is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_DASHBOARD_STORE_PUBLISH_PRODUCT_TEMPLATE) ) :

                wp_enqueue_script('admin-dashboard-stores-jquery', 
                                    get_stylesheet_directory_uri() . '/assets/js/dashboard/stores/stores.js');  

            endif;
          

        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
            if ( 'admin-dashboard-stores-jquery' !== $handle ) :

                return $tag;

            endif;

            // change the script tag by adding type="module" and return it.
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

            return $tag;

        }

    }