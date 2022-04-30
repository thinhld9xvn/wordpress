<?php 

    namespace Actions\Enqueues;

    class EnqueueThemeStylesUtils {

        public static function render() { 

            wp_enqueue_style("google-fonts-montserrat", "//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400&display=swap", array(), THEME_VERSION);
			wp_enqueue_style("google-fonts-playfair-display", "//fonts.googleapis.com/css2?family=Playfair+Display&display=swap", array(), THEME_VERSION);
			wp_enqueue_style("google-fonts-raleway", "//fonts.googleapis.com/css2?family=Raleway:wght@400;500&display=swap", array(), THEME_VERSION);
			wp_enqueue_style("my-theme-css-bootstrap", THEME_CSS_DIR_URI . "/bootstrap.min.css", array(), THEME_VERSION);
			wp_enqueue_style("my-theme-css-fontawesome", THEME_CSS_DIR_URI . "/font-awesome.min.css",array(), THEME_VERSION);			
			wp_enqueue_style("my-theme-css-layout", THEME_CSS_DIR_URI . "/layout.css", array(), THEME_VERSION);
			wp_enqueue_style("my-theme-css-main", THEME_CSS_DIR_URI . "/dist/main.css", array(), THEME_VERSION);

			wp_enqueue_script('my-theme-jquery', THEME_JS_DIR_URI . '/jquery.min.js', array(), THEME_VERSION, true);

			wp_enqueue_style("my-theme-bxslider-stylesheet", THEME_ASSETS_DIR_URI . "/bxslider/jquery.bxslider.min.css", array(), THEME_VERSION);
			wp_enqueue_script("my-theme-bxslider-jquery", THEME_ASSETS_DIR_URI . "/bxslider/jquery.bxslider.min.js", array(), THEME_VERSION, true);

			wp_enqueue_style("my-theme-lightgallery-stylesheet", THEME_ASSETS_DIR_URI . "/lightGallery/css/lightgallery.min.css", array(), THEME_VERSION);
			wp_enqueue_script("my-theme-lightgallery-jquery", THEME_ASSETS_DIR_URI . "/lightGallery/js/lightgallery-all.min.js", array(), THEME_VERSION, true);

			wp_enqueue_style("my-theme-master-modal-stylesheet", THEME_ASSETS_DIR_URI . "/jquery.master-modal/jquery.modal.min.css", array(), THEME_VERSION);
			wp_enqueue_script("my-theme-master-modal-jquery", THEME_ASSETS_DIR_URI . "/jquery.master-modal/jquery.modal.min.js", array(), THEME_VERSION, true);
					
			wp_enqueue_script('my-theme-jquery-customize', THEME_JS_DIR_URI . '/jquery.customize.js', array(), THEME_VERSION, true);
            
           

        }

        public static function registerModule($tag, $handle, $src) {

            // if not your script, do nothing and return original $tag
           if ( 'my-theme-jquery-customize' !== $handle ) :

               return $tag;

           endif;

           // change the script tag by adding type="module" and return it.
           $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';

           return $tag;           

       }

        
    }