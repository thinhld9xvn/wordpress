<?php

/**

 * Astra functions and definitions

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package Astra

 * @since 1.0.0

 */



if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}



/**

 * Define Constants

 */

define( 'ASTRA_THEME_VERSION', '2.5.5' );

define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );

define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );

define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );





/**

 * Minimum Version requirement of the Astra Pro addon.

 * This constant will be used to display the notice asking user to update the Astra addon to latest version.

 */

define( 'ASTRA_EXT_MIN_VER', '2.6.0' );



/**

 * Setup helper functions of Astra.

 */

require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';

require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';

require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';



/**

 * Update theme

 */

require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-update.php';

require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';

require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-pb-compatibility.php';





/**

 * Fonts Files

 */

require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';

if ( is_admin() ) {

	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';

}



require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';



require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';

require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';

require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';

require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';



/**

 * Custom template tags for this theme.

 */

require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';

require_once ASTRA_THEME_DIR . 'inc/template-tags.php';



require_once ASTRA_THEME_DIR . 'inc/widgets.php';

require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';

require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';

require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';



/**

 * Markup Functions

 */

require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';

require_once ASTRA_THEME_DIR . 'inc/extras.php';

require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';

require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';

require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**

 * Markup Files

 */

require_once ASTRA_THEME_DIR . 'inc/template-parts.php';

require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';

require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';



/**

 * Functions and definitions.

 */

require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';



// Required files.

require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';



require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';



if ( is_admin() ) {



	/**

	 * Admin Menu Settings

	 */

	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';

	require_once ASTRA_THEME_DIR . 'inc/lib/notices/class-astra-notices.php';



	/**

	 * Metabox additions.

	 */

	require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

}



require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';





/**

 * Customizer additions.

 */

require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';





/**

 * Compatibility

 */

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';

require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';

require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';

require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';

require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';



// Elementor Compatibility requires PHP 5.4 for namespaces.

if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {

	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';

	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';

}



// Beaver Themer compatibility requires PHP 5.3 for anonymus functions.

if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {

	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';

}

/**

 * Load deprecated functions

 */

require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';

require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';

require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

// custom hooks and function 


function astra_register_custom_stylesheet() {

	wp_enqueue_style( 'astra-custom-stylesheet', ASTRA_THEME_URI . '/assets/css/unminified/style-custom.css' );
	wp_enqueue_script( 'astra-custom-script', ASTRA_THEME_URI . '/assets/js/unminified/custom-script.js' );

}

add_action('wp_enqueue_scripts', 'astra_register_custom_stylesheet');


 /**
     * Disable the emoji's
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
     
    /**
     * Filter function used to remove the tinymce emoji plugin.
     * 
     * @param    array  $plugins  
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ) {
                return array_diff( $plugins, array( 'wpemoji' ) );
        } else {
                return array();
        }
	}
	
	add_action( 'init', 'disable_emojis' );

	function deregister_theme_scripts() {

        if ( ! is_admin() ) :

            wp_deregister_script( 'wp-embed' );

        endif;

    }

	add_action( 'wp_footer', 'deregister_theme_scripts' );
	
// DEQUEUE GUTENBERG STYLES FOR FRONT
function my_deregister_scripts_and_styles() {
    wp_deregister_script('wp-util'); //deregister script
    wp_deregister_script('underscore'); 
    wp_dequeue_style( 'wp-block-library'); //deregister style
    wp_dequeue_style( 'wc-block-style' ); 
    wp_dequeue_style( 'wp-block-library-theme' );
  }
  add_action( 'wp_enqueue_scripts', 'my_deregister_scripts_and_styles', 999);  


require_once ASTRA_THEME_DIR . '/metaboxes/subject_tags.php';
require_once ASTRA_THEME_DIR . '/metaboxes/consultation.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/header.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_post_view_counter.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_custom_archive_content.php';

require_once ASTRA_THEME_DIR . '/astra_customize_widgets/top_header_widget.php';
require_once ASTRA_THEME_DIR . '/astra_customize_widgets/lafu_related_posts_widget.php';
require_once ASTRA_THEME_DIR . '/astra_customize_widgets/lafu_categories_widget.php';
require_once ASTRA_THEME_DIR . '/astra_customize_widgets/lafu_most_popular_posts_widget.php';


  
/*add_filter( 'the_excerpt', 'filter_the_excerpt', 10, 2 );
    function filter_the_excerpt( ) {
    return ' ';
 }*/

 add_action( 'elementor/frontend/after_register_styles',function() {
	foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
		wp_deregister_style( 'elementor-icons-fa-' . $style );
	}
}, 20 );

//add_action( 'wp_print_styles', 'cyb_list_styles' );
function cyb_list_styles() {
    global $wp_styles;
    /*$enqueued_styles = array();
    foreach( $wp_styles->queue as $handle ) {
        $enqueued_styles[] = $wp_styles->registered[$handle]->src;
    }*/

    echo "<pre>";
    print_r( $wp_styles );
    echo "<pre>";
}

function enqueue_font_awesome() {

    wp_enqueue_style('font-awesome');

}

add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

function re_enqueue_scripts() {

    wp_dequeue_style( 'astra-theme-css' );
    wp_dequeue_style( 'font-awesome-5-all' );
    wp_dequeue_style( 'font-awesome-4-shim' );
    wp_dequeue_style( 'elementor-icons-shared-0' );
    wp_dequeue_style( 'font-awesome' );
    wp_dequeue_style( 'elementor-icons' );
    wp_dequeue_style( 'elementor-common' );
    wp_dequeue_style( 'widgetopts-styles' );
    wp_dequeue_style( 'wpforms-admin-bar' );
    wp_dequeue_style( 'rank-math' );
    wp_dequeue_style( 'recent-posts-widget-with-thumbnails-public-style' );
    wp_dequeue_style( 'happy-elementor-addons-admin' );
    wp_dequeue_style( 'elementor-animations' );
    wp_dequeue_style( 'elementor-frontend-legacy' );
    wp_dequeue_style( 'elementor-frontend' );
    wp_dequeue_style( 'elementor-post-8' );
    wp_dequeue_style( 'lae-animate-styles' );
    wp_dequeue_style( 'lae-sliders-styles' );
    wp_dequeue_style( 'lae-icomoon-styles' );
    wp_dequeue_style( 'fancybox' );
    wp_dequeue_style( 'lae-premium-sliders-styles' );
    wp_dequeue_style( 'lae-frontend-styles' );
    wp_dequeue_style( 'lae-premium-frontend-styles' );
    wp_dequeue_style( 'lae-blocks-styles' );
    wp_dequeue_style( 'lae-widgets-styles' );
    wp_dequeue_style( 'lae-premium-widgets-styles' );
    wp_dequeue_style( 'elementor-pro' );
    wp_dequeue_style( 'uael-frontend' );
    wp_dequeue_style( 'wpforms-smart-phone-field' );
    wp_dequeue_style( 'wpforms-full' );
    wp_dequeue_style( 'elementor-global' );
    wp_dequeue_style( 'elementor-post-1861' );
    wp_dequeue_style( 'elementor-icons-shared-1' );
    wp_dequeue_style( 'elementor-icons-happy-icons' );
    wp_dequeue_style( 'happy-icons' );
    wp_dequeue_style( 'happy-elementor-addons-1861' );    
    wp_dequeue_style( 'astra-addon-css' );    

}

//add_action('wp_enqueue_scripts', 're_enqueue_scripts', 999);

require_once ASTRA_THEME_DIR . '/astra-customize-hooks/term_heading_title.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/tag_categories_list_box.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_add_subject_information_post.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_custom_related_posts.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_admin_customize_author_box.php';

if ( ! function_exists('astra_custom_content_search') ) :   

    function astra_custom_content_search() {

       if ( is_search() ) : 

            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1; 
            
            $s = get_search_query();

            $args = array(

                'post_type' => 'post',
                's' => $s,
                'order' => 'desc',
                'orderby' => 'date',
                'paged' => $paged

            ); 

            $data = query_posts( $args ); ?>            
                            
            <div class="archive-articles-codeblock">

                <div class="article-normal-wrapper split-columns two-columns-layout">

                    <?php 
                        if ( have_posts() ) :

                            while ( have_posts() ) : the_post(); ?>

                                <article class="item-object">

                                    <?php __astra_archive_get_temp_post(); ?>

                                </article>

                    <?php   endwhile; ?>

                </div>
                
            </div>

            <?php 
                
                    $total_pages = $data->max_num_pages;

                    if ($total_pages > 1) :

                        $current_page = max(1, get_query_var('paged'));

                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text'    => __('« prev'),
                            'next_text'    => __('next »'),
                        ));

                    endif;

                endif;

                wp_reset_query(); ?>

            

<?php endif;

    }
    
endif;

function __search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);

// Add Bold to searched term
function highlight_results($text){

    if (is_search() && !is_admin()) {
        $sr = get_query_var('s');
        $keys = explode(' ', $sr);
        $keys = array_filter($keys);
        $text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}

add_filter('the_title', 'highlight_results');

function lafu_get_count_posts_of_subject($id) {

    

}

require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_customize_thumbnail_sizes.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_customize_sidebars.php';

require_once ASTRA_THEME_DIR . '/page-options/gifts_box/gifts_box.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/tinymce-all-features.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_customize_post_title_and_meta.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_admin_customize_comment_form_box.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_customize_footer_post.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_remove_all_empty_paragraphs.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_customize_heading_meta.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_remove_tag_in_slug.php';
require_once ASTRA_THEME_DIR . '/astra-customize-hooks/astra_gifts_box_before_related_box_on_mobile.php';
require_once ASTRA_THEME_DIR . '/modules/rating-stars/rating-start.php';

require_once ASTRA_THEME_DIR . '/astra-customize-hooks/lafubrand_print_author_contents.php';