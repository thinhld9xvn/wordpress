<?php 

    namespace Actions\Enqueues;

    class EnqueueSearchUtils {

        public static function render() {

            if ( is_search() ) :

                //wp_localize_script( 'commercant-gmap-api-variable', 'gmap_api_key', GMAP_API_KEY );
    
                //wp_enqueue_script('pagination-jquery', get_stylesheet_directory_uri() . '/assets/js/pagination.min.js');
                wp_enqueue_script('search-pagination-js', get_stylesheet_directory_uri() . '/assets/js/search-pagination/search-pagination.js');
    
            endif;

        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
           if ( 'search-pagination-js' !== $handle ) :

               return $tag;

           endif;

           // change the script tag by adding type="module" and return it.
           $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

           return $tag;

           

       }

    }