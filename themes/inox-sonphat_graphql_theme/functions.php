<?php

use Products\ProductsGetAllListsUtils;

if ( session_status() == PHP_SESSION_NONE ) :
        session_start();
    endif; 
	define('MY_THEME_DIR', strtolower(get_template_directory()));
	define('MY_THEME_DIR_URI', strtolower(get_template_directory_uri()));
	require_once MY_THEME_DIR . '/inc/constants.php';	
	require_once LOGO_CLASS_DIR . '/logo.php';
	require_once CTINFO_CLASS_DIR . '/ctinfo.php';	
	require_once NAV_MENUS_CLASS_DIR . '/nav-menus.php';
	require_once SLIDER_CLASS_DIR . '/slider.php';
	require_once TESTIMOLATES_CLASS_DIR . '/testimolates.php';
	require_once PRODUCTS_CLASS_DIR . '/products.php';
	require_once GT_CLASS_DIR . '/gioithieu.php';
	require_once BANNERS_CLASS_DIR . '/banners.php';
	require_once CLIENTS_CLASS_DIR . '/clients.php';
	require_once WOO_CLASS_DIR . '/woocommerces.php';
	require_once POSTS_CLASS_DIR . '/posts.php';
	require_once PAGES_CLASS_DIR . '/pages.php';
	require_once TAX_CLASS_DIR . '/taxonomies.php';
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
		/*$field = get_field('xuat_xu', 90);
		$v = array_map('trim', explode('|', $field['label']));
		if ( count($v) === 1 ) echo $v[0];
        else echo $v[1];
		die();*/
		//print_r(get_field('kich_thuoc', 90));
		//die();
		//print_r(get_post_meta(90));
		//die();
		//$bacs_accounts_info = get_option( 'woocommerce_bacs_accounts');
		//print_r($bacs_accounts_info);
		//die();
		//cloneAllProductsMeta(90, 'en');
		//die();
		//print_r(\Products\ProductsGetAllListsUtils::get(['lang' => DEFAULT_LANG, 'slug' => 'inox-mau-khac-dien-quang', 'related' => true]));
		//cloneAllProductsMeta(90, 'en');
		//die();
		/*echo "<pre>";
		print_r(get_post_meta(66));
		die();*/
		/*$product = wc_get_product( 66 );
				$product->set_short_description('<p>Đòi hỏi sự hoàn thiện trong thẩm mỹ, không chỉ đẹp, sang trong mà còn phải bền vững với thời gian, an toàn với môi trường.</p>');
				$product->save();*/
		
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
	function cloneAllProductsMeta($fromId, $lang = DEFAULT_LANG) {
		$product = wc_get_product( $fromId );
		//$description = $product->get_description();
		//$s_description = $product->get_short_description();
		//$tskt = get_post_meta($fromId, 'tskt', true);
		$xuat_xu = get_field('xuat_xu', $fromId,);
		$nhan_hieu = get_field('nhan_hieu', $fromId,);
		$mau_sac = get_field('mau_sac', $fromId);
		$kich_thuoc = get_field('kich_thuoc', $fromId);
		//$galleries = get_post_meta($fromId, '_product_image_gallery', true);
		$args = array(
			'post_type' => PRODUCTS_POST_TYPE,
			'posts_per_page' => -1,
			'no_paging' => true,
			'lang' => $lang
		);
		query_posts($args);
		while ( have_posts() ) : the_post();
			global $product;
			$pid = $product->get_id();
			if ( $pid !== $fromId ) :
				//update_post_meta($pid, 'tskt', $tskt);
				update_field('xuat_xu', $xuat_xu, $pid);
				update_field('nhan_hieu', $nhan_hieu, $pid);
				update_field('mau_sac', $mau_sac, $pid);
				update_field('kich_thuoc', $kich_thuoc, $pid);
				//update_post_meta($pid, '_product_image_gallery', $galleries);
				//$product = wc_get_product( $pid );
				//$product->set_description($description);
				//$product->set_short_description($s_description);
				//$product->save();
			endif;
		endwhile;
		wp_reset_query();
	}
	function check_attachment_exist($file) {
		$file_headers = @get_headers($file);
		$exists = true;
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$exists = false;
		}
		return $exists;
	}