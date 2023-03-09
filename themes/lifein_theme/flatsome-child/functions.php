<?php
//Clean WordPress Header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//Remove Default WordPress Image Sizes
function remove_default_image_sizes( $sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');


function flatsome_child_theme_locale() {
    load_child_theme_textdomain( 'flatsome', get_stylesheet_directory() . '/languages/' );
}
add_action( 'after_setup_theme', 'flatsome_child_theme_locale' );


if (!function_exists('flatsome_child_enqueue_script')) {

    function flatsome_child_enqueue_script() {

        if ( ! is_front_page() && ! is_home() ) :

            wp_enqueue_style('custom-js-flatsome-popup-css', get_stylesheet_directory_uri() . '/assets/popup.css');

            wp_enqueue_script('custom-flatsome', get_stylesheet_directory_uri() . '/assets/js/custom-theme.js', array('jquery'), false, true);
            wp_enqueue_script('custom-js-flatsome-modal', get_stylesheet_directory_uri() . '/assets/js/custom-modal.js', array('jquery'), false, true);
            wp_enqueue_script('custom-flatsome-qa', get_stylesheet_directory_uri() . '/assets/qa.js', array('jquery'), false, true);
        
       endif;

    }
}
add_action('wp_enqueue_scripts', 'flatsome_child_enqueue_script', 9999999999);


//Include custom shortcode
require get_stylesheet_directory() . '/inc/shortcodes/box-price.php';
require get_stylesheet_directory() . '/inc/shortcodes/image-box-text.php';
require get_stylesheet_directory() . '/inc/shortcodes/box-button-app.php';
require get_stylesheet_directory() . '/inc/shortcodes/map.php';

add_action('after_setup_theme', '__child_theme_register_sidebar');

function __child_theme_register_sidebar() {

    register_sidebar( array(
        'name' => 'Home Sidebar',
        'id' => 'sb-home-sidebar',
        'description' => 'Home Sidebar',
        'before_widget' => '<div class="home-widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title" style="display:none">',
        'after_title' => '</div>',
    ));
    
    register_sidebar( array(
        'name' => 'Home Footer Sidebar',
        'id' => 'sb-home-ft-sidebar',
        'description' => 'Home Footer Sidebar',
        'before_widget' => '<div class="home-ft-widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title" style="display:none">',
        'after_title' => '</div>',
    ));
    
}

function my_tinymce_config( $init ) {
    $init['remove_linebreaks'] = false; 
    $init['convert_newlines_to_brs'] = true; 
    $init['remove_redundant_brs'] = false; 
    return $init;
}
add_filter('tiny_mce_before_init', 'my_tinymce_config');

function isSafari($ua) {
    return preg_match("/^((?!chrome).)*safari/i",$ua) && stripos($ua,' version/')!==false && stripos($ua,'mqqbrowser')===false;
}

function wp_grunts_frontend_finish( $html )
    {
        return new GRUNTS_FRONTEND( $html );        
    }
    
    function wp_grunts_frontend_start()
    {       
        
       $user_agent = $_SERVER['HTTP_USER_AGENT']; 
        $request_uri = $_SERVER['REQUEST_URI'];         

        if ( 0 === strpos($request_uri, '/alimentaire/') ) : 

            if( isSafari($user_agent) ) :

               ob_start('wp_grunts_frontend_finish');

            endif;

        endif;
    }  

    add_action('get_header', 'wp_grunts_frontend_start', 100);

class GRUNTS_FRONTEND
    {
        
        // Variables
        protected $html;
        public function __construct($html)
        {
            if ( ! empty( $html ) ) :

                $this->data_js = '';
                $this->data_js_inline = '';
                $this->data_css = '';

                $this->parseHTML( $html );


            endif;
        }
        public function __toString()
        {
            return $this->html;
        }        

        protected function replaceVideoUrl( $html, $searched, $replaced ) {

            $output = $html;

            $output = str_replace($searched,
                                    $replaced,
                                    $output);

            return $output;

        }

        protected function parseHTML( $html )
        {           

            $outputs = $html;         
            
            $this->html = $this->replaceVideoUrl( $outputs, "https://lifebeligum.s3-ap-southeast-1.amazonaws.com/documents/alimentaire+samedi+ok%40.webm", 
                                                    "http://lifein.click/wp-content/uploads/2021/03/alimentairesamediok@.mov" );

            //$this->html = $outputs;
            
        }
    
    }