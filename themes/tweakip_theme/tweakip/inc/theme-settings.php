<?php 
	add_theme_support( 'post-thumbnails' );
	add_theme_support('nav-menus');
	
	register_nav_menus(

		array(
			'support-menu-nl' => 'Support Menu ( Netherlands )',
			'support-menu-en' => 'Support Menu ( English )',
			'support-menu-vi' => 'Support Menu ( Vietnamese )'
		)

	);
	
		
	add_image_size( 'feature-image-slider', 1350, 692, true );
	add_image_size( 'feature-image-case-slider', 837, 550, true );
	add_image_size( 'feature-image-case-thumbnail', 420, 236, true );

	add_image_size( 'feature-image-feedback-background', 1350, 652, true );
	add_image_size( 'feature-image-onze-cases-background', 1350, 696, true );
	add_image_size( 'feature-image-ons-team-background', 1350, 652, true ); ?>