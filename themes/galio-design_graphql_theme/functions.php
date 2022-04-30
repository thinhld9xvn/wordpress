<?php

use CTInfo\CTInfoGetContactFormUtils;
use Projects\PROJECT_FIELDS;

if ( session_status() == PHP_SESSION_NONE ) :
        session_start();
    endif; 

	define('MY_THEME_DIR', strtolower(get_template_directory()));
	define('MY_THEME_DIR_URI', strtolower(get_template_directory_uri()));

	require_once MY_THEME_DIR . '/inc/constants.php';	

	require_once LOGO_CLASS_DIR . '/logo.php';
	require_once CTINFO_CLASS_DIR . '/ctinfo.php';
	require_once HOME_CLASS_DIR . '/home.php';
	require_once GIOITHIEU_PAGE_CLASS_DIR . '/gioithieu.php';
	require_once PROJECTS_CLASS_DIR . '/projects.php';
	require_once MEDIA_CLASS_DIR . '/media.php';
	require_once VIDEO_CLASS_DIR . '/video.php';
	require_once RECRUITMENT_CLASS_DIR . '/recruitment.php';
	require_once SOCIAL_NETWORK_CLASS_DIR . '/social-network.php';
	require_once NAV_MENUS_CLASS_DIR . '/nav-menus.php';
	require_once POSTS_CLASS_DIR . '/posts.php';
	require_once PAGES_CLASS_DIR . '/pages.php';
	require_once CATEGORIES_CLASS_DIR . '/categories.php';
	require_once TAX_CLASS_DIR . '/taxonomies.php';
	require_once FOOTER_PAGE_CLASS_DIR . '/footer-page.php';
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

		//echo "<pre>";
		//$meta = get_post_meta(175, '_pt-field-groupbox-user-item', true);
		//update_post_meta(19, '_pt-field-groupbox-user-item', $meta);
		//die();

		/*echo "<pre>";
		$cfid = CONTACT_FORM_EN_ID ;
        $cftitle = CONTACT_FORM_TITLE_EN_ID ;
		echo CTInfoGetContactFormUtils::get($cfid, $cftitle);
		die();*/
		/*echo "<pre>";
		$field = get_post_meta(191, PROJECT_FIELDS::GALLERIES_FIELD, true);
		$field = array_map(function($item) {
			$itemGalleriesRow = [];
			foreach($item[PROJECT_FIELDS::GALLERY_SETOF_FIELD] as $key => $gallery) :
				$results = [];
				$thumbnail_id = pn_get_attachment_id_from_url($gallery[PROJECT_FIELDS::THUMBNAIL_GQL_FIELD]);
				$results[PROJECT_FIELDS::THUMBNAIL_GQL_FIELD] = wp_get_attachment_image_url($thumbnail_id, 'feature_image_project_thumbnail');
				$results[PROJECT_FIELDS::FULL_IMAGE_GQL_FIELD] = wp_get_attachment_image_url($thumbnail_id, 'full');
				$itemGalleriesRow[] = $results;
			endforeach;
			return ['data' => $itemGalleriesRow];
		}, $field);
		print_r($field);
		die();*/
		//print_r(\Projects\ProjectsGetMetaGalleriesUtils::get(191)); die();

	});

	function clonePostMeta($formId, $toId) {

		$meta = get_post_meta($formId);
		unset($meta['_edit_last']);
		unset($meta['_edit_lock']);

		foreach( $meta as $key => $value ) :

			$v = $value[0];

			if ( is_serialized($v) ) :

				$v = unserialize($v);				

			endif;

			update_post_meta($toId, $key, $v);

		endforeach;	

	}

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