<?php
	
	if ( session_status() == PHP_SESSION_NONE ) :
        session_start();
    endif; 

	define('MY_THEME_DIR', strtolower(get_template_directory()));
	define('MY_THEME_DIR_URI', strtolower(get_template_directory_uri()));

	require_once MY_THEME_DIR . '/inc/constants.php';	

	require_once ATTACHMENTS_CLASS_DIR. '/attachments.php';

	require_once LOGO_CLASS_DIR . '/logo.php';

	require_once CTINFO_CLASS_DIR . '/ctinfo.php';

	require_once SOCIAL_NETWORK_CLASS_DIR . '/social-network.php';
	
	require_once WIDGETS_EXTRAS_DIR . '/widget.php';

	require_once NAV_MENUS_CLASS_DIR . '/nav-menus.php';

	//require_once PARTNERS_CLASS_DIR . '/partners.php';

	//require_once BANNERS_CLASS_DIR . '/banners.php';

	require_once PRODUCTS_CLASS_DIR . '/products.php';

	require_once SLIDER_CLASS_DIR . '/slider.php';

	require_once POSTS_CLASS_DIR . '/posts.php';

	require_once PAGES_CLASS_DIR . '/pages.php';

	require_once PORTFOLIO_CLASS_DIR . '/portfolio.php';

	require_once SALESOFF_CLASS_DIR . '/sales-off.php';

	require_once PROMOTIONS_CLASS_DIR . '/promotions.php';
	
	require_once PAYMENTS_CLASS_DIR . '/payments.php';

	require_once DELIVERY_SECTION_CLASS_DIR . '/delivery.php';

	require_once MY_THEME_DIR . '/classes/actions/actions.php';

	require_once MY_THEME_DIR . '/classes/theme_options/theme_options.php';

	// Libraries Theme	
	require_once MY_THEME_DIR . '/inc/theme-hooks.php';
	require_once MY_THEME_DIR . '/inc/theme-sidebars.php';
	require_once MY_THEME_DIR . '/inc/theme-menu-walker.php';
	require_once MY_THEME_DIR . '/inc/theme-functions.php';
	require_once MY_THEME_DIR . '/inc/theme-settings.php';
	require_once MY_THEME_DIR . '/inc/theme-nav-menus.php';

	require_once MY_THEME_DIR  . '/theme_settings/custom_post_types/options.php';
	require_once MY_THEME_DIR . '/theme_settings/theme_options/options.php';
	require_once MY_THEME_DIR . '/theme_settings/metaboxes/options.php';	

	require_once GRAPHQL_CLASS_DIR . '/graphql.php';	

	add_action('wp_loaded', function() {

		//convertToWebpUri("http://wp-cyberstore.io/wp-content/uploads/2021/06/h1-product-3-800x600-1-381x285.jpg"); die();

	});

	function check_attachment_exist($file) {

		$file_headers = @get_headers($file);

		$exists = true;

		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$exists = false;
		}
		
		return $exists;

	}

	function convertToWebpUri($url) {

		$webp_attachment = preg_replace("/\/uploads\//", "/uploads-webpc/uploads/", $url);
		$webp_attachment = $webp_attachment . '.webp';

		$pos = strpos($webp_attachment, "/wp-content");	

		$path = ABSPATH . substr($webp_attachment, $pos + 1);

		if ( file_exists($path) ) :

			return $webp_attachment;

		endif;

		return $url;

	}

	function register_gatsby_build_menubar() {

		global $wp_admin_bar;	

		$args = array(
			"id" => "gatsby-build-site",
			"title" => "Build Gatsby",
			"href" => "#",
			"meta" => array(
				"class" => ""
			)
		);

		$contents = trim(file_get_contents(ABSPATH . '/gatsby.log'));

		if ( $contents === 'building' ) {

			$args['title'] = $args['title'] . ' <span class="gatsby-processing">(processing, please wait ...)</span>';
			$args['meta']['class'] = "disabled";

		}

		$wp_admin_bar->add_menu( $args );
	}

	add_action( 'admin_bar_menu', 'register_gatsby_build_menubar', 500 );

	function sb_response_gatsby_nodejs_callback() {

		file_put_contents(ABSPATH . '/gatsby.log', "done");

		return 'success';
	}

	function sb_ajax_gatsby_doing_callback() {
		
		file_put_contents(ABSPATH . '/gatsby.log', "building");

		echo 'success';

		die();

	}

	add_action('wp_ajax_sb_gatsby_building_callback', 'sb_ajax_gatsby_doing_callback');
	add_action('wp_nopriv_ajax_sb_gatsby_building_callback', 'sb_ajax_gatsby_doing_callback');

	function add_cors_http_header(){
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Headers: *');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE');
		header('Access-Control-Allow-Credentials: true');
	}
	add_action('init','add_cors_http_header');

	add_action('wp_ajax_nopriv_xhrLink', 'handleXhrLink');	

	add_action( 'rest_api_init', function ($server ) {

		$server->register_route( 'gatsby-action', '/gatsby-action', array(
		  'methods' => 'GET',
		  'callback' => 'sb_response_gatsby_nodejs_callback',
		) );

	  } );