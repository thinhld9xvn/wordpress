<?php 
	add_theme_support( 'post-thumbnails' );
	add_theme_support('nav-menus');
	
	register_nav_menus(

		array(
			'primary' => 'Primary Menu'			
		)

	);
	
		
	add_image_size( 'feature-image-slider', 1600, 431, true );	
	add_image_size( 'feature-image-product-menu-thumbnail', 84, 60, true );
	add_image_size( 'feature-image-product-four-columns', 254, 250, true );
	add_image_size( 'feature-image-product-three-columns', 254, 250, true );
	add_image_size( 'feature-image-news-carousel', 245, 165, true );	
	add_image_size( 'feature-image-news-four-columns', 245, 165, true );	
	add_image_size( 'feature-image-news-three-columns', 245, 165, true );
	add_image_size( 'feature-image-gallery-thumbnail', 100, 70, true ); ?>