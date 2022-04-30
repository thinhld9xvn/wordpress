<?php

	register_sidebar(

		array(
			'name'          => __( 'Slider Sidebar', 'gco' ),
			'id'            => 'sidebar-slider',
			'description'   => 'This sidebar displays in main slider',			
			'class'         => 'sidebar',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)

	);	

	register_sidebar(

		array(
			'name'          => __( 'Home Sidebar', 'gco' ),
			'id'            => 'sidebar-home',
			'description'   => 'This sidebar displays in home page',			
			'class'         => 'sidebar',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
		)

	);	

	register_sidebar(

		array(
			'name'          => __( 'Footer Sidebar', 'gco' ),
			'id'            => 'sidebar-footer',
			'description'   => 'This sidebar displays in footer',			
			'class'         => 'sidebar',
			'before_widget' => '<div class="footer-column">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => ''
		)

	);	