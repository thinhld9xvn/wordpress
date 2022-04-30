<?php 
    function enqueue_child_themes() {
        wp_deregister_style( 'wc-block-editor' );
        wp_deregister_style( 'wc-blocks-style' );
        wp_deregister_style('woocommerce-general');
        wp_deregister_style('woocommerce-smallscreen');
        wp_deregister_style('woocommerce-layout');
        //
        wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
        wp_enqueue_style( 'theme-tool-style', THEME_CSS_DIR_URI . '/tool.css' );
        wp_enqueue_style( 'theme-main-style', THEME_CSS_DIR_URI . '/main.css' );
        wp_enqueue_style( 'theme-swiper-style', THEME_CSS_DIR_URI . '/swiper.min.css' );
        //
        wp_enqueue_script("theme-jquery-main", THEME_JS_DIR_URI . '/plugins/jquery.js', null, '1.0', true);
        wp_enqueue_script("theme-jquery-bootstrap", THEME_JS_DIR_URI . '/plugins/bootstrap.js', null, '1.0', true);
        wp_enqueue_script("theme-jquery-module-main", THEME_JS_DIR_URI . '/main.js', null, '1.0', true);
        wp_enqueue_script("theme-jquery-swiper", THEME_JS_DIR_URI . '/plugins/swiper.min.js', null, '1.0', true);        
        if (is_home() || is_front_page()) :
            wp_enqueue_style( 'theme-home-style', THEME_CSS_DIR_URI . '/pages/index.css' );
            wp_enqueue_script("theme-jquery-addon-index", THEME_JS_DIR_URI . '/addons/index.js', null, '1.0', true);
        endif;
        if ( (! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404()) || is_archive() ) :
            wp_enqueue_style( 'theme-products-page-style', THEME_CSS_DIR_URI . '/pages/page__product.css' );
        endif;
        if ( is_singular(PRODUCTS_POST_TYPE) ) :
            wp_enqueue_style( 'theme-products-details-style', THEME_CSS_DIR_URI . '/pages/detail__product.css' );
            wp_enqueue_style( 'theme-news-style', THEME_CSS_DIR_URI . '/pages/page__news.css' );
            wp_enqueue_script("theme-jquery-addon-modal", THEME_JS_DIR_URI . '/addons/bs-modal.js', null, '1.0', true);
            wp_enqueue_script("theme-jquery-addon-number-custom", THEME_JS_DIR_URI . '/addons/number-custom.js', null, '1.0', true);
        endif;
        if ( is_page_template('layout/page-login.php') || is_page_template('layout/page-account.php') ) :
            wp_enqueue_style( 'theme-login-style', THEME_CSS_DIR_URI . '/pages/account.css' );
        endif;
    }
    // Enqueue child theme style.css
    add_action( 'wp_enqueue_scripts', 'enqueue_child_themes', 9999 );

    function register_module($tag, $handle, $src) {
        if ( 'theme-jquery-module-main' !== $handle ) {
            return $tag;
        }
        $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
        return $tag;
    }
    add_filter('script_loader_tag', 'register_module' , 10, 3);