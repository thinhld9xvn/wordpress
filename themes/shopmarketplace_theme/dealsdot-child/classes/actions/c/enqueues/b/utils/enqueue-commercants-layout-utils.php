<?php 

    namespace Actions\Enqueues;

    class EnqueueCommercantsLayoutUtils {

        public static function render() {

            //$store_details_url = \Urls\UrlGetStoreDetailsPageUtils::get();

            wp_enqueue_script('commercant-google-gmap-js', 
                                '//maps.googleapis.com/maps/api/js?key=' . GMAP_API_KEY . '&libraries=geometry,places');

            if ( is_page_template(\Page_Templates\PAGE_TEMPLATES::PAGE_COMMERCE_LAYOUT_TEMPLATE) ) :

                //wp_localize_script( 'commercant-gmap-api-variable', 'gmap_api_key', GMAP_API_KEY );

                wp_enqueue_script('commercant-gmap-js', 
                                        get_stylesheet_directory_uri() . '/assets/js/commercants-gmap/commercants-gmap.js');

            endif;

        }

        public static function registerModule($tag, $handle, $src) {

             // if not your script, do nothing and return original $tag
            if ( 'commercant-gmap-js' !== $handle ) :

                return $tag;

            endif;

            // change the script tag by adding type="module" and return it.
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

            return $tag;

            

        }


    }