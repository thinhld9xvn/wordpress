<?php

	define('COMBINE_ADMIN_CACHE_DIRECTORY_URI', get_site_protocol() . $_SERVER['SERVER_NAME'] . '/wp-content/cache' );
    define('COMBINE_ADMIN_CACHE_DIRECTORY', $_SERVER['DOCUMENT_ROOT'] . '/wp-content/cache' );
    
    define('STYLESHEET_COMBINE_ADMIN_FILE_URI', COMBINE_ADMIN_CACHE_DIRECTORY_URI . '/combine-admin-stylesheet.css');
    define('STYLESHEET_COMBINE_ADMIN_FILE_PATH', COMBINE_ADMIN_CACHE_DIRECTORY . '/combine-admin-stylesheet.css');

    define('JAVASCRIPT_COMBINE_ADMIN_FILE_URI', COMBINE_ADMIN_CACHE_DIRECTORY_URI . '/combine-admin-script.js');
    define('JAVASCRIPT_COMBINE_ADMIN_FILE_PATH', COMBINE_ADMIN_CACHE_DIRECTORY . '/combine-admin-script.js');         

    define('STYLESHEET_COMBINE_FILE_URI', COMBINE_ADMIN_CACHE_DIRECTORY_URI . '/combine-stylesheet.css');
    define('STYLESHEET_COMBINE_FILE_PATH', COMBINE_ADMIN_CACHE_DIRECTORY . '/combine-stylesheet.css');

    define('JAVASCRIPT_COMBINE_FILE_URI', COMBINE_ADMIN_CACHE_DIRECTORY_URI . '/combine-script.js');
    define('JAVASCRIPT_COMBINE_FILE_PATH', COMBINE_ADMIN_CACHE_DIRECTORY . '/combine-script.js');         

    define('THEME_FONT_DIRECTORY_URI', get_template_directory_uri() . '/fonts' );
    define('THEME_IMAGES_DIRECTORY_URI', get_template_directory_uri() . '/images' );

	function combine_admin_init() {			

		global $combine_admin_enqueue;

		$combine_admin_enqueue = array();
			
		$combine_admin_enqueue['stylesheet'] = array();
		$combine_admin_enqueue['scripts'] = array();

	} 

	function combine_admin_get_data() {

		global $combine_admin_enqueue;

		//print_r ( $combine_admin_enqueue ); die();

		$data = array();

		$data['stylesheets'] = '';
		$data['scripts'] = '';

		if ( is_array( $combine_admin_enqueue ) &&
			 ( $combine_admin_enqueue['stylesheet'] || 
			   $combine_admin_enqueue['scripts'] ) ) :

			foreach( $combine_admin_enqueue['stylesheet'] as $fn ) :

				$data['stylesheets'] .= file_get_contents( $fn );

			endforeach;

			foreach( $combine_admin_enqueue['scripts'] as $fn ) :

				$data['scripts'] .= file_get_contents( $fn );

			endforeach;			

		endif;

		return $data;

	}

	function combine_admin_area_enqueue( $data ) {

		if ( $data['stylesheets'] || 
			 $data['scripts'] ) :

			if ( ! file_exists( COMBINE_ADMIN_CACHE_DIRECTORY ) ) :

				mkdir( COMBINE_ADMIN_CACHE_DIRECTORY );

			endif;

		endif;

		if ( $data['stylesheets'] ) :

			file_put_contents( STYLESHEET_COMBINE_ADMIN_FILE_PATH, $data['stylesheets'] );

			wp_enqueue_style( 'pv-combine-admin-stylesheet', STYLESHEET_COMBINE_ADMIN_FILE_URI );

		endif;

		if ( $data['scripts'] ) :

			file_put_contents( JAVASCRIPT_COMBINE_ADMIN_FILE_PATH, $data['scripts'] );

			wp_enqueue_script('pv-combine-admin-scripts', JAVASCRIPT_COMBINE_ADMIN_FILE_URI, array('jquery'), 'v1.0.0' , true);

		endif;

	}

	function combine_admin_theme_generate_files( $data ) {

		if ( $data['stylesheets'] || 
			 $data['scripts'] ) :

			if ( ! file_exists( COMBINE_ADMIN_CACHE_DIRECTORY ) ) :

				mkdir( COMBINE_ADMIN_CACHE_DIRECTORY );

			endif;

		endif;

		if ( $data['stylesheets'] ) :

			$data['stylesheets'] = preg_replace( sprintf( '/%s|%s|%s/i', 
                                                 '..\/fonts\/',
                                                 '\/fonts\/',
                                                 'fonts\/' ), THEME_FONT_DIRECTORY_URI . '/', $data['stylesheets'] );

    		$data['stylesheets'] = preg_replace( sprintf( '/%s|%s|%s|%s|%s|%s/i', 
                                                 '..\/images\/',
                                                 '\/images\/',
                                                 'images\/',
                                                 '..\/img\/',
                                                 '\/img\/',
                                                 'img\/' ), THEME_IMAGES_DIRECTORY_URI . '/', $data['stylesheets'] ); 

			file_put_contents( STYLESHEET_COMBINE_FILE_PATH, $data['stylesheets'] );					

		endif;

		if ( $data['scripts'] ) :

			file_put_contents( JAVASCRIPT_COMBINE_FILE_PATH, $data['scripts'] );									

		endif;

	}

	function combine_admin_enqueue() {

		if ( ! is_admin() ) :

			global $uc_cache;			

			if ( ! $uc_cache->has_cached() ) :

				$data = combine_admin_get_data();
				combine_admin_theme_generate_files( $data );

			endif;

		else :

			$data = combine_admin_get_data();
			combine_admin_area_enqueue( $data );

		endif;		

	} 	

	function combine_admin_head_enqueue_scripts() {

		echo "<link rel='stylesheet' href='" . STYLESHEET_COMBINE_FILE_URI . "' type='text/css'>";
		echo "<script type='text/javascript'>var sb_admin_ajax = { url : '" . admin_url('admin-ajax.php') . "' };</script>";
		echo "<script type='text/javascript' src='" . JAVASCRIPT_COMBINE_FILE_URI . "'></script>";			
	
	}

	add_action('after_setup_theme', 'combine_admin_init');		

	add_action('admin_enqueue_scripts', 'combine_admin_enqueue'); 
	add_action('wp_enqueue_scripts', 'combine_admin_enqueue');

	add_action('wp_head', 'combine_admin_head_enqueue_scripts'); ?>