<?php
	
	if ( session_status() == PHP_SESSION_NONE ) :
        session_start();
    endif; 

	define('MY_THEME_DIR', strtolower(get_template_directory()));
	define('MY_THEME_DIR_URI', strtolower(get_template_directory_uri()));

	require_once MY_THEME_DIR . '/inc/constants.php';	

	require_once LOGO_CLASS_DIR . '/logo.php';

	require_once SOCIAL_NETWORK_CLASS_DIR . '/social-network.php';

	require_once SLIDER_CLASS_DIR . '/slider.php';

	require_once  GT_SECTION_CLASS_DIR . '/gioithieu.php';

	require_once  SERVICE_SECTION_CLASS_DIR . '/dichvu.php';

	require_once  NEWS_SECTION_CLASS_DIR . '/tintuc.php';

	require_once  GALLERIES_SECTION_CLASS_DIR . '/thuvienanh.php';

	require_once  REVIEWS_SECTION_CLASS_DIR . '/danhgia.php';

	require_once  FOOTER_CLASS_DIR . '/footer.php';

	require_once NAVIGATION_SIDEBAR_CLASS_DIR . '/navigation-sidebar.php';

	require_once WIDGETS_EXTRAS_DIR . '/widget.php';

	require_once ARCHIVE_SERVICE_CLASS_DIR . '/dichvu.php';

	require_once ARCHIVE_TINTUC_CLASS_DIR . '/tintuc.php';

	require_once ARCHIVE_UUDAI_CLASS_DIR . '/uudai.php';

	require_once ARCHIVE_GALLERIES_CLASS_DIR . '/galleries.php';

	require_once PAGE_CLASS_DIR. '/page.php';

	require_once SEARCH_CLASS_DIR. '/search.php';

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
	
	add_action( 'graphql_register_types', function() {
		register_graphql_field( 'RootQuery', 'hello', [
		  'type' => 'String',
		  'args' => [
			 'name' => [
			   'type' => 'String',
			   'description' => __( 'Enter your name so GraphQL can say hello to you', 'your-textdomain' ),
			 ]
		  ],
		  'resolve' => function( $root, $args, $context, $info ) {
			
			// if the name argument was input in the query, return it
			return ( isset( $args['name'] ) ? $args['name'] : 'world');
	  
		  },
		]);
	  } );