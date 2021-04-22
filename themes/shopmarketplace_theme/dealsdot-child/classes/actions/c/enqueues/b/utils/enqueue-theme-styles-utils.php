<?php 

    namespace Actions\Enqueues;

    class EnqueueThemeStylesUtils {

        public static function render() {

            wp_enqueue_style( 'parent-style' , get_template_directory_uri() . '/style.css' );

            wp_enqueue_style( 'dealsdot-child-style',
                get_stylesheet_directory_uri() . '/style.css',
                array( 'dealsdot-style' ),
                wp_get_theme()->get('Version')
            );

            wp_enqueue_style( 'dealsdot-jquery-ui-style',
            get_stylesheet_directory_uri() . '/assets/jquery-ui/jquery-ui.css',
                array( 'dealsdot-style' ),
                wp_get_theme()->get('Version')
            );

            wp_enqueue_script('dealsdot-jquery-ui',
                                get_stylesheet_directory_uri() . '/assets/jquery-ui/jquery-ui.js',
                            array('jquery'),
                            wp_get_theme()->get('Version')
                        );

            wp_enqueue_script('dealsdot-customize-jquery',
                            get_stylesheet_directory_uri() . '/assets/js/customizer/customizer.js',
                            array('jquery'),
                            wp_get_theme()->get('Version')
                        );

            wp_enqueue_style( 'dealsdot-select2-style',
            '//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css',
                array( 'dealsdot-style' ),
                wp_get_theme()->get('Version')
            );

            wp_enqueue_script('dealsdot-select2-jquery',
                            '//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js',
                            array('jquery'),
                            wp_get_theme()->get('Version')
                        );

            
           

        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
           if ( 'dealsdot-customize-jquery' !== $handle ) :

               return $tag;

           endif;

           // change the script tag by adding type="module" and return it.
           $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

           return $tag;

           

       }

    }