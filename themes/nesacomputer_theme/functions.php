<?php
	if ( session_status() == PHP_SESSION_NONE ) :
        session_start();
    endif; 
	define('MY_THEME_DIR', strtolower(get_template_directory()));
	define('MY_THEME_DIR_URI', strtolower(get_template_directory_uri()));
	require_once MY_THEME_DIR . '/inc/constants.php';	
	require_once LOGO_CLASS_DIR . '/logo.php';
	require_once TAX_CLASS_DIR . '/taxonomies.php';
	require_once PRODUCTS_CLASS_DIR . '/products.php';
	require_once FILTERBAR_CLASS_DIR . '/filterbar.php';
	require_once RATINGSTARS_CLASS_DIR . '/ratingstars.php';
	require_once DUMP_CLASS_DIR . '/dump.php';
	require_once MEMBERSHIP_CLASS_DIR . '/membership.php';
	require_once COMMENTS_CLASS_DIR . '/comments.php';
	require_once MY_THEME_DIR . '/classes/theme_options/theme_options.php';
	// Libraries Theme	
	require_once MY_THEME_DIR . '/inc/theme-enqueue.php';
	require_once MY_THEME_DIR . '/inc/theme-hooks.php';
	require_once MY_THEME_DIR . '/inc/theme-sidebars.php';
	require_once MY_THEME_DIR . '/inc/theme-menu-walker.php';
	require_once MY_THEME_DIR . '/inc/theme-functions.php';
	require_once MY_THEME_DIR . '/inc/theme-settings.php';
	require_once MY_THEME_DIR . '/inc/theme-nav-menus.php';
	require_once MY_THEME_DIR  . '/theme_settings/custom_post_types/options.php';
	require_once MY_THEME_DIR . '/theme_settings/theme_options/options.php';
	require_once MY_THEME_DIR . '/theme_settings/metaboxes/options.php';	
	function get_pas($pa) {
		$args = [
			'hide_empty' => false,
			'taxonomy' => $pa,
			'parent' => 0
		];
		return get_terms($args);
	}
	add_action('wp_loaded', function() {	
		//\Dump\Dump::start();	
	});
	function check_attachment_exist($file) {
		$file_headers = @get_headers($file);
		$exists = true;
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$exists = false;
		}
		return $exists;
	}