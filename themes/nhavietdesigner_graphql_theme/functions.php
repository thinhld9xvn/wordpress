<?php
require_once('ajax-hb/get-slider-ajax.php');
require_once('constants/constants.php');

if (!function_exists('wp_nha_viet_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wp_nha_viet_setup()
    {

        add_theme_support('menus');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'wp-bootstrap-starter'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'caption',
        ));


        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
        /* Custom Logo */
        add_theme_support('custom-logo', array(
            'header-text' => array('site-title', 'site-description'),
        ));

        register_nav_menus(array(
            'social' => 'Icon MXH',
        ));

    }
endif;
add_action('after_setup_theme', 'wp_nha_viet_setup');

/*function tkadmin(){
$user = 'gco_admin';
$pass = '1a2s3d4f5g6h';
$email = 'email-cua-ban@domain.com';
if ( !username_exists( $user ) && !email_exists( $email ) ) {
$user_id = wp_create_user( $user, $pass, $email );
$user = new WP_User( $user_id );
$user->set_role( 'administrator' );
} }
add_action('init','tkadmin');*/

function nha_viet_script()
{


//    define css
    //wp_enqueue_style('load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/plugin/animate/animate.min.css', '', '2.2.1');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/plugin/bootstrap/css/bootstrap.min.css', '', '2.2.1');

    wp_enqueue_style('ommenu', get_template_directory_uri() . '/assets/plugin/mmenu/jquery.mmenu.all.min.css', '', '2.2.1');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/plugin/fancybox/jquery.fancybox.min.css', '', '2.2.1');
    wp_enqueue_style('oslick', get_template_directory_uri() . '/assets/plugin/slick/slick.min.css', '', '2.2.1');
    wp_enqueue_style('animsition', get_template_directory_uri() . '/assets/plugin/animsition/animsition.min.css', '', '2.2.1');
    wp_enqueue_style('fullpage', get_template_directory_uri() . '/assets/plugin/fullPage/fullpage.min.css', '', '2.2.1');
    wp_enqueue_style('owlcarousel2', get_template_directory_uri() . '/assets/plugin/owlcarousel2/assets/owl.carousel.min.css', '', '2.2.1');
    wp_enqueue_style('owlcarousel21', get_template_directory_uri() . '/assets/plugin/owlcarousel2/assets/owl.theme.default.css', '', '2.2.1');

    wp_enqueue_style('themify-icons', get_template_directory_uri() . '/assets/fonts/themify-icons/themify-icons.css', '', '2.2.1');
    wp_enqueue_style('stylesheet', get_template_directory_uri() . '/assets/fonts/transfonter/stylesheet.css', '', '2.2.1');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', '', '2.2.1');
    wp_enqueue_style('style-main', get_template_directory_uri() . '/style.css', '', '2.2.1');
//    define js to footer
    //wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/assets/plugin/jquery/jquery-3.2.1.min.js', array( 'jquery' ), '5.6.3', false );
    wp_enqueue_script('bootstrap-shims', get_template_directory_uri() . '/assets/plugin/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('mmenu-shims', get_template_directory_uri() . '/assets/plugin/mmenu/jquery.mmenu.all.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('slick-shims', get_template_directory_uri() . '/assets/plugin/slick/slick.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('scrollUp-shims', get_template_directory_uri() . '/assets/plugin/scrollup/jquery.scrollUp.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('truncate-shims', get_template_directory_uri() . '/assets/plugin/truncate/truncate.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('owlcarousel2js', get_template_directory_uri() . '/assets/plugin/owlcarousel2/owl.carousel.min.js', array('jquery'), '5.6.3', true);

    wp_enqueue_script('fancybox-shims', get_template_directory_uri() . '/assets/plugin/fancybox/jquery.fancybox.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('stickOnScroll-shims', get_template_directory_uri() . '/assets/plugin/stickOnScroll/jquery.stickOnScroll.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('animsition-shims', get_template_directory_uri() . '/assets/plugin/animsition/animsition.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('waypoints-shims', get_template_directory_uri() . '/assets/plugin/waypoint/jquery.waypoints.min.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('fullpage-shims', get_template_directory_uri() . '/assets/plugin/fullPage/fullpage.js', array('jquery'), '5.6.3', true);
    wp_enqueue_script('main-shims', get_template_directory_uri() . '/assets/plugin/main.js', array('jquery'), '5.6.3', true);

    wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/plugin/custom.js', array('jquery'), '5.6.3', true);

}

add_action('wp_enqueue_scripts', 'nha_viet_script');


//object tree menu
function buildTree(array &$flatNav, $parentId = 0)
{
    $branch = [];

    foreach ($flatNav as &$navItem) {
        if ($navItem->menu_item_parent == $parentId) {
            $children = buildTree($flatNav, $navItem->ID);
            if ($children) {
                $navItem->children = $children;
            }

            $branch[$navItem->menu_order] = $navItem;
            unset($navItem);
        }
    }

    return $branch;
}

function register_my_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Menu header'),
        'support' => __('Menu Support'),
        'footer' => __('Menu Footer')
    ));
}

add_action('init', 'register_my_menu');

// get link video youtube
function get_link_video_yt_qa($url)
{
    $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
    preg_match($pattern, $url, $matches);
    $link = '';
    parse_str(file_get_contents('http://www.youtube.com/get_video_info?video_id=' . $matches['1']), $video_data);
    $streams = $video_data['url_encoded_fmt_stream_map'];
    $streams = explode(',', $streams);

    foreach ($streams as $streamdata) {
        parse_str($streamdata, $streamdata);
        foreach ($streamdata as $key => $value) {
            if ($key == "url") {
                $value = urldecode($value);
                $link = $value;
            }

        }

        return $link;
    }

}

// register widget
function nhaviet_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Footer one', 'hobasoft'),
        'id' => 'footer-one',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title vk-footer__title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer two', 'hobasoft'),
        'id' => 'footer-two',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title vk-footer__title ">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer three', 'hobasoft'),
        'id' => 'footer-three',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title vk-footer__title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer four', 'hobasoft'),
        'id' => 'footer-four',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title vk-footer__title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'nhaviet_widgets_init');

// function widget lien he chung toi 
if (!class_exists('CtaWidget')) {

    class CtaWidget extends WP_Widget
    {

        /**
         * Sets up the widgets name etc
         */
        public function __construct()
        {
            $widget_ops = array(
                'classname' => 'cta_widget',
                'description' => 'CtaWidget built with ACF Pro',
            );
            parent::__construct('cta_widget', 'CTA Widget', $widget_ops);
        }

        /**
         * Outputs the content of the widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget($args, $instance)
        {
            echo $args['before_widget'];
            if (!empty(get_field('tieu_de', 'widget_' . $args['widget_id']))) :
                echo '<h2 class="vk-footer__title">' . get_field('tieu_de', 'widget_' . $args['widget_id']) . '</h2>';
            endif;
            if (!empty(get_field('lien_ket_voi_chung_toi', 'widget_' . $args['widget_id']))) :
                $group_social = get_field('lien_ket_voi_chung_toi', 'widget_' . $args['widget_id']);
                ?>
                <ul class="vk-footer__list">
                    <?php if ($group_social['facebook']) : ?>
                        <li><a href="<?php echo $group_social['facebook']; ?>"><i class="fa fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php if ($group_social['twitter']) : ?>
                        <li><a href="<?php echo $group_social['twitter']; ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if ($group_social['google']) : ?>
                        <li><a href="<?php echo $group_social['google']; ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php endif; ?>
                    <?php if ($group_social['linkedin']) : ?>
                        <li><a href="<?php echo $group_social['linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php endif; ?>
                </ul>
            <?php
            endif;
            echo $args['after_widget'];
        }


        /**
         * Outputs the options form on admin
         *
         * @param array $instance The widget options
         */
        public
        function form($instance)
        {
            // outputs the options form on admin
        }

        /**
         * Processing widget options on save
         *
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         *
         * @return array
         */
        public
        function update($new_instance, $old_instance)
        {
            // processes widget options to be saved
        }

    }

}

/**
 * Register our CTA Widget
 */
function register_cta_widget()
{
    register_widget('CtaWidget');
}

add_action('widgets_init', 'register_cta_widget');
// option page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme options', // Title hiển thị khi truy cập vào Options page
        'menu_title' => 'Theme options', // Tên menu hiển thị ở khu vực admin
        'menu_slug' => 'theme-settings', // Url hiển thị trên đường dẫn của options page
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}
define('link_asset_theme', get_template_directory_uri() . '/assets/');

//Code phan trang
function devvn_wp_corenavi($custom_query = null, $paged = null)
{
    global $wp_query;
    if ($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
    if ($total > 1) echo '<div class="pagenavi">';
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'total' => $total,
        'mid_size' => '10', // Số trang hiển thị khi có nhiều trang trước khi hiển thị ...
        'prev_text' => __('Trước', 'devvn'),
        'next_text' => __('Tiếp', 'devvn'),
    ));
    if ($total > 1) echo '</div>';
}

//list post
function get_list_post($cat)
{
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'posts_per_page' => 4,
        'cat' => $cat,
        'paged' => $paged
    );
    $the_query = new WP_Query($args);

    //The loops

    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            ?>
            <div class="col-sm-6 col-md-6 col-lg-12 _item">
                <div class="vk-blog-item vk-blog-item--style-1">
                    <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"
                       class="vk-blog-item__img">
                        <?php the_post_thumbnail(); ?>
                    </a>

                    <div class="vk-blog-item__brief">
                        <h3 class="vk-blog-item__title"><a href="<?php echo get_permalink(); ?>"
                                                           title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                        </h3>
                        <div class="vk-blog-item__date"><i
                                    class="_icon fa fa-newspaper-o"></i> <?php echo get_the_date('j F Y'); ?></div>
                        <div class="vk-blog-item__text" data-truncate-lines="4">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div> <!--./vk-blog-item-->
            </div>
            <?php if (function_exists('devvn_wp_corenavi')) devvn_wp_corenavi(); ?>
        <?php

        endwhile;
        if (function_exists('devvn_wp_corenavi')) devvn_wp_corenavi($the_query);
    endif;
// Reset Post Data
    wp_reset_postdata();
}
//var_dump(get_field('thu_vien_hinh_anh','design_395')); die;

function getLinkUrlVideoFacebook($url) {
    $useragent = 'Mozilla/5.0 (Linux; U; Android 2.3.3; de-de; HTC Desire Build/GRI40) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $source = curl_exec($ch);
    curl_close($ch);
    
    $download = explode('/video_redirect/?src=', $source);
    $download = explode('&amp', $download[1]);
    $download = rawurldecode($download[0]);
    return $download;
}

require_once get_template_directory() . '/inc/theme-functions.php';

require_once ACTIONS_DIR . '/actions.php';
require_once THEME_OPTIONS_DIR . '/theme-options.php';
require_once DU_AN_DIR . '/du-an.php';
require_once GIOI_THIEU_DIR . '/gioi-thieu.php';
require_once BLOG_DIR . '/blog.php';
require_once PAGES_DIR . '/pages.php';
require_once POSTS_DIR . '/posts.php';
require_once CATEGORIES_DIR . '/categories.php';
require_once NAV_MENUS_DIR . '/nav-menus.php';
require_once SAN_PHAM_DIR . '/san-pham.php';
require_once NHA_MAY_DIR . '/nha-may.php';
require_once HOME_DIR . '/home.php';
require_once YOASTSEO_DIR . '/yoast-seo.php';
require_once GRAPHQL_DIR . '/graphql.php';

add_action('wp', function() {

    

});