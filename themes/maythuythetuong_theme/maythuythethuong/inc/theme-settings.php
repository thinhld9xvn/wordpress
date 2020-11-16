<?php 
	
	register_nav_menus(

		array(
			'primary' => __( 'Primary Menu', 'pitvietco' ),
			'mobile' => __( 'Mobile Menu', 'pitvietco' ),
		)

	);

	add_theme_support('nav-menus');
	add_theme_support( 'post-thumbnails' );
		
	add_image_size( 'feature-image-slider', 1350, 448, true );
	add_image_size( 'feature-image-service', 260, 157, true );
	add_image_size( 'feature-image-product-five-columns', 190, 155, true );
	add_image_size( 'feature-image-product-three-columns', 261, 178, true );
	add_image_size( 'feature-image-product-thumbnail-details', 340, 237, true );
	add_image_size( 'feature-image-carousel-news', 259, 146, true );
	//add_image_size( 'feature-image-carousel-partner-logo', 184, 85, true );
	add_image_size( 'feature-image-footer-galleries', 78, 67, true ); ?>