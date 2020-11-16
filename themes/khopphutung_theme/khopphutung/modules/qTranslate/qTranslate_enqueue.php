<?php 	

	function qTranslate_enqueue_stylesheet_scripts() {

		$current_screen = get_current_screen();	

		if ( 'edit-tags' === $current_screen->base || 
			 'edit' === $current_screen->base ||
			 'term' === $current_screen->base ||
			 'post' === $current_screen->base ||
			 'settings_page_qtranslate-settings-admin' === $current_screen->base ) :
			
			wp_enqueue_style( 'qtranslate-admin-stylesheet', QTRANSLATE_DIRECTORY_URI_CSS . '/style.css' );					
			

		endif;

		if ( 'edit-tags' === $current_screen->base || 
			  'term' === $current_screen->base || 
			  'post' === $current_screen->base ) :

			wp_enqueue_script( 'qtranslate-admin-terms-mod-script', QTRANSLATE_DIRECTORY_URI_JS . '/qtranslate-terms-mod.min.js', array('jquery'), 'v1.0.0', false );						

		elseif ( 'settings_page_qtranslate-settings-admin' === $current_screen->base ) :

			wp_enqueue_script( 'qtranslate-admin-script', QTRANSLATE_DIRECTORY_URI_JS . '/qtranslate-admin.min.js', array('jquery'), 'v1.0.0', false );

		endif;

	}

	add_action( 'admin_enqueue_scripts', 'qTranslate_enqueue_stylesheet_scripts' );
?>