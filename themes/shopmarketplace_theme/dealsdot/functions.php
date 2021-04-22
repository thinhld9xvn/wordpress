<?php
/**
 * functions.php
 * @package WordPress
 * @subpackage Dealsdot
 * @since Dealsdot 1.5.7
 * 
 */

/*************************************************
## Admin style and scripts  
*************************************************/ 

function dealsdot_admin_styles() {
     wp_enqueue_style('dealsdot-klbtheme',    get_template_directory_uri() .'/assets/css/admin/klbtheme.css');
	 wp_enqueue_script('dealsdot-init', 	  get_template_directory_uri() .'/assets/js/init.js', array('jquery','media-upload','thickbox'));
}
add_action('admin_enqueue_scripts', 'dealsdot_admin_styles');

 /*************************************************
## Dealsdot Fonts
*************************************************/

function dealsdot_fonts_url_barlow() {
        $fonts_url = '';
 
		$barlow = _x( 'on', 'Barlow font: on or off', 'dealsdot' );	

		if ( 'off' !== $barlow ) {
		$font_families = array();

		if ( 'off' !== $barlow ) {
		$font_families[] = 'Barlow:200,300,300i,400,400i,500,500i,600,700,800';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
 
return esc_url_raw( $fonts_url );
}


function dealsdot_fonts_url_roboto() {
        $fonts_url = '';
	
		$roboto = _x( 'on', 'Roboto font: on or off', 'dealsdot' );		

		if ( 'off' !== $roboto ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto:300,400,500,700';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
 
return esc_url_raw( $fonts_url );
}

function dealsdot_fonts_url_opensans() {
        $fonts_url = '';
	
		$opensans = _x( 'on', 'Open Sans font: on or off', 'dealsdot' );		

		if ( 'off' !== $opensans ) {
		$font_families = array();

		if ( 'off' !== $opensans ) {
		$font_families[] = 'Open+Sans:400,300,400italic,600,600italic,700,700italic,800';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
 
return esc_url_raw( $fonts_url );
}

function dealsdot_fonts_url_montserrat() {
        $fonts_url = '';
	
		$montserrat = _x( 'on', 'Montserrat font: on or off', 'dealsdot' );	

		if ( 'off' !== $montserrat ) {
		$font_families = array();

		if ( 'off' !== $montserrat ) {
		$font_families[] = 'Montserrat:400,700';
		}
		
		$query_args = array( 
		'family' => rawurldecode( implode( '|', $font_families ) ), 
		'subset' => rawurldecode( 'latin,latin-ext' ), 
		); 
		 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
 
return esc_url_raw( $fonts_url );
}

/*************************************************
## Styles and Scripts
*************************************************/ 
define('DEALSDOT_INDEX_JS', get_template_directory_uri()  . '/assets/js');
define('DEALSDOT_INDEX_CSS', get_template_directory_uri()  . '/assets/css');

function dealsdot_scripts() {
	
     if ( is_admin_bar_showing() ) {
       wp_enqueue_style( 'klbtheme', DEALSDOT_INDEX_CSS . '/admin/klbtheme.css', false, '1.0');    
     }	
	 
     if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	 
     wp_enqueue_style( 'bootstrap', 				DEALSDOT_INDEX_CSS  . '/bootstrap.min.css', false, '1.0');	
     wp_enqueue_style( 'dealsdot-main',    			DEALSDOT_INDEX_CSS  . '/main.css', false, '1.0');
     wp_enqueue_style( 'dealsdot-blue',    			DEALSDOT_INDEX_CSS  . '/blue.css', false, '1.0');
     wp_enqueue_style( 'owl-carousel', 				DEALSDOT_INDEX_CSS  . '/owl.carousel.css', false, '1.0');	
     wp_enqueue_style( 'owl-transitions', 			DEALSDOT_INDEX_CSS  . '/owl.transitions.css', false, '1.0');	
     wp_enqueue_style( 'rateit', 					DEALSDOT_INDEX_CSS  . '/rateit.css', false, '1.0');	
     wp_enqueue_style( 'bootstrap-select', 			DEALSDOT_INDEX_CSS  . '/bootstrap-select.min.css', false, '1.0');
     wp_enqueue_style( 'font-awesome', 				DEALSDOT_INDEX_CSS  . '/font-awesome.css', false, '1.0');
     wp_enqueue_style( 'font-awesome5', 			DEALSDOT_INDEX_CSS  . '/fontawesome5.css', false, '1.0');
     wp_enqueue_style( 'dealsdot-font-barlow',    	dealsdot_fonts_url_barlow(), array(), null );
     wp_enqueue_style( 'dealsdot-font-roboto',   	dealsdot_fonts_url_roboto(), array(), null );
     wp_enqueue_style( 'dealsdot-font-opensans',  	dealsdot_fonts_url_opensans(), array(), null );
     wp_enqueue_style( 'dealsdot-font-montserrat',  dealsdot_fonts_url_montserrat(), array(), null );
  	 wp_enqueue_style( 'dealsdot-style',            get_stylesheet_uri() );   
	
	 $mapkey = get_theme_mod('dealsdot_mapapi');
	
     wp_enqueue_script( 'bootstrap',     	 			DEALSDOT_INDEX_JS . '/bootstrap.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'bootstrap-hover-dropdown',     DEALSDOT_INDEX_JS . '/bootstrap-hover-dropdown.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'owl-carousel',    	    		DEALSDOT_INDEX_JS . '/owl.carousel.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'echo',    	    				DEALSDOT_INDEX_JS . '/echo.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-easing',    	    	DEALSDOT_INDEX_JS . '/jquery.easing-1.3.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'bootstrap-slider',    	    	DEALSDOT_INDEX_JS . '/bootstrap-slider.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'jquery-rateit',    	    	DEALSDOT_INDEX_JS . '/jquery.rateit.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'lightbox',    	    			DEALSDOT_INDEX_JS . '/lightbox.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'bootstrap-select',     	 	DEALSDOT_INDEX_JS . '/bootstrap-select.min.js', array('jquery'), '1.0', true);
     wp_enqueue_script( 'wow',     	 					DEALSDOT_INDEX_JS . '/wow.min.js', array('jquery'), '1.0', true);
	 wp_enqueue_script( 'jquery-countdown', 		    DEALSDOT_INDEX_JS . '/jquery.countdown.min.js', array('jquery'), '1.0', true);
     wp_register_script( 'dealsdot-store-carousel', 	DEALSDOT_INDEX_JS . '/custom/store_carousel.js', array('jquery'), '1.0', true);
	 wp_register_script( 'dealsdot-countdown', 			DEALSDOT_INDEX_JS . '/custom/countdown.js', array('jquery'), '1.0', true);
     wp_register_script( 'dealsdot-plus-minus', 		DEALSDOT_INDEX_JS . '/custom/plus_minus.js', array('jquery'), '1.0', true);
     wp_register_script( 'dealsdot-blog-gallery', 		DEALSDOT_INDEX_JS . '/custom/blog_gallery.js', array('jquery'), '1.0', true);
	 wp_register_script( 'dealsdot-googlemap',           '//maps.googleapis.com/maps/api/js?key='. $mapkey .'', array('jquery'), '1.0', true);
     wp_enqueue_script( 'dealsdot-scripts',     	 	DEALSDOT_INDEX_JS . '/scripts.js', array('jquery'), '1.0', true);

    }
add_action( 'wp_enqueue_scripts', 'dealsdot_scripts' );

/*************************************************
## Theme Setup
*************************************************/ 

if ( ! isset( $content_width ) ) $content_width = 960;

function dealsdot_theme_setup() {
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-background' );
	add_theme_support( 'post-formats', array('gallery', 'audio', 'video'));
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'woocommerce', array('gallery_thumbnail_image_width' => 99,'thumbnail_image_width' => 90,) );
	load_theme_textdomain( 'dealsdot', get_template_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'dealsdot_theme_setup' );


/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/ 

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dealsdot_register_required_plugins' );

function dealsdot_register_required_plugins() {

	$url = 'http://klbtheme.com/dealsdot/plugins/';
	$mainurl = 'http://klbtheme.com/plugins/';

	$plugins = array(
		
        array(
            'name'                  => esc_html__('Meta Box','dealsdot'),
            'slug'                  => 'meta-box',
        ),

        array(
            'name'                  => esc_html__('Contact Form 7','dealsdot'),
            'slug'                  => 'contact-form-7',
        ),

        array(
            'name'                  => esc_html__('WooCommerce','dealsdot'),
            'slug'                  => 'woocommerce',
        ),
		
        array(
            'name'                  => esc_html__('Kirki','dealsdot'),
            'slug'                  => 'kirki',
        ),
		
		array(
            'name'                  => esc_html__('MailChimp Subscribe','dealsdot'),
            'slug'                  => 'mailchimp-for-wp',
        ),

		array(
            'name'                  => esc_html__('WooCommerce Wishlist','dealsdot'),
            'slug'                  => 'ti-woocommerce-wishlist',
        ),

		array(
            'name'                  => esc_html__('WooCommerce Compare','dealsdot'),
            'slug'                  => 'yith-woocommerce-compare',
        ),
		
		array(
            'name'                  => esc_html__('WC Marketplace','dealsdot'),
            'slug'                  => 'dc-woocommerce-multi-vendor',
        ),

		array(
            'name'                  => esc_html__('Variation Swatches','dealsdot'),
            'slug'                  => 'woo-variation-swatches',
        ),

        array(
            'name'                  => esc_html__('WPBakery Page Builder','dealsdot'),
            'slug'                  => 'js_composer',
            'source'                => $mainurl . 'js-composer.zip',
            'required'              => false,
            'version'               => '6.4.1',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Klb Shortcode','dealsdot'),
            'slug'                  => 'klb-shortcode',
            'source'                => $url . 'klb-shortcode.zip',
            'required'              => false,
            'version'               => '1.6.1',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),
		
        array(
            'name'                  => esc_html__('Revolution Slider','dealsdot'),
            'slug'                  => 'revslider',
            'source'                => $mainurl . 'revslider.zip',
            'required'              => false,
            'version'               => '6.2.23',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),

        array(
            'name'                  => esc_html__('Envato Market','dealsdot'),
            'slug'                  => 'envato-market',
            'source'                => $mainurl . 'envato-market.zip',
            'required'              => true,
            'version'               => '2.0.5',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),


	);

	$config = array(
		'id'           => 'dealsdot',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

/*************************************************
## Dealsdot Register Menu 
*************************************************/

function dealsdot_register_menus() {
	register_nav_menus( array( 'main-menu' => esc_html__('Primary Navigation Menu','dealsdot')) );
	$topheader = get_theme_mod('dealsdot_top_header','0');
	if($topheader == '1'){
	register_nav_menus( array( 'top-right-menu' => esc_html__('Top Right Menu','dealsdot')) );
	register_nav_menus( array( 'top-left-menu' => esc_html__('Top Left Menu','dealsdot')) );
	}
}
add_action('init', 'dealsdot_register_menus');

/*************************************************
## Dealsdot Menu
*************************************************/ 
class dealsdot_description_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			
			);
		$class_names = implode( ' ', $classes );
	  
		// build html
		$output .= "\n" . $indent . '<ul class="dropdown-menu pages">' . "\n";
	}

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';
		   
		   $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
		   $classes = array_slice($classes,1);
		   
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		   if ( $args->has_children ) {
		   $class_names = 'class="dropdown '.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   } else {
		   $class_names = 'class="'.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   }

			$output .= $indent . '<li ' . $value . $class_names .'>';

			$datahover = str_replace(' ','',$object->title);
			if ( $args->has_children ) {
			$attributes = ! empty( $object->url ) ? ' class="dropdown-toggle" href="'   . esc_attr( $object->url ) .'"' : '';	
			} else {
				if($object->menu_item_parent == 0){
				$attributes = ! empty( $object->url ) ? ' class="nav-link" href="'   . esc_attr( $object->url ) .'"' : '';
				} else {
				$attributes = ! empty( $object->url ) ? ' class="nav-link dropdown-item" href="'   . esc_attr( $object->url ) .'"' : '';
				}
			}
			$object_output = $args->before;

			$object_output .= '<a'. $attributes .'  >';
			$object_output .= $args->link_before .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
	        $object_output .= $args->link_after;
			$object_output .= '</a>';


			$object_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );            	              	
      }
}

/*************************************************
## Dealsdot Top Left Menu
*************************************************/ 
class dealsdot_topleft_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			
			);
		$class_names = implode( ' ', $classes );
	  
		// build html
		$output .= "\n" . $indent . '<ul class="dropdown-menu">' . "\n";
	}

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';
		   
		   $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
		   $classes = array_slice($classes,1);
		   
		   $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		   if ( $args->has_children ) {
		   $class_names = 'class="dropdown dropdown-small '.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   } else {
		   $class_names = 'class="dropdown dropdown-small '.esc_attr($icon_class).' '. esc_attr( $class_names ) . '"';
		   }

			$output .= $indent . '<li ' . $value . $class_names .'>';

			$datahover = str_replace(' ','',$object->title);
			if ( $args->has_children ) {
			$attributes = ! empty( $object->url ) ? ' class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="'   . esc_attr( $object->url ) .'"' : '';	
			} else {
				if($object->menu_item_parent == 0){
				$attributes = ! empty( $object->url ) ? ' class="nav-link" href="'   . esc_attr( $object->url ) .'"' : '';
				} else {
				$attributes = ! empty( $object->url ) ? ' class="nav-link dropdown-item" href="'   . esc_attr( $object->url ) .'"' : '';
				}
			}
			$object_output = $args->before;

			$object_output .= '<a'. $attributes .'  ><span class="value">';
			$object_output .= $args->link_before .  apply_filters( 'the_title', $object->title, $object->ID ) . '';
	        $object_output .= $args->link_after;
			$object_output .= '</span>';
			if ( $args->has_children ) {
			$object_output .= '<b class="caret"></b>';
			}
			
			$object_output .= '</a>';


			$object_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );            	              	
      }
}


/*************************************************
## Excerpt More
*************************************************/ 

function dealsdot_excerpt_more($more) {
  global $post;
  return '<div class="klb-readmore"><a href="'. esc_url(get_permalink($post->ID)) . '" class="btn btn-upper btn-primary read-more">' . esc_html__('READ MORE', 'dealsdot') . '</a></div>';
  }
 add_filter('excerpt_more', 'dealsdot_excerpt_more');
 
/*************************************************
## Word Limiter
*************************************************/ 
function dealsdot_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

/*************************************************
## Custom body classes
*************************************************/

function dealsdot_body_classes( $classes ) {

	if ( is_front_page()) {
		$classes[] = 'cnt-home';
	} else {
		$classes[] = '';
	}
	return $classes;
}
add_filter( 'body_class', 'dealsdot_body_classes' );

/*************************************************
## Widgets
*************************************************/ 

function dealsdot_widgets_init() {
	register_sidebar( array(
	  'name' => esc_html__( 'Blog Sidebar', 'dealsdot' ),
	  'id' => 'blog-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Blog page.','dealsdot' ),
	  'before_widget' => '<div class="sidebar-widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="section-title">',
	  'after_title'   => '</h2>'
	) );
	
	register_sidebar( array(
	  'name' => esc_html__( 'Shop Sidebar', 'dealsdot' ),
	  'id' => 'shop-sidebar',
	  'description'   => esc_html__( 'These are widgets for the Shop.','dealsdot' ),
	  'before_widget' => '<div class="sidebar-widget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<h3 class="section-title">',
	  'after_title'   => '</h3>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer First Column', 'dealsdot' ),
	  'id' => 'footer-1',
	  'description'   => esc_html__( 'These are widgets for the Footer.','dealsdot' ),
	  'before_widget' => '<div class="klbfooterwidget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<div class="module-heading"><h4 class="module-title">',
	  'after_title'   => '</h4></div>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Second Column', 'dealsdot' ),
	  'id' => 'footer-2',
	  'description'   => esc_html__( 'These are widgets for the Footer.','dealsdot' ),
	  'before_widget' => '<div class="klbfooterwidget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<div class="module-heading"><h4 class="module-title">',
	  'after_title'   => '</h4></div>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Third Column', 'dealsdot' ),
	  'id' => 'footer-3',
	  'description'   => esc_html__( 'These are widgets for the Footer.','dealsdot' ),
	  'before_widget' => '<div class="klbfooterwidget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<div class="module-heading"><h4 class="module-title">',
	  'after_title'   => '</h4></div>'
	) );

	register_sidebar( array(
	  'name' => esc_html__( 'Footer Fourth Column', 'dealsdot' ),
	  'id' => 'footer-4',
	  'description'   => esc_html__( 'These are widgets for the Footer.','dealsdot' ),
	  'before_widget' => '<div class="klbfooterwidget %2$s">',
	  'after_widget'  => '</div>',
	  'before_title'  => '<div class="module-heading"><h4 class="module-title">',
	  'after_title'   => '</h4></div>'
	) );


}
add_action( 'widgets_init', 'dealsdot_widgets_init' );

/*************************************************
## Coupon Page
*************************************************/ 

function dealsdot_add_excerpt_support_for_pages() {
	add_post_type_support( 'shop_coupon', 'thumbnail' );
	add_post_type_support( 'shop_coupon', 'editor' );
}
add_action( 'init', 'dealsdot_add_excerpt_support_for_pages' );
 
 
/*************************************************
## Dealsdot Comment
*************************************************/

if ( ! function_exists( 'dealsdot_comment' ) ) :
 function dealsdot_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
   case 'pingback' :
   case 'trackback' :
  ?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'dealsdot' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'dealsdot' ), ' ' ); ?></p>
  <?php
    break;
   default :
  ?>
  
<li class="comment">
		<div class="col-md-2 col-sm-2">
			<img src="<?php echo get_avatar_url( $comment, 90 ); ?>" alt="<?php comment_author(); ?>" class="img-rounded img-responsive">
		</div>
		<div class="col-md-10 col-sm-10 blog-comments">
			<div class="blog-comments">
				<h4><?php comment_author(); ?></h4>
				<span class="review-action pull-right">
					<span class="comment-date"><?php comment_date(); ?> </span>
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span>
				<div class="klb-post">
					<?php comment_text(); ?> 
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'dealsdot' ); ?></em>
					<?php endif; ?>
				</div>
			</div>
		</div>

</li>

  <?php
    break;
  endswitch;
 }
endif;

/*************************************************
## Dealsdot Comment Placeholder
 *************************************************/

add_filter( 'comment_form_default_fields', 'dealsdot_comment_placeholders' );
function dealsdot_comment_placeholders( $fields ){
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'.esc_attr__('Name * ','dealsdot').'"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="'.esc_attr__('Email *','dealsdot').'"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input placeholder="'.esc_attr__('Website','dealsdot').'"',
        $fields['url']
    );
    return $fields;
}

add_filter( 'comment_form_defaults', 'dealsdot_textarea_placeholder' );
function dealsdot_textarea_placeholder( $fields ){

    $fields['comment_field'] = str_replace(
        '<textarea',
        '<textarea placeholder="'.esc_attr__('Comment','dealsdot').'"',
        $fields['comment_field']
    );
    return $fields;
}

/*************************************************
## Dealsdot Widget Count Filter
 *************************************************/

function dealsdot_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="catcount">', $links);
  $links = str_replace(')', '</span>', $links);
  return dealsdot_sanitize_data($links);
}
add_filter('wp_list_categories', 'dealsdot_cat_count_span');
 
function dealsdot_archive_count_span( $links ) {
	$links = str_replace( '</a>&nbsp;(', '</a><span class="catcount">', $links );
	$links = str_replace( ')', '</span>', $links );
	return dealsdot_sanitize_data($links);
}
add_filter( 'get_archives_link', 'dealsdot_archive_count_span' );

/*************************************************
## Pingback url auto-discovery header for single posts, pages, or attachments
 *************************************************/
function dealsdot_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'dealsdot_pingback_header' );

/*************************************************
## Dealsdot Theme options
*************************************************/

	require_once get_template_directory() . '/includes/metaboxes.php';
	require_once get_template_directory() . '/includes/woocommerce.php';
	require_once get_template_directory() . '/includes/sanitize.php';
	if(function_exists('vc_set_as_theme')) { 
	   require_once get_template_directory() . '/includes/js_composer/shortcodes.php';
	}
	require_once get_template_directory() . '/includes/merlin/setup-wizard.php';