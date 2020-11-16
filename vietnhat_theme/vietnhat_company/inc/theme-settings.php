<?php 
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pccbinhduong' )
	) );	  		

	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'theme-feature-image-product', 147, 110, true );	
	add_image_size( 'theme-feature-image-product-large', 251, 250, true );
	add_image_size( 'theme-feature-image-news', 168, 125, true );
	
?>