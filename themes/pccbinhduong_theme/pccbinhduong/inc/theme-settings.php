<?php 
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pccbinhduong' )
	) );	  		

	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'theme-feature-image-carousel-news', 260, 145, true );
	add_image_size( 'theme-feature-image-news', 300, 200, true );
	add_image_size( 'theme-feature-image-projects', 250, 180, true );
	add_image_size( 'theme-feature-image-avatar-customer', 60, 60, true );
	add_image_size( 'theme-feature-image-logo-partner', 185, 90, true );
	
?>