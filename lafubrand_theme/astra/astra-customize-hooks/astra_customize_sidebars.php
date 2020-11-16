<?php

	function __customize_regsitered_sidebars() {

		//echo "<pre>"; print_r( $GLOBALS['wp_registered_sidebars'] ); die();

		$registered_sidebars = $GLOBALS['wp_registered_sidebars'];

		foreach ( $registered_sidebars as $key => $sidebar ) :

			if ( FALSE !== strpos($key, 'footer-widget-') || 
				 FALSE !== strpos($key, 'advanced-footer-') ) :

				unregister_sidebar($key);

			endif;

		endforeach;

	}
	
	//add_action('wp_loaded', '__customize_regsitered_sidebars');