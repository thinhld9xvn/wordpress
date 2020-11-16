<?php 
	// khởi tạo ngôn ngữ mặc định cho site
	function init_mainsite_default_language() {		

		$mydb = new qTranslate_db();
	    $default_lang = $mydb->get_default_language();
		
		$mainsite_current_langcode = $_SESSION['qtranslate_mainsite_langcode'];

		if ( ! isset( $mainsite_current_langcode ) ) :

			$_SESSION['qtranslate_mainsite_langcode'] = $default_lang->code;

		endif;
	}

	// phân tích tham số url => chuyển hướng thích hợp
	function init_mainsite_request_uri() {

		$exclude_pages = array( 'wp-login.php', 'wp-admin.php' );

		if ( ! in_array( $GLOBALS['pagenow'], $exclude_pages ) ) :

			$languages = $_SESSION['qtranslate_languages'];		

			$has_langcode_validate = false;

			$request_uri = $_SERVER['REQUEST_URI'];

			$parameter = explode( '/', $request_uri );

			if ( sizeof( $parameter ) > 1 ) :

				$prefix_langcode = $parameter[1];

				if ( ! empty( $prefix_langcode ) ) :

					foreach ( $languages as $lang ) :

						if ( $lang->code == $prefix_langcode ) :

							$has_langcode_validate = true;

							break;

						endif;

					endforeach;	

					if ( $has_langcode_validate ) :

						$_SESSION['qtranslate_mainsite_langcode'] = $prefix_langcode;						

						unset( $parameter[1] );						

						$parameter = implode( '/', $parameter );
						$_SERVER['REQUEST_URI'] = empty( $parameter ) ? '/' : $parameter;					

					endif;

				endif;

			endif;

		endif;

	}

	function qTranslate_init_hook() {

		if ( ! is_admin() ) :

			init_mainsite_default_language();	
			init_mainsite_request_uri();	

		endif;

	}

	add_action('init', 'qTranslate_init_hook');
?>