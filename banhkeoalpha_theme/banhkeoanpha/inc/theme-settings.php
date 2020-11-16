<?php  

	register_nav_menus(

			array(
				'primary' => __('Primary Menu', 'pitvietco'),
				'mobile' => __('Mobile Menu', 'pitvietco')
			)		

	);

	add_theme_support('nav-menus');
	add_theme_support( 'post-thumbnails' );
		
	add_image_size( 'feature-image-carousel-product', 300, 276, true );
	add_image_size( 'feature-image-product', 300, 276, true );
	add_image_size( 'feature-image-news', 450, 315, true );