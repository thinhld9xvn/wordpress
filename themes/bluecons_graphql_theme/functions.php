<?php

use Posts\PostsGetAllListsUtils;
use Taxonomies\TaxGetMetaTermsUtils;

if ( session_status() == PHP_SESSION_NONE ) :
        session_start();
    endif; 
	define('MY_THEME_DIR', strtolower(get_template_directory()));
	define('MY_THEME_DIR_URI', strtolower(get_template_directory_uri()));
	require_once MY_THEME_DIR . '/inc/constants.php';	
	require_once LOGO_CLASS_DIR . '/logo.php';
	require_once NAV_MENUS_CLASS_DIR . '/nav-menus.php';	
	require_once POSTS_CLASS_DIR . '/posts.php';
	require_once PAGES_CLASS_DIR . '/pages.php';
	require_once TAX_CLASS_DIR . '/taxonomies.php';
	require_once HOME_CLASS_DIR . '/home.php';
	require_once CTINFO_CLASS_DIR . '/ctinfo.php';
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
		//move_category_posts(21, 672);
		//format_posts();
		/*$args=array(
			'object_type' => array('products') 
		); 
		$output = 'objects'; // or objects
		$operator = 'and'; // 'and' or 'or'
		$taxonomies = get_taxonomies($args,$output,$operator);
		echo "<pre>";
		print_r($taxonomies);
		die();*/
		/*echo "<pre>";
		PostsGetAllListsUtils::get('any', null, null, -1, '', 'bàn', false);
		die();*/
	});
	function removeLink($str){
		$regex = '/<a (.*)<\/a>/isU';
		preg_match_all($regex,$str,$result);
		foreach($result[0] as $rs)
		{
			$regex = '/<a (.*)>(.*)<\/a>/isU';
			$text = preg_replace($regex,'$2',$rs);
			$str = str_replace($rs,$text,$str);
		}
		return $str;
	}
	function format_posts() {
		$args = [
			'post_type' => 'any',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		$regex = "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";
		while ( have_posts() ) : the_post();
			$id = get_the_ID();
			$contents = get_the_content();
			//$contents = str_replace('https://bluecons.vn', 'https://admin.bluecons.vn', $contents);
			echo "<pre>";			
			if (preg_match_all($regex, $contents, $urls)) :	
				$s = [];
				foreach($urls as $group_urls) :
					$s = array_merge($s, $group_urls); 
				endforeach;		
				$s = array_filter(array_unique($s), function($value, $key) {
					return !empty($value) && FALSE === strpos($value, '/wp-content/uploads/');
				}, ARRAY_FILTER_USE_BOTH);
				
			endif;			
			/*wp_update_post([
				'ID' => $id, 
				'post_content' => $contents
			]);*/
		endwhile;
		wp_reset_query();
	}
	function move_category_posts($cat_from, $tax_to, $post_type = 'services', $tax = 'services-category') {
		$args = [
			'post_type' => 'post',
			'category__in' => $cat_from,
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		while ( have_posts() ) : the_post();
			$id = get_the_ID();
			wp_update_post([
				'ID' => $id,
				'post_type' => $post_type
			]);
			wp_set_post_terms($id, $tax_to, $tax);
		endwhile;
		wp_reset_query();
	}
	function move_all_post_type_to_posts($tax_to = 29, $tax = 'category') {
		$args = [
			'post_type' => 'any',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		while ( have_posts() ) : the_post();
			global $post;
			$id = get_the_ID();
			$post_type = $post->post_type;
			if ( $post_type === 'slider' || $post_type === 'page' ) continue;
			wp_update_post([
				'ID' => $id,
				'post_type' => 'post'
			]);
			wp_set_post_terms($id, $tax_to, $tax);
		endwhile;
		wp_reset_query();
	}
	function remove_all_post_type_posts() {
		$args = [
			'post_type' => 'post',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		while ( have_posts() ) : the_post();
			global $post;
			$id = get_the_ID();
			wp_delete_post($id, true);
		endwhile;
		wp_reset_query();
	}
	function update_priority_all_posts() {
		$args = [
			'post_type' => 'post',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		while ( have_posts() ) : the_post();
			global $post;
			$id = get_the_ID();
			//update_field('priority', 1, $id);
		endwhile;
		wp_reset_query();
	}
	function update_thumbnail_posts() {
		$args = [
			'post_type' => 'post',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		$posts = query_posts($args);
		while ( have_posts() ) : the_post();
			$id = get_the_ID();
			$url = get_the_post_thumbnail($id);
			if ( empty($url) ) :
				$att_id = pn_get_attachment_id_from_url('http://wp-bluecons.io/wp-content/uploads/2022/03/Tu-treo-quan-ao-5.jpg');
				set_post_thumbnail($id, $att_id);
			endif;
		endwhile;
		wp_reset_query();
	}
	function update_focus_keyword_posts() {
		$args = [
			'post_type' => 'post',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		while ( have_posts() ) : the_post();
			$id = get_the_ID();
			$contents = get_the_content();
			$from_key = '<strong>';
			$to_key = '</strong>';
			$from = strpos($contents, $from_key);
			if ( FALSE !== $from ) :
				$to = strpos($contents, $to_key, $from);
				if ( FALSE !== $to ) :
					$keywords = substr($contents, $from + strlen($from_key), $to - ($from + strlen($from_key)));
					echo $keywords; die();
					update_post_meta($id, 'rank_math_focus_keyword', $keywords);
				endif;
			endif;			
		endwhile;
		wp_reset_query();
	}
	function print_posts_ct() {
		$args = [
			'post_type' => 'post',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		$data = [];
		while ( have_posts() ) : the_post();
			global $post;
			$id = get_the_ID();			
			$terms = wp_get_object_terms($id, 'category');
			$slug = $post->post_name;
			$terms = array_map(function($t) {
				return [
					'name' => $t->name
				];
			}, $terms);
			$data[] = [
				'post_name' => $slug,
				'categories' => $terms
			];
		endwhile;		
		wp_reset_query();
		file_put_contents('data.json', json_encode($data));
	}
	function search_post($data, $slug) {
		foreach($data as $key => $post) :			
			if ( $post['post_name'] === $slug ) :
				return $post;
			endif;
		endforeach;
		return null;
	}
	function import_posts_ct() {
		$contents = file_get_contents(ABSPATH . '/data.json');
		$data = json_decode($contents, true);
		//
		$args = [
			'post_type' => 'post',
			'posts_per_page' => -1,
			'no_paging' => true
		];
		query_posts($args);
		while ( have_posts() ) : the_post();
			global $post;
			$id = $post->ID;	
			$title = $post->post_title;
			//$item = search_post($data, $slug);
			if ( !empty($data[$title]) ) :
				$item = $data[$title];
				//echo $item['post_name']; die();
				//wp_delete_object_term_relationships($id, 'category');
				/*foreach($item['categories'] as $key => $cat) :
					wp_set_object_terms($id, $cat['name'], 'category');
				endforeach;*/
				wp_update_post([
					'ID' => $id,
					'post_name' => $item['post_name']
				]); 
			else :
				//wp_set_object_terms($id, 'Uncategorized', 'category');
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
	add_action('wp_loaded', function() {
		/*\Posts\PostsGetAllListsUtils::get('post');
		die();*/
	});