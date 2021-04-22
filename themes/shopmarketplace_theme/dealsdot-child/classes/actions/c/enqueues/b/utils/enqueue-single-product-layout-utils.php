<?php 

    namespace Actions\Enqueues;

    class EnqueueSingleProductLayoutUtils {

        public static function render() {
            
            if ( is_product() ) :

                wp_enqueue_script('single-product-jquery', 
                                    get_stylesheet_directory_uri() . '/assets/js/products/single-product/single-product.js');  

            endif;
          

        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
            if ( 'single-product-jquery' !== $handle ) :

                return $tag;

            endif;

            // change the script tag by adding type="module" and return it.
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

            return $tag;

        }

    }