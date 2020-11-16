<?php

define("loadingIcon", "//{$_SERVER['HTTP_HOST']}/wp-content/cache/grunts/images/loadingIcon.gif");

if (is_admin()) {

    require_once(get_template_directory() . '/admin/admin.php');

}

function stm_glob_wpdb(){

    global $wpdb;

    return $wpdb;

}

$theme_info = wp_get_theme();

define('CONSULTING_THEME_VERSION', (WP_DEBUG) ? time() : $theme_info->get('Version'));

define('CONSULTING_INC_PATH', get_template_directory() . '/inc');

define('CONSULTING_CUSTOMIZER_PATH', get_template_directory() . '/inc/customizer');

define('CONSULTING_CUSTOMIZER_URI', get_template_directory_uri() . '/inc/customizer');



// Theme Config

require_once(CONSULTING_INC_PATH . '/theme-config.php');



/*Custom Header Builder*/

require_once(CONSULTING_INC_PATH . '/header/main.php');


if (!isset($content_width)) {

    $content_width = 1120;

}



add_action('after_setup_theme', 'consulting_theme_setup');



if (!function_exists('consulting_theme_setup')) {



    function consulting_theme_setup()

    {



        load_theme_textdomain('consulting', get_template_directory() . '/languages');



        add_image_size('consulting-image-350x204-croped', 350, 204, true);

        if (stm_check_layout('layout_16')) {

            add_image_size('consulting-image-350x250-croped', 350, 250, array('center', 'top'));

        } else {

            add_image_size('consulting-image-350x250-croped', 350, 250, true);

        }

        add_image_size('consulting-image-1110x550-croped', 1110, 550, true);

        add_image_size('consulting-image-50x50-croped', 50, 50, true);

        add_image_size('consulting-image-320x320-croped', 320, 320, true);

        add_image_size('consulting-image-255x182-croped', 255, 182, true);

        add_image_size('consulting-image-350x195-croped', 350, 195, true);



        add_theme_support('post-thumbnails');

        add_theme_support('title-tag');

        add_theme_support('automatic-feed-links');

        add_theme_support('woocommerce');

        add_theme_support('html5', array(

            'search-form',

            'comment-form',

            'comment-list',

            'gallery',

            'caption'

        ));



        register_nav_menus(

            array(

                'consulting-primary_menu' => esc_html__('Top Menu', 'consulting'),

                'consulting-sidebar_menu_1' => esc_html__('Sidebar Menu 1', 'consulting'),

                'consulting-sidebar_menu_2' => esc_html__('Sidebar Menu 2', 'consulting'),

                'consulting-sidebar_menu_3' => esc_html__('Sidebar Menu 3', 'consulting'),

            )

        );



    }



}



if (!function_exists('consulting_register_default_sidebars')) {

    function consulting_register_default_sidebars()

    {

        register_sidebar(array(

            'id' => 'consulting-right-sidebar',

            'name' => esc_html__('Right Sidebar', 'consulting'),

            'before_widget' => '<aside id="%1$s" class="widget %2$s">',

            'after_widget' => '</aside>',

            'before_title' => '<h5 class="widget_title">',

            'after_title' => '</h5>',

        ));



        register_sidebar(array(

            'id' => 'consulting-left-sidebar',

            'name' => esc_html__('Left Sidebar', 'consulting'),

            'before_widget' => '<aside id="%1$s" class="widget %2$s">',

            'after_widget' => '</aside>',

            'before_title' => '<h5 class="widget_title">',

            'after_title' => '</h5>',

        ));



        register_sidebar(

            array(

                'id' => 'consulting-shop',

                'name' => esc_html__('Shop Sidebar', 'consulting'),

                'before_widget' => '<aside id="%1$s" class="widget %2$s shop_widgets">',

                'after_widget' => '</aside>',

                'before_title' => '<h5 class="widget_title">',

                'after_title' => '</h5>',

            )

        );

        // Register Footer Sidebars



        for ($footer = 1; $footer < 5; $footer++) {

            register_sidebar(array(

                'id' => 'consulting-footer-' . $footer,

                'name' => esc_html__('Footer ', 'consulting') . $footer,

                'before_widget' => '<section id="%1$s" class="widget %2$s">',

                'after_widget' => '</section>',

                'before_title' => '<h4 class="widget_title no_stripe">',

                'after_title' => '</h4>',

            ));

        }

    }

}



add_action('widgets_init', 'consulting_register_default_sidebars', 50);



if (!function_exists('_wp_render_title_tag')) {

    function consulting_render_title()

    {

        ?>

        <title><?php wp_title('|', true, 'right'); ?></title>

        <?php

    }



    add_action('wp_head', 'consulting_render_title');

}



//add_action('wp_enqueue_scripts', 'consulting_load_theme_scripts_and_styles');



if (!function_exists('consulting_load_theme_scripts_and_styles')) {

    function consulting_load_theme_scripts_and_styles()

    {



        if (!is_admin()) {



            $consulting_config = consulting_config();

            $google_api_key = get_theme_mod('google_api_key', false);



            wp_deregister_style('font-awesome');

            wp_deregister_style('header_builder');

            wp_deregister_style('select2');

            wp_deregister_style('slick');

            wp_deregister_style('owl.carousel');





            /* Register Styles */
          

            wp_enqueue_style('consulting-global-styles', '//' . $_SERVER['HTTP_HOST'] . '/wp-content/cache/grunts/grunt.css', array(), CONSULTING_THEME_VERSION, 'all');



            /* Register Scripts */

            wp_register_script('stm_grecaptcha', 'https://www.google.com/recaptcha/api.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('countUp', get_template_directory_uri() . '/assets/js/countUp.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('select2', get_template_directory_uri() . '/assets/js/select2.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('jquery.appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('jquery.tablesorter', get_template_directory_uri() . '/assets/js/jquery.tablesorter.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('consulting-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('particles', get_template_directory_uri() . '/assets/js/particles.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('Chart', get_template_directory_uri() . '/assets/js/Chart.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_enqueue_script('jquery-lazy-loading', get_template_directory_uri() . '/assets/js/jquery.lazy-loading.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            if (!empty($google_api_key)) {

                wp_register_script('gmap', 'https://maps.googleapis.com/maps/api/js?key=' . $google_api_key, array('jquery'), CONSULTING_THEME_VERSION, true);

            } else {

                wp_register_script('gmap', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), CONSULTING_THEME_VERSION, true);

            }

            wp_register_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('packery', get_template_directory_uri() . '/assets/js/packery-mode.pkgd.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('jquery.cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('fullPage', get_template_directory_uri() . '/assets/js/jquery.fullPage.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('vue', get_template_directory_uri() . '/assets/js/vue.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('vue-resource', get_template_directory_uri() . '/assets/js/vue-resource.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('charts-js', get_template_directory_uri() . '/assets/js/charts.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('stocks-charts', get_template_directory_uri() . '/assets/js/stocks-indexes/stm-stocks-charts.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('stocks-tables', get_template_directory_uri() . '/assets/js/stocks-indexes/stm-stocks-tables.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('stocks-carousel', get_template_directory_uri() . '/assets/js/stocks-indexes/stm-stocks-carousel.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('stocks-header', get_template_directory_uri() . '/assets/js/stocks-indexes/stm-stocks-header.js', array('jquery'), CONSULTING_THEME_VERSION, true);

            wp_register_script('simplemarquee', get_template_directory_uri() . '/assets/js/stocks-indexes/jquery.simplemarquee.js', array('jquery'), CONSULTING_THEME_VERSION, true);



            /* Enqueue Styles */

            //wp_enqueue_style('bootstrap');

            //wp_enqueue_style('font-awesome');

            //wp_enqueue_style('consulting-style');

            //wp_enqueue_style('consulting-layout');

            //wp_enqueue_style('select2');

            //wp_enqueue_style('header_builder');

            //wp_enqueue_style('consulting-default-font');



            //$consulting_config = consulting_config();   

            /* Enqueue Scripts */

            if (is_singular() && comments_open() && get_option('thread_comments')) {

                wp_enqueue_script('comment-reply');

            }            

           wp_enqueue_script('jquery');

            wp_enqueue_script('bootstrap');            

            wp_enqueue_script('select2');

            wp_enqueue_script('consulting-custom');

            //wp_enqueue_script('jquery-lazy-loading');

            $upload_dir = wp_upload_dir();

            $stm_upload_dir = $upload_dir['baseurl'] . '/stm_uploads';

            $skin = get_theme_mod('site_skin', 'skin_default');

            $current_style = get_option('stm_custom_style', '4');

            update_option('stm_custom_style', $current_style + 1);

           
        }



    }

}

function consulting_load_front_editor_composer_scripts() {

    $vc_mode = $_GET['vc_editable'];

    $thrive = $_GET['tve'];

    if ( ( isset( $vc_mode ) && $vc_mode === 'true' ) || ( isset( $thrive ) && $thrive === 'true' ) ) :

        consulting_load_theme_scripts_and_styles();

    endif;

}

add_action('wp_enqueue_scripts', 'consulting_load_front_editor_composer_scripts', 10);



if (!function_exists('consulting_admin_styles')) {

    function consulting_admin_styles()

    {

        //wp_enqueue_style('consulting-default-font', consulting_fonts_url(), array(), CONSULTING_THEME_VERSION, 'all');

        wp_enqueue_style('consulting-admin', get_template_directory_uri() . '/assets/css/admin.css', null, CONSULTING_THEME_VERSION, 'all');

        wp_enqueue_style('consulting-admin-gutenberg', get_template_directory_uri() . '/assets/admin/css/gutenberg.css', null, CONSULTING_THEME_VERSION, 'all');

        wp_enqueue_style('wp-color-picker');

        wp_enqueue_script('wp-color-picker');

        wp_enqueue_style('consulting-jquery.fonticonpicker', get_template_directory_uri() . '/assets/css/jquery.fonticonpicker.min.css', array(), CONSULTING_THEME_VERSION, 'all');

        wp_enqueue_style('consulting-jquery.fonticonpicker.bootstrap.min.css', get_template_directory_uri() . '/assets/css/jquery.fonticonpicker.bootstrap.min.css', array(), CONSULTING_THEME_VERSION, 'all');

        wp_enqueue_script('jquery.fonticonpicker', get_template_directory_uri() . '/assets/js/jquery.fonticonpicker.min.js', array('jquery'), CONSULTING_THEME_VERSION, true);

        wp_enqueue_style('consulting-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', null, CONSULTING_THEME_VERSION, 'all');

        wp_enqueue_script('stm-theme-multiselect', get_template_directory_uri() . '/assets/js/jquery.multi-select.js', array('jquery'), CONSULTING_THEME_VERSION, true);

        wp_enqueue_script('jquery-ui-autocomplete', '', array('jquery-ui-widget', 'jquery-ui-position'), '1.8.6');

    }

}



add_action('admin_enqueue_scripts', 'consulting_admin_styles');



/*if (!function_exists('consulting_fonts_url')) {

    function consulting_fonts_url()

    {



        $consulting_config = consulting_config();



        $font_families = array();



        if ($consulting_config['fonts']) {

            foreach ($consulting_config['fonts'] as $consulting_font) {

                $font_families[] = $consulting_font;

            }

        }



        if ($font_families) {

            $query_args = array(

                'family' => urlencode(implode('|', $font_families))

            );



            $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');

        } else {

            $fonts_url = '';

        }



        return esc_url_raw($fonts_url);

    }

}*/



if (!function_exists('consulting_excerpt_more')) {

    function consulting_excerpt_more($more)

    {

        return '';

    }

}



add_filter('excerpt_more', 'consulting_excerpt_more');



add_action('wp_head', 'consulting_ajaxurl');

add_action('admin_head', 'consulting_ajaxurl');



if (!function_exists('consulting_ajaxurl')) {

    function consulting_ajaxurl()

    {

        $stm_ajax_load_events = wp_create_nonce('stm_ajax_load_events');

        $stm_ajax_load_portfolio = wp_create_nonce('stm_ajax_load_portfolio');

        $stm_ajax_add_event_member = wp_create_nonce('stm_ajax_add_event_member');

        $stm_custom_register = wp_create_nonce('stm_custom_register');

        $stm_get_prices = wp_create_nonce('stm_get_prices');

        $stm_get_history = wp_create_nonce('stm_get_history');

        $consulting_install_plugin = wp_create_nonce('consulting_install_plugin');

        $stm_ajax_add_review = wp_create_nonce('stm_ajax_add_review');

        ?>

        <script type="text/javascript">

            var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';

            var stm_ajax_load_events = '<?php echo esc_js($stm_ajax_load_events); ?>';

            var stm_ajax_load_portfolio = '<?php echo esc_js($stm_ajax_load_portfolio); ?>';

            var stm_ajax_add_event_member_sc = '<?php echo esc_js($stm_ajax_add_event_member); ?>';

            var stm_custom_register = '<?php echo esc_js($stm_custom_register); ?>';

            var stm_get_prices = '<?php echo esc_js($stm_get_prices); ?>';

            var stm_get_history = '<?php echo esc_js($stm_get_history); ?>';

            var consulting_install_plugin = '<?php echo esc_js($consulting_install_plugin); ?>';

            var stm_ajax_add_review = '<?php echo esc_js($stm_ajax_add_review); ?>';

        </script>

        <?php

    }

}



if (!function_exists('consulting_body_class')) {

    function consulting_body_class($classes)

    {

        global $post;

        global $wp_customize;



        if (isset($wp_customize)) {

            $classes[] = 'customizer_page';

        }



        $consulting_config = consulting_config();

        if ($consulting_config['layout']) {

            $classes[] = 'site_' . $consulting_config['layout'];

        }



        if ($consulting_config['layout'] == 'layout_13' || $consulting_config['layout'] == 'layout_barcelona') {

            $classes[] = 'stm_top_bar_' . get_theme_mod('top_bar_style', 'style_1');

        }



        $wpml_switcher_mobile = get_theme_mod('wpml_switcher_mobile', false);



        if($wpml_switcher_mobile) {

            $classes[] = 'stm-show-mobile-switcher';

        }



        $classes[] = get_theme_mod('color_skin');

        $classes[] = consulting_get_header_style();

        if (get_theme_mod('sticky_menu')) {

            $classes[] = 'sticky_menu';

        }



        if (stm_check_layout('layout_17')) {

            $user_agent = getenv("HTTP_USER_AGENT");



            if (strpos($user_agent, "Win") !== FALSE)

                $classes[] = "stm_windows";

            elseif (strpos($user_agent, "Mac") !== FALSE)

                $classes[] = "stm_mac";

        }



        if (get_theme_mod('site_boxed')) {

            $classes[] = 'boxed_layout';

            if (get_theme_mod('bg_image')) {

                $classes[] = get_theme_mod('bg_image');

            }

            if (get_theme_mod('custom_bg_image')) {

                $classes[] = 'custom_bg_image';

            }



            if (!is_404()) {

                $content_bg_transparent = get_post_meta($post->ID, 'content_bg_transparent', true);

                if ($content_bg_transparent) {

                    $classes[] = 'content_bg_transparent';

                }

            }

        }



        if (!is_404() and !empty($post)) {

            if (!empty($post->ID) && get_post_meta($post->ID, 'enable_header_transparent', true)) {

                $classes[] = 'header_transparent';

            }



            $header_inverse = get_post_meta($post->ID, 'header_inverse', true);

            if ($header_inverse) {

                $classes[] = 'header_inverse';

            }



            $title_box_bg_image = get_post_meta($post->ID, 'title_box_bg_image', true);

            if (!empty($title_box_bg_image)) {

                $classes[] = 'title_box_image_added';

            }

        }



        $mobile_grid = get_theme_mod('mobile_grid');



        if ($mobile_grid == 'landscape') {

            $classes[] = 'mobile_grid_landscape';

        }



        if (defined('STM_HB_VER')) {

            $header_full_width = stm_hb_get_option('header_full_width', false, $hb = 'stm_hb_settings');

            if ($header_full_width == 'header_full_width') {

                $classes[] = $header_full_width;

            }

        }



        return $classes;

    }

}



add_filter('body_class', 'consulting_body_class');



require_once(CONSULTING_INC_PATH . '/stock-indexes/stock-indexes.php');

require_once(CONSULTING_CUSTOMIZER_PATH . '/customizer.class.php');

require_once(CONSULTING_INC_PATH . '/extras.php');

require_once(CONSULTING_INC_PATH . '/tgm/tgm-plugin-registration.php');

if (class_exists('WPBakeryShortCodesContainer')) {

    require_once(CONSULTING_INC_PATH . '/visual_composer.php');

}

if (class_exists('STM_PostType')) {

    require_once CONSULTING_INC_PATH . '/post_types-config.php';

}

/*if (class_exists('WooCommerce')) {

    require_once(CONSULTING_INC_PATH . '/woocommerce_configuration.php');

}*/

/*

 *  Load Custom Styles

 */

//require_once CONSULTING_INC_PATH . '/megamenu/main.php';

require_once CONSULTING_INC_PATH . '/print_styles.php';



// Header Switcher

/*if (function_exists('icl_object_id')) {

    function consulting_topbar_lang()

    {

        $languages = icl_get_languages('skip_missing=0&orderby=code');



        if (!empty($languages)) : ?>



            <div id="lang_sel">

                <ul>

                    <li>

                        <?php foreach ($languages



                        as $l) : ?>

                        <?php if ($l['active']) : ?>

                        <a href="#" class="lang_sel_sel"><?php echo icl_disp_language($l['translated_name']); ?></a>

                        <ul>

                            <?php endif; ?>

                            <?php endforeach; ?>



                            <?php foreach ($languages as $l) : ?>

                                <?php if (!$l['active']) : ?>

                                    <li>

                                        <a href="<?php echo esc_url($l['url']); ?>"><?php echo icl_disp_language($l['translated_name']); ?></a>

                                    </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </ul>

                    </li>

                </ul>

            </div>



        <?php endif; ?>



        <?php

    }

}*/

function cc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

  function deregister_theme_scripts() {

        if ( ! is_admin() ) :

            wp_deregister_script( 'wp-embed' );

        endif;

    }

    function vc_remove_wp_ver_css_js( $src ) {
        if ( strpos( $src, 'ver=' ) )
            $src = remove_query_arg( 'ver', $src );
        return $src;
    }    

    add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
    add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

    add_action( 'wp_footer', 'deregister_theme_scripts' );

    remove_action( 'wp_head', 'wp_resource_hints', 2 ); 

    function remove_api () {
        remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    }
    add_action( 'after_setup_theme', 'remove_api' );    

    function dequeue_jquery_migrate( $scripts ) {
        if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {

            $scripts->registered['jquery']->deps = array_diff(
                $scripts->registered['jquery']->deps,
                [ 'jquery-migrate' ]
            );
        }
    }
    add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );    

    //Making jQuery Google API
    function modify_jquery() {
        if (!is_admin()) {
            // comment out the next two lines to load the local copy of jQuery
            wp_deregister_script('jquery');
            wp_register_script('jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', false);
            wp_enqueue_script('jquery');
        }
    }
    //add_action('init', 'modify_jquery');

    /* Disable the emoji's
     */
    function disable_emojis() {
            remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
            remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
            remove_action( 'wp_print_styles', 'print_emoji_styles' );
            remove_action( 'admin_print_styles', 'print_emoji_styles' );    
            remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
            remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );      
            remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
            add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    }    

    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
                return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
                return array();
        }
    }

    function deregister_embed_theme_scripts() {

        if ( ! is_admin() ) :

            wp_deregister_script( 'wp-embed' );

        endif;

    }

    add_action( 'wp_footer', 'deregister_embed_theme_scripts' );

    add_action( 'init', 'disable_emojis' );

    remove_action ('wp_head', 'rsd_link'); 

    remove_action( 'wp_head', 'wlwmanifest_link'); 

    remove_action('wp_head', 'wp_generator');

    add_filter( 'wp_calculate_image_srcset', '__return_false' );

    add_filter( 'show_admin_bar', '__return_false' );

    // remove the html filtering
    remove_filter( 'pre_term_description', 'wp_filter_kses' );
    remove_filter( 'term_description', 'wp_kses_data' );

    // show all categories, terms in page, category, post   
    function checklist_args( $args, $taxonomies ) {

        $args['number'] = 1000;
        return $args;
    }

    add_filter( 'get_terms_args', 'checklist_args', 10, 2 );

    function build_taxonomies() {
    
      register_taxonomy( 'category', 'post', array(
            'hierarchical' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => 'category_name',
            'rewrite' => did_action( 'init' ) ? array(
                        'hierarchical' => false,
                        'slug' => get_option('category_base') ? get_option('category_base') : 'category',
                        'with_front' => false) : false,
            'public' => true,
            'show_ui' => true,
            '_builtin' => true,
        ) );
    
    }    

    add_action( 'init', 'build_taxonomies', 0 );

    function disable_autosave() {
        wp_deregister_script('autosave');
    }

    add_action('wp_print_scripts','disable_autosave');

    // giới hạn 20 ký tự ở cột term description khi vào edit-tags.php
    add_action(
        'admin_head-edit-tags.php',
        'wpse152619_edit_tags_trim_description'
    );
    function wpse152619_edit_tags_trim_description() {

        add_filter(
            'get_terms',
            'wpse152619_trim_description_callback',
            100,
            2
        );

    }

    function wpse152619_trim_description_callback( $terms, $taxonomies ) {
     
        foreach( $terms as $key => $term ) {

            $terms[ $key ]->description =
                wp_trim_words(
                    $term->description,
                    20,
                    ' ...'
                );

        }

        return $terms;
    }
    // #giới hạn 20 ký tự ở cột term description khi vào edit-tags.php   

    function short_text($text, $limit) {
        
        $chars_text = strlen($text);                
        
        //add ... so the user knows the text is actually longer
        if ($chars_text > $limit) {

            $text = mb_substr( $text, 0, $limit, 'UTF-8' ); 
            $text = $text . "...";

        }

        return $text;
        
    }

    function title($limit) {
        return short_text( get_the_title(), $limit );
    }

    function rank_math_reset_result_analysis() {

        $page = $_GET['page'];

        if ( $page == 'rank-math-seo-analysis' ) :

            delete_option('rank_math_seo_analysis_results');

        endif;

    }

    add_action('admin_init', 'rank_math_reset_result_analysis');

    function pm_remove_all_scripts() {

        if ( ! is_admin() ) :

            $vc_mode = $_GET['vc_editable'];

            $thrive = $_GET['tve'];

            if ( ! isset( $vc_mode ) && ! isset( $thrive ) ) :

                global $wp_scripts;
                $wp_scripts->queue = array();

            endif;

        endif;

    }
    add_action('wp_print_scripts', 'pm_remove_all_scripts', 10);

    function pm_remove_all_styles() {

        if ( ! is_admin() ) :

            $vc_mode = $_GET['vc_editable'];

            $thrive = $_GET['tve'];

            if ( ! isset( $vc_mode ) && ! isset( $thrive ) ) :

                global $wp_styles;
                $wp_styles->queue = array();

            endif;

        endif;

    }
    add_action('wp_print_styles', 'pm_remove_all_styles', 10);

    function loading_infinite_posts_ajax() {
        
        $post_type = isset( $_POST['post_type'] ) ? $_POST['post_type'] : 'post';

        $taxonomy = isset( $_POST['taxonomy'] ) ? $_POST['taxonomy'] : '';
        $field = isset( $_POST['field'] ) ? $_POST['field'] : '';
        $term = isset( $_POST['term'] ) ? $_POST['term'] : '';

        $author_id = isset( $_POST['author'] ) ? (int) $_POST['author'] : '';

        $tag_id = isset( $_POST['tag_id'] ) ? (int) $_POST['tag_id'] : '';

        $search_key = isset( $_POST['search_key'] ) ? $_POST['search_key'] : '';

        $number_items = isset( $_POST['n_items'] ) ? (int) $_POST['n_items'] : 4;

        $paged = isset( $_POST['paged'] ) ? (int) $_POST['paged'] : 1;

        $args = array(
            
            'posts_per_page' => $number_items,
            'orderby' => 'date',
            'order' => 'desc',
            'paged' => $paged

        );

        if ( ! empty( $post_type ) ) :

            $args['post_type'] = $post_type;

        endif;

        if ( ! empty( $taxonomy ) ) :

            $args['tax_query'] = array(

                array(

                    'taxonomy' => $taxonomy,
                    'field' => $field

                )

            );

            if ( ! empty( $term ) ) :

                $args['tax_query'][0]['terms'] = $term;

            endif;

        endif;

        if ( ! empty( $author_id ) ) :

            $args['author'] = $author_id;

        endif;

        if ( ! empty( $tag_id ) ) :

            $args['tag_id'] = $tag_id;

        endif;

         if ( ! empty( $search_key ) ) :

            $args['s'] = $search_key;

        endif;

        $results = query_posts( $args );

        foreach ( $results as $post ) :

            $post->post_thumbnail = get_the_post_thumbnail( $post->ID, 'consulting-image-350x250-croped' );
            $post->post_title = short_text( $post->post_title, 60 );
            $post->post_permalink = get_the_permalink( $post->ID );
            $post->post_date = get_the_date( 'd F, Y', $post->ID );
            
        endforeach;

        wp_reset_query();

        header("Content-Type: application/json; charset: utf-8");
        echo json_encode( $results );

        die();

    }

    add_action('wp_ajax_sb_loading_infinite_posts', 'loading_infinite_posts_ajax', 10);
    add_action('wp_ajax_nopriv_sb_loading_infinite_posts', 'loading_infinite_posts_ajax', 10);

    function the_breadcrumbs( $breadcumbs_id, $breadcumbs_class, $home_text, $d ) {

        $delimiter = $d; // dấu phân cách giữa các breadcumbs

        $home = $home_text; // chữ thay thế cho phần 'Home' link

        $before = '<span class="current">'; // thẻ html đằng trước mỗi link $after = '</span>'; // thẻ đằng sau mỗi link

        if ( ! is_home() && ! is_front_page() || is_paged() ) {

            echo '<div id="' . $breadcumbs_id . '" class="' . $breadcumbs_class . '">';

            global $post;

            $homeLink = get_bloginfo('url');

            echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

            if ( is_category() ) {

                global $wp_query;

                $cat_obj = $wp_query->get_queried_object();

                $thisCat = $cat_obj->term_id;

                $thisCat = get_category($thisCat);

                $parentCat = get_category($thisCat->parent);

                if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));

                echo $before . single_cat_title('', false) . $after;

            } 

            elseif ( is_day() ) {

                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

                echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';

                echo $before . get_the_time('d') . $after;

            } 

            elseif ( is_month() ) {

                echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

                echo $before . get_the_time('F') . $after;

            } 

            elseif ( is_year() ) {

                echo $before . get_the_time('Y') . $after;

            } 

            elseif ( is_single() && ! is_attachment() ) {

                if ( get_post_type() != 'post' ) {

                    $post_type = get_post_type_object(get_post_type());

                    $slug = $post_type->rewrite;

                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';

                    echo $before . get_the_title() . $after;

                } 

                else {

                    $cat = get_the_category(); $cat = $cat[0];

                    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

                    echo $before . get_the_title() . $after;

                }

            } 

            elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {

                //echo get_query_var('post_type'); die();

                $taxonomy_slug = get_query_var('taxonomy');

                if ( $taxonomy_slug ) :

                    $taxonomy = get_taxonomy( $taxonomy_slug );

                    $term = get_queried_object();

                    $post_type = $taxonomy->object_type[0];

                    $post_type_obj = get_post_type_object( $post_type );

                    echo '<a href="' . get_post_type_archive_link( $post_type ) . '">' . $post_type_obj->label . '</a> ' . $delimiter . ' '; 

                    if ( $term->parent > 0 ) :

                        $term_parent = $term;

                        $term_lists = array();

                        while ( $term_parent->parent > 0 ) :

                            $term_parent = get_term( $term_parent->parent );

                            $term_lists[] = array(
                                'permalink' => get_term_link( $term_parent ),
                                'title' => $term_parent->name
                            ); 

                        endwhile;

                        array_reverse( $term_lists );

                        foreach ( $term_lists as $_term ) :

                            echo '<a href="' . $_term['permalink'] . '">' . $_term['title'] . '</a> ' . $delimiter . ' ';
                            
                        endforeach; 

                    endif;

                    echo $before . $term->name . $after;

                else :

                    $post_type = get_query_var('post_type');

                    $post_type_obj = get_post_type_object( $post_type );                

                    echo $before . $post_type_obj->labels->singular_name . $after;  

                endif;
                

            } 

            elseif ( is_attachment() ) {

                $parent = get_post($post->post_parent);

                $cat = get_the_category($parent->ID); $cat = $cat[0];

                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

                echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';

                echo $before . get_the_title() . $after;

            }

            elseif ( is_page() && !$post->post_parent ) {

                echo $before . get_the_title() . $after;

            } 

            elseif ( is_page() && $post->post_parent ) {

                $parent_id = $post->post_parent;

                $breadcrumbs = array();

                while ($parent_id) {

                    $page = get_page($parent_id);

                    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';

                    $parent_id = $page->post_parent;

                }

                $breadcrumbs = array_reverse($breadcrumbs);

                foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';

                    echo $before . get_the_title() . $after;

            } 

            elseif ( is_search() ) {

                echo $before . 'Kết quả tìm kiếm cho "' . get_search_query() . '"' . $after;

            } 

            elseif ( is_tag() ) {

                echo $before . 'Tags bài viết "' . single_tag_title('', false) . '"' . $after;

            } 

            elseif ( is_author() ) {

                global $author;

                $userdata = get_userdata($author);

                echo $before . 'Tác giả bài viết ' . $userdata->display_name . $after;

            } 

            elseif ( is_404() ) {

                echo $before . 'Lỗi không tìm thấy' . $after;

            }

            if ( get_query_var('paged') ) {

                if ( is_archive() || is_category() || is_tax() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';

                    echo __('Trang') . ' ' . get_query_var('paged');

                if ( is_archive() || is_category() || is_tax() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';

            }

            echo '</div>';

        }

    } // end print_breadcrumbs()    

    function edit_rankmath_seo_title( $title ) {

        $data = explode( '-', $title );

        if ( ! empty( trim( $data[0] ) ) ) return $title;

        if ( is_tag() ) :

            return single_tag_title('', false) . ' - ' . $data[1];

        endif;

        //echo var_dump( $title );

    }

    add_filter('rank_math/frontend/title', 'edit_rankmath_seo_title');


    add_action( 'show_user_profile', 'extra_user_profile_priority_field', 1 );
    add_action( 'edit_user_profile', 'extra_user_profile_priority_field', 1 );

    function extra_user_profile_priority_field( $user ) {

        $avatar = get_the_author_meta( 'profile_avatar', $user->ID );
        $avatar = $avatar ? esc_attr( $avatar ) : 'https://secure.gravatar.com/avatar/c4c645522f94b3e95a9a7c56e2db48e4?s=96&#038;r=g'; ?>   

        <h3><?php _e("Ảnh đại diện", "blank"); ?></h3>   

        <table class="form-table">

            <tr>
                <th><label for="profile_avatar">Avatar</label></th>

                <td>

                    <img alt='avatar' style="cursor: pointer" src='<?= $avatar ?>' class='avatar media_upload avatar-96 photo' height='96' width='96' />

                    <input type="hidden" name="profile_avatar" id="profile_avatar" value="<?php echo esc_attr( get_the_author_meta( 'profile_avatar', $user->ID ) ); ?>" class="regular-text" /><br />

                    <span class="description"><?php _e("Please choose your avatar profile."); ?></span>

                </td>

            </tr>
      
        </table>  

        <h3><?php _e("Tiểu sử thành viên", "blank"); ?></h3>

        <table class="form-table">

            <tr>
                <th><?php _e("Tiểu sử thành viên (Tiếng Việt)"); ?></th>
                <td
                     <?php
                        $settings = array('wpautop' => false, 
                                          'media_buttons' => true, 
                                          'quicktags' => true, 
                                          'textarea_rows' => '10', 
                                          'textarea_name' => 'profile_description_vi' );
                        wp_editor( get_the_author_meta( 'profile_description_vi', $user->ID ), 'profile_description_vi', $settings); 

                    ?>  

                </td>
            </tr>

            <tr>
                <th><?php _e("Tiểu sử thành viên (Tiếng Anh)"); ?></th>
                <td
                     <?php
                        $settings = array('wpautop' => false, 
                                          'media_buttons' => true, 
                                          'quicktags' => true, 
                                          'textarea_rows' => '10', 
                                          'textarea_name' => 'profile_description_en' );
                        wp_editor( get_the_author_meta( 'profile_description_en', $user->ID ), 'profile_description_en', $settings); 

                    ?>  

                </td>
            </tr>
      
        </table>

        <h3><?php _e("Mạng xã hội", "blank"); ?></h3>

        <table class="form-table">

            <tr>
                <th><label for="profile_social_facebook">Mạng xã hội</label></th>
                <td>
                    
                    <span class="description"><?php _e("Facebook Social"); ?></span> <br/>
                    <input type="text" name="profile_social_facebook" id="profile_social_facebook" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><br />                    

                    <span class="description"><?php _e("Twitter social"); ?></span> <br/>
                     <input type="text" name="profile_social_twitter" id="profile_social_twitter" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><br />

                     <span class="description"><?php _e("Pinterest social"); ?></span> <br/>
                     <input type="text" name="profile_social_pinterest" id="profile_social_pinterest" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /> <br />
                   
                     <span class="description"><?php _e("Medium social"); ?></span> <br/>
                     <input type="text" name="profile_social_medium" id="profile_social_medium" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_medium', $user->ID ) ); ?>" class="regular-text" /><br /><br />

                     <span class="description"><?php _e("Instagram social"); ?></span><br />
                     <input type="text" name="profile_social_instagram" id="profile_social_instagram" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_instagram', $user->ID ) ); ?>" class="regular-text" /><br /><br />                    

                     <span class="description"><?php _e("Vimeo social"); ?></span><br />
                     <input type="text" name="profile_social_vimeo" id="profile_social_vimeo" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_vimeo', $user->ID ) ); ?>" class="regular-text" /><br /><br/>

                     <span class="description"><?php _e("VK.com social"); ?></span><br />
                     <input type="text" name="profile_social_vk" id="profile_social_vk" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_vk', $user->ID ) ); ?>" class="regular-text" /><br /><br/>

                     <span class="description"><?php _e("Linkedin social"); ?></span><br />
                     <input type="text" name="profile_social_linkedin" id="profile_social_linkedin" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><br/>

                     <span class="description"><?php _e("Youtube social"); ?></span><br />
                     <input type="text" name="profile_social_youtube" id="profile_social_youtube" value="<?php echo esc_attr( get_the_author_meta( 'profile_social_youtube', $user->ID ) ); ?>" class="regular-text" /><br /><br/>
                    

                </td>
            </tr>
      
        </table>

        <h3><?php _e("Độ ưu tiên", "blank"); ?></h3>

        <table class="form-table">

            <tr>
                <th><label for="profile_priority"><?php _e("Priority"); ?></label></th>
                <td>
                    <input type="text" name="profile_priority" id="profile_priority" value="<?php echo esc_attr( get_the_author_meta( 'profile_priority', $user->ID ) ); ?>" class="regular-text" /><br />
                    <span class="description"><?php _e("Please enter your priority."); ?></span>
                </td>
            </tr>
      
        </table>
    <?php }

    add_action( 'personal_options_update', 'save_extra_user_profile_priority_field' );
    add_action( 'edit_user_profile_update', 'save_extra_user_profile_priority_field' );

    function save_extra_user_profile_priority_field( $user_id ) {

        if ( ! current_user_can( 'edit_user', $user_id ) ) { 
            return false; 
        }     
        update_user_meta( $user_id, 'profile_description_vi', $_POST['profile_description_vi'] );
        update_user_meta( $user_id, 'profile_description_en', $_POST['profile_description_en'] );
        update_user_meta( $user_id, 'profile_avatar', $_POST['profile_avatar'] );

        update_user_meta( $user_id, 'profile_social_facebook', $_POST['profile_social_facebook'] );
        update_user_meta( $user_id, 'profile_social_twitter', $_POST['profile_social_twitter'] );
        update_user_meta( $user_id, 'profile_social_pinterest', $_POST['profile_social_pinterest'] );
        update_user_meta( $user_id, 'profile_social_medium', $_POST['profile_social_medium'] );
        update_user_meta( $user_id, 'profile_social_instagram', $_POST['profile_social_instagram'] );
        update_user_meta( $user_id, 'profile_social_vimeo', $_POST['profile_social_vimeo'] );
        update_user_meta( $user_id, 'profile_social_vk', $_POST['profile_social_vk'] );
        update_user_meta( $user_id, 'profile_social_linkedin', $_POST['profile_social_linkedin'] );
        update_user_meta( $user_id, 'profile_social_youtube', $_POST['profile_social_youtube'] );

        update_user_meta( $user_id, 'profile_priority', $_POST['profile_priority'] );
    }

    add_filter('admin_enqueue_scripts','ShowTinyMCE');

    function loadTinyMCEScripts() {

         // conditions here
            wp_enqueue_script( 'common' );
            wp_enqueue_script( 'jquery-color' );
            wp_print_scripts('editor');
            if (function_exists('add_thickbox')) add_thickbox();
            wp_print_scripts('media-upload');
            if (function_exists('wp_tiny_mce')) wp_tiny_mce();
            wp_admin_css();
            wp_enqueue_script('utils');
            do_action("admin_print_styles-post-php");
            do_action('admin_print_styles');

    }

    function ShowTinyMCE() {

        $request_uri = $_SERVER['REQUEST_URI'];

        if ( false !== strpos( $request_uri, 'user-edit.php' ) ) :

           loadTinyMCEScripts();

        endif;

    }

    add_action( 'personal_options', array ( 'T5_Hide_Profile_Bio_Box', 'start' ) );

/**
 * Captures the part with the biobox in an output buffer and removes it.
 *
 * @author Thomas Scholz, <info@toscho.de>
 *
 */
class T5_Hide_Profile_Bio_Box
{
    /**
     * Called on 'personal_options'.
     *
     * @return void
     */
    public static function start()
    {
        $action = ( IS_PROFILE_PAGE ? 'show' : 'edit' ) . '_user_profile';
        add_action( $action, array ( __CLASS__, 'stop' ) );
        ob_start();
    }

    /**
     * Strips the bio box from the buffered content.
     *
     * @return void
     */
    public static function stop()
    {
        $html = ob_get_contents();
        ob_end_clean();

        //file_put_contents( dirname(__FILE__) . '/debug.log', $html );

         // remove the headline      
        $html = str_replace( '<h2>Quản lý tài khoản</h2>', '', $html );

         // remove the table row
        $html = preg_replace( '~<tr id="password" class="user-pass1-wrap">.*</tr>~imsUu', '', $html );

        // remove the table row
        $html = preg_replace( '~<tr class="user-pass2-wrap hide-if-js">.*</tr>~imsUu', '', $html );

        // remove the table row
        $html = preg_replace( '~<tr class="user-sessions-wrap hide-if-no-js">.*</tr>~imsUu', '', $html );

        // remove the table row
        $html = preg_replace( '~<tr class="user-profile-picture">.*</tr>~imsUu', '', $html );

        // remove the headline      
        $html = str_replace( '<h2>Xung quanh thành viên</h2>', '', $html );

        // remove the table row
        $html = preg_replace( '~<tr class="user-description-wrap">\s*<th><label for="description".*</tr>~imsUu', '', $html );

        
        print $html;
    }
} 

    function admin_user_textarea_tinymce() {

        $request_uri = $_SERVER['REQUEST_URI'];

        if ( false !== strpos( $request_uri, 'user-edit.php' ) ) : 

            ob_start(); ?>

            <script type='text/javascript'>

                jQuery(document).ready(function($) {                       

                    //$('#your-profile').append( $obj );

                    var editor = {

                        ready: function() {

                            $('form').on( 'submit', function(e) {                

                                if ( typeof( tinyMCE ) != "undefined") {

                                    $wp_editors = tinyMCE.editors;

                                    if ( $wp_editors.length > 0 ) {

                                        $('.wp-switch-editor.switch-tmce').click();

                                        for ( var i = 0; i < $wp_editors.length; i++ ) {

                                            var id = $wp_editors[i].id,
                                                $editor_field = $('#' + id),
                                                contents = '';

                                            //console.log( $editor_field );

                                            if ( $editor_field.length > 0 ) {

                                                $wp_editors[i].save();

                                                //contents = $wp_editors[i].getContent();

                                                //$('#_' + id).val( contents );

                                            }

                                        }

                                    }

                                }
                                
                            });

                            //let t = setInterval(function() {   

                            $(window).load(function() {                        

                                if ( typeof( tinyMCE ) != "undefined") {

                                    $wp_editors = tinyMCE.editors;                            

                                    if ( $wp_editors.length > 0 ) { 

                                        //clearInterval( t );  

                                        //console.log( $wp_editors );                                

                                        for ( var i = 0; i < $wp_editors.length; i++ ) {

                                            var id = $wp_editors[i].id,
                                                $editor_field = $('#_' + id),
                                                contents = ''; 

                                            //console.log( $editor_field );               

                                            if ( $editor_field.length > 0 ) {             

                                                contents = $editor_field.val();  

                                                //console.log( contents );    

                                                //console.log( $wp_editors[i] );      

                                                $wp_editors[i].setContent(contents, {format: 'raw'});

                                            }

                                        }

                                    }

                                }

                            });


                            //}, 200);


                        }

                    }

                    editor.ready();

                    var media = {

                        index : 0,
                        
                        ready: function() {
                            
                            $(document).on('click', '.media_upload', this.uploadMedia);
                        },                    
                        
                        uploadMedia: function(e) {
                            
                            e.preventDefault();
                        
                            var $attachment_thumbnail = $(this),
                                $attachment_url = $(this).nextAll('input[type=hidden]'),
                                
                                custom_uploader = wp.media({
                                    title: 'Select Media',
                                    button: {
                                        text: 'Upload Image'
                                    },
                                    multiple: false  // Set this to true to allow multiple files to be selected
                                })
                                .on('select', function() {
                                    
                                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                                    
                                    
                                    $attachment_thumbnail.attr('src', attachment['url'] );
                                    
                                    $attachment_url.val( attachment['url'] );
                                   
                                })
                                .open();
                                
                            }
                    }  
                    
                    media.ready();

                    $('table.form-table').eq(0).remove();                    

                    //$("table.form-table:contains('Mật khẩu mới')").remove();
                    

                });

            </script>           

    <?php
            $contents = ob_get_contents();
            ob_end_clean();

            echo $contents;

        endif;

    }

    add_action('in_admin_footer', 'admin_user_textarea_tinymce');

    require_once CONSULTING_INC_PATH . '/theme-menu-walker.php';
    require_once get_template_directory() . '/ultimated_cache/ultimated_cache.php';
    require_once get_template_directory() . '/qTranslate/qTranslate_core.php';

    function set_page_lang_default() {

        global $wpdb;

        $wpdb->query("UPDATE {$wpdb->prefix}posts SET qtranslate_post_langcode = 'vi' WHERE qtranslate_post_langcode = ''");

        //die();

    }

    //set_posts_lang_default();

    add_action('after_setup_theme', 'set_page_lang_default');

vc_add_shortcode_param( 'custom_accordion', 'my_custom_accordion_settings_field' );

function my_custom_accordion_settings_field( $settings, $value ) {

    loadTinyMCEScripts();

    ob_start(); ?>

    <div class="wpbakery-custom-accordion">

        <div class="wpb-widget wpb-ac1">

            <div class="abp-ac-input wbc-title">

                <div class="wpb_element_label">
                    Tiêu đề tab
                </div>

                <input type="text" 
                       class="wpb_vc_param_value wpb-textinput textfield" 
                       name="wbc-title-ac1">
                
            </div>

            <div class="abp-ac-input wbc-content">

                <div class="wpb_element_label">
                    Nội dung tab
                </div>

                <?php
                        $settings = array('wpautop' => false, 
                                          'media_buttons' => true, 
                                          'quicktags' => true, 
                                          'textarea_rows' => '10', 
                                          'textarea_name' => 'wbc-content-ac1' );
                        wp_editor( '', '_wbc-content-ac1', $settings); 

                    ?>  
                
            </div>

        </div>
        
    </div>    

    <style type="text/css">

        .abp-ac-input:not(:first-child) {
            margin-top: 15px;
        }
        
    </style>

<?php 
    $contents = ob_get_contents();
    ob_end_clean();

    return $contents;

}


class VCExtendAddonClass {

    function __construct() {

        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'bartag', array( $this, 'renderMyBartag' ) );       

    }

    public function integrateWithVC() {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        /*
        Add your Visual Composer logic here.
        Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */
        vc_map( 

            array(
                "name" => __("Accordion In Tabs", 'vc_extend'),
                "description" => __("Accordion advanced using in Tabs", 'vc_extend'),
                "base" => "bartag",
                "class" => "",
                "controls" => "full",
                "icon" => "vc_general vc_element-icon icon-wpb-ui-accordion", // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
                "category" => __('Content', 'js_composer'),
                //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
                //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
                "params" => array(

                    array(
                          "type" => "custom_accordion",                       
                          "class" => "",
                          "heading" => __("Text", 'vc_extend'),
                          "param_name" => "foo",
                          "value" => __("Default params value", 'vc_extend'),
                          "description" => __("Description for foo param.", 'vc_extend')
                      )                     

                )
            )

        );
    }

    /*
    Shortcode logic how it should be rendered
    */
    public function renderMyBartag( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'foo' => 'something',
        'color' => '#FF0000'
      ), $atts ) );
      $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content

      $output = "<div style='color:{$color};' data-foo='${foo}'>{$content}</div>";
      return $output;
    } 

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'vc_extend'), $plugin_data['Name']).'</p>
        </div>';
    }
}
// Finally initialize code
new VCExtendAddonClass();