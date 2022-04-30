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

	require_once PARTNERS_CLASS_DIR . '/partners.php';

	require_once BANNERS_CLASS_DIR . '/banners.php';

	require_once PRODUCTS_CLASS_DIR . '/products.php';

	require_once STORIES_CLASS_DIR . '/stories.php';

	require_once SLIDER_CLASS_DIR . '/slider.php';

	require_once CLIENTS_CLASS_DIR . '/clients.php';

	require_once POSTS_CLASS_DIR . '/posts.php';

	require_once PAGES_CLASS_DIR . '/pages.php';

	require_once CATEGORIES_CLASS_DIR . '/categories.php';

	require_once NOTIFICATIONS_CLASS_DIR . '/notifications.php';

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
		/*echo "<pre>";
		\Nav_Menus\NavMenusGetMenuItemsListUtils::get('9');
		die();*/
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

		if ( ! empty($url) ) :

			$webp_attachment = preg_replace("/\/uploads\//", "/uploads-webpc/", $url);
			$webp_attachment = $webp_attachment . '.webp';

			if ( check_attachment_exist($webp_attachment) ) {

				return $webp_attachment;

			}	
			
			return $url;

		endif;

		return '';

	}	
 
	function wpdocs_set_notify_publish_post($new_status, $old_status=null, $post=null) {

		if ( $post->post_type === 'clients' ) {

			return;

		}

		if ($new_status == "publish"){

			if ( $old_status === 'auto-draft' || $old_status === 'draft' ) {

				$token = base64_encode(time());

				$data = array(
					'token' => $token,
					'slug' => $post->post_name,
					'type' => $post->post_type,
					'title' => $post->post_title,
					'excerpt' => $post->post_excerpt,
					'thumbnail' => get_the_post_thumbnail_url($post, 'post-thumbnail')
				);

				update_option(NEW_POST_TOKEN, json_encode($data));

			}

		}

	}

	add_action( "transition_post_status", 'wpdocs_set_notify_publish_post', 10, 3 );