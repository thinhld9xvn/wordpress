<?php 		
	function register_qTranslate_stylesheet_scripts() {

		//global $combine_admin_enqueue;

		$request_uri = $_SERVER['REQUEST_URI'];

		if ( false !== strpos( $request_uri, 'edit-tags.php') ||
			 false !== strpos( $request_uri, 'edit.php') ||
			 false !== strpos( $request_uri, 'term.php') ||
			 false !== strpos( $request_uri, 'post.php') ||
			 false !== strpos( $request_uri, 'qtranslate-settings-admin') ):
			
			wp_enqueue_style( 'qtranslate-admin-css', QTRANSLATE_DIRECTORY_URI_CSS . '/style.css' );

			//$combine_admin_enqueue['stylesheet'][] = QTRANSLATE_DIRECTORY_URI_CSS . '/style.css';

		endif;

		if (  false !== strpos( $request_uri, 'edit-tags.php' ) ||
		      false !== strpos( $request_uri, 'term.php' ) ||
		      false !== strpos( $request_uri, 'post.php' ) ) :

			wp_enqueue_script( 'qtranslate-terms-admin-js', QTRANSLATE_DIRECTORY_URI_JS . '/qtranslate-terms-mod.min.js' );

		    //$combine_admin_enqueue['scripts'][] = QTRANSLATE_DIRECTORY_URI_JS . '/qtranslate-terms-mod.min.js';

		elseif ( false !== strpos( $request_uri, 'qtranslate-settings-admin' ) ) :

			wp_enqueue_script( 'qtranslate-admin-js', QTRANSLATE_DIRECTORY_URI_JS . '/qtranslate-admin.min.js' );

			//$combine_admin_enqueue['scripts'][] = QTRANSLATE_DIRECTORY_URI_JS . '/qtranslate-admin.min.js';

		endif;

	}

	add_action( 'admin_init', 'register_qTranslate_stylesheet_scripts' );