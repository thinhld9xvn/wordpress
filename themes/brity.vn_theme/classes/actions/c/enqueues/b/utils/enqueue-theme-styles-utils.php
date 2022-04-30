<?php 

    namespace Actions\Enqueues;

    class EnqueueThemeStylesUtils {

        public static function render() { 

            wp_enqueue_style("bootstrap-stylesheet", THEME_CSS_DIR_URI . "/bootstrap.min.css", array(), THEME_VERSION);
            wp_enqueue_style("animate-stylesheet", THEME_CSS_DIR_URI . "/animate.css", array(), THEME_VERSION);
            wp_enqueue_style("meanmenu-stylesheet", THEME_CSS_DIR_URI . "/meanmenu.css", array(), THEME_VERSION);
            wp_enqueue_style("owl-carousel-stylesheet", THEME_CSS_DIR_URI . "/owl.carousel.min.css", array(), THEME_VERSION);
            wp_enqueue_style("fontawesome-stylesheet", THEME_CSS_DIR_URI . "/font-awesome.min.css", array(), THEME_VERSION);
            wp_enqueue_style("slick-stylesheet", THEME_CSS_DIR_URI . "/slick.css", array(), THEME_VERSION);
            wp_enqueue_style("main-style-stylesheet", THEME_CSS_DIR_URI . "/style.css", array(), THEME_VERSION);
            wp_enqueue_style("responsive-stylesheet", THEME_CSS_DIR_URI . "/responsive.css", array(), THEME_VERSION);

         	wp_enqueue_script('jquery-modernizr-3.5.0', THEME_JS_DIR_URI . '/vendor/modernizr-3.5.0.min.js', array(), THEME_VERSION);

            wp_enqueue_script('jquery-main', THEME_JS_DIR_URI . '/vendor/jquery-3.2.1.min.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-popper', THEME_JS_DIR_URI . '/popper.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-bootstrap', THEME_JS_DIR_URI . '/bootstrap.min.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-meanmenu', THEME_JS_DIR_URI . '/jquery.meanmenu.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-ajax-mail', THEME_JS_DIR_URI . '/ajax-mail.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-owl-carousel', THEME_JS_DIR_URI . '/owl.carousel.min.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-countdown', THEME_JS_DIR_URI . '/jquery.countdown.min.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-plugins', THEME_JS_DIR_URI . '/plugins.js', array(), THEME_VERSION, true);
            wp_enqueue_script('jquery-main', THEME_JS_DIR_URI . '/main.js', array(), THEME_VERSION, true);
           

        }

        public static function adminPanelRender() {            
            
            wp_enqueue_style("main-admin-stylesheet", 
                                THEME_CSS_DIR_URI . "/admin.css", 
                                array(), 
                                THEME_VERSION);

            wp_enqueue_script('jquery-customizer', 
                                THEME_JS_DIR_URI . '/admin/customizer.js', 
                                array(), 
                                THEME_VERSION, 
                                true);

        }

       /* public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
           if ( 'my-theme-jquery-customize' !== $handle ) :

               return $tag;

           endif;

           // change the script tag by adding type="module" and return it.
           $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

           return $tag;           

       }*/

        
    }