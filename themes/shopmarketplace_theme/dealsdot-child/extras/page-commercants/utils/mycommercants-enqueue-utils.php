<?php 

    namespace MyCommercantsPage;

    class MyCommercantsEnqueueUtils {

        public static function render() {

            wp_localize_script('jquery', 'gmap_api_key', GMAP_API_KEY);

            wp_enqueue_style( 'unicorn-select2-style',
                                '//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css');

            wp_enqueue_script('commercant-google-gmap-js', '//maps.googleapis.com/maps/api/js?key=' . GMAP_API_KEY . '&libraries=geometry,places');

            wp_enqueue_style('unicorn-bootstrap-style-css', PAGE_COMMERCANTS_FRONTEND_DIR_URI . '/bootstrap.min.css');

            wp_enqueue_style('unicorn-fontawesome-style-css', get_template_directory_uri() . '/assets/css/font-awesome.css');

            wp_enqueue_style('unicorn-commercants-datatable-css', '//cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css');

            wp_enqueue_style('unicorn-commercants-stylesheet', PAGE_COMMERCANTS_FRONTEND_DIR_URI . '/commercants.css');

            wp_enqueue_script('unicorn-bootstrap-jquery', PAGE_COMMERCANTS_FRONTEND_DIR_URI . '/bootstrap.min.js');

            wp_enqueue_script('unicorn-commercants-datatable-jquery', '//cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js');

            wp_enqueue_script('unicorn-select2-jquery',
                        '//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js');

            wp_enqueue_script('geolocation-gmap-jquery', THEME_CHILD_DIR_URI . '/assets/js/geolocation-gmap/geolocation-gmap.js');

            wp_enqueue_script('unicorn-commercants-script', PAGE_COMMERCANTS_FRONTEND_DIR_URI . '/commercants/commercants.js');

            wp_enqueue_media();        

        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
           if ( 'unicorn-commercants-script' !== $handle ) :

               return $tag;

           endif;

           // change the script tag by adding type="module" and return it.
           $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

           return $tag;

           

       }

    }